<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BalanceController extends Controller
{
    public function getBalance($id){
        $balance = User::find($id)->balance;
        return view('user.balance',['balance'=>$balance]);
    }   
}
