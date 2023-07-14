<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Movie;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function getAllMovie()
    {
        $Movies = Movie::all();
        return view('user.movie', ['movies' => $Movies]);
    }
    public function getDetailMovie($id)
    {
        $Detail_movie = Movie::find($id);
        if ($Detail_movie) {
            return view('user.detail_movie', ['detail_movie' => $Detail_movie]);
        } else {
            return redirect()
                ->back()
                ->with('error', 'Movie Not Found');
        }
    }

    public function showSeatSelection()
    {
        return view('seat_selection');
    }

    public function processOrder(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'arraySeatMovie' => ['required'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }
        $selectedSeats = explode(',', $request->input('arraySeatMovie'));
        $quantity = $request->input('quantity');

        $movie = Movie::find($id);
        $price = $movie->ticket_price;
        $total = $quantity * $price;

        $order = new Order();
        $order->date = now();
        $order->status = 'pending';
        $order->quantity = $quantity;
        $order->total = $total;
        $order->id_user = Auth::id();
        $order->save();

        $user = auth()->user();
        $user_balance = $user->balance;

        if ($total <= $user_balance) {
            $new_balance = $user_balance -= $total;
            $user->update(['balance' => $new_balance]);
            $order->update(['date' => now(), 'status' => 'success']);

            $payment = new Payment();
            $payment->total = $total;
            $payment->date = now();
            $payment->status = 'paid';
            $payment->id_order = $order->id;
            $payment->save();

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
                ->route('getDetailOrder', ['id' => $order->id])
                ->with('success', 'Order Successfull');
        } else {
            $selectedSeats = implode(',', $selectedSeats);
            return redirect()
                ->route('getPayment', ['id' => $order->id, 'selectedSeats' => $selectedSeats])
                ->with('failed', 'Order Failed cause Insufficient Balance for Order');
        }
    }

    public function cancelOrder($id)
    {
        $order = Order::find($id);
        $order->update(['date' => now(), 'status' => 'canceled']);
        return redirect()
            ->route('getDashboard')
            ->with(['orderCancelled' => 'Order Cancelled']);
    }

    public function getOrder($id)
    {
        $movie = Movie::find($id);
        $user_age = auth()->user()->age;
        if ($movie) {
            if ($user_age < $movie->age_rating) {
                return redirect()
                    ->back()
                    ->withErrors(['error' => 'You are not old enough to watch this film']);
            }
            return view('user.order', ['movie' => $movie]);
        } else {
            return redirect()
                ->back()
                ->with('error', 'Movie Not Found');
        }
    }

    public function getDetailOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('user.detail_order', ['order' => $order]);
    }

    public function getOrderHist()
    {
        $user = auth()->user();
        $orders = $user
            ->orders()
            ->where('status', 'success')->orderByDesc('date')
            ->get();

        return view('user.orderHist', ['orders' => $orders]);
    }

    public function getDetailSuccessfullOrder($id){
        $order = Order::findOrFail($id);
        return view('user.detail_ticket', ['order' => $order]);
    }

    public function cancelTicket($id){
        $ticket = Ticket::find($id);
        $ticket->status = 'available';
        $ticket->save();


        $user = auth()->user();
        $balance = $user->balance;

        $ticket_price = $ticket->movie->ticket_price;
        $balance += $ticket_price;
        $user->update(['balance' => $balance]);

        return redirect()->back()->with('ticket_cancelled','ticket successfully cancelled');
    }
}
