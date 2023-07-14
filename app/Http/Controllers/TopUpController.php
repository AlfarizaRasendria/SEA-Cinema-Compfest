<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TopUp;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTopUpRequest;
use App\Http\Requests\UpdateTopUpRequest;
use Illuminate\Support\Facades\Validator;

class TopUpController extends Controller
{
    public function getTopUp()
    {
        return view('user.topUp');
    }

    public function addTopUp(Request $request)
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

        $validatedData = $validator->validated();

        $nominal = $validatedData['nominal'];
        $method = $validatedData['method'];
        $id_user = auth()->user()->id;

        $topUp = new TopUp();
        $topUp->nominal = $nominal;
        $topUp->method = $method;
        $topUp->date = now();
        $topUp->id_user = $id_user;
        $topUp->save();

        $user = User::find($id_user);
        $user->balance += $nominal;
        $user->save();

        return redirect()
            ->route('getUserBalance', ['id' => $id_user])
            ->with('topupSuccess', 'Successful top-up! Balance has been added.');
    }

    
}
