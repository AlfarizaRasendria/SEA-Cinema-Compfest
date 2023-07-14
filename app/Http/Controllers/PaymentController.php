<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PaymentController extends Controller
{
    public function getPayment($id,$selectedSeats)
    {
        $user = auth()->user();
        $order = Order::find($id);
        return view('user.payment', ['user' => $user, 'order' => $order,'selectedSeats'=>$selectedSeats]);
    }

    public function getOrderTopup($id,$selectedSeats)
    {
        $order = Order::find($id);
        return view('user.orderTopUp', ['order' => $order,'selectedSeats'=>$selectedSeats]);
    }

    public function proceedOrderTopup(Request $request, $id,$selectedSeats)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nominal' => ['required', 'numeric'],
                'method' => ['required', 'string', 'in:credit_card,bank_transfer,e_wallet'],
            ],
            [
                'method.required' => 'Choose a top up method.',
                'method.in' => 'Invalid top up method selected.',
            ],
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $order = Order::findOrFail($id);
        $totalCost = $order->total;
        $user = auth()->user();
        $userBalance = $user->balance;
        $topUpAmount = $request->input('nominal');
        $userBalance += $topUpAmount;
        $user->update(['balance' => $userBalance]);

        if ($userBalance >= $totalCost) {
            $userBalance -= $totalCost;
            $user->update(['balance' => $userBalance]);
            $order->update([
                'status' => 'success',
                'date' => now(),
            ]);

            $payment = new Payment();
            $payment->total = $totalCost;
            $payment->date = now();
            $payment->status = 'paid';
            $payment->id_order = $order->id;
            $payment->save();

            $tickets = Ticket::where('id_order', $order->id)->get();
            foreach ($tickets as $ticket) {
                $ticket->update([
                    'status' => 'booked',
                    'id_order' => $order->id,
                ]);
            }

            $selectedSeats = explode(',',$selectedSeats);
            foreach ($selectedSeats as $seatId) {
                $ticket = Ticket::whereIn('id_seat', [$seatId])
                    ->where('status', 'available')
                    ->first();
                if ($ticket) {
                    $ticket->status = 'booked';
                    $ticket->id_order = $order->id;
                    $ticket->save();
                }
            }

            return redirect()
                ->route('getDetailOrder', ['id' => $id])
                ->with('success', 'Order Successfull');
        } else {
            return redirect()
                ->route('getPayment', ['id' => $id,'selectedSeats'=>$selectedSeats])
                ->with('failed', 'Order Still Failed due to Insufficient Balance for Order');
        }
    }
}
