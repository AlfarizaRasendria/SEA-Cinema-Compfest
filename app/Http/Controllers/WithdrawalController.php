<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdrawn;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use App\Http\Requests\StoreWithdrawnRequest;
use App\Http\Requests\UpdateWithdrawnRequest;

class WithdrawalController extends Controller
{
    public function getWithdraw()
    {
        return view('user.withdraw');
    }

    public function addWithdrawal(Request $request)
    {
        $validatedData = $request->validate([
            'nominal' => ['required', 'numeric','max:500000'],
            'method' => ['required','in:credit_card,bank_transfer,e_wallet'],
        ]);

        $nominal = $validatedData['nominal'];
        $method = $validatedData['method'];
        $id_user = auth()->user()->id;

        $user = User::find($id_user);
        if($nominal>$user->balance){
            return redirect()->back()->withErrors(['withdrawalError'=>'The withdrawal amount exceeds the available balance']);
        }

        $withdrawal = new Withdrawal();
        $withdrawal->nominal = $nominal;
        $withdrawal->method = $method;
        $withdrawal->date = now();
        $withdrawal->id_user = $id_user;
        $withdrawal->save();

        $user->balance -= $nominal;
        $user->save();

        return redirect()
            ->route('getUserBalance',['id'=>$id_user])
            ->with('withdrawalSuccess', 'Successful withdrawal! Balance has been reduced.');
    }
}
