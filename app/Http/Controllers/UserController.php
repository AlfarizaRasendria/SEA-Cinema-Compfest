<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */



    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('getDashboard');
        } else {
            return redirect()
                ->back()
                ->withErrors([
                    'Failed' => 'Login Failed',
                ]);
        }
    }

    public function register(Request $request)
    {
        $validateData = $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'fullname' => 'required|string|',
            'age' => 'required|integer',
        ]);
        $existingUser = User::where('username', $request->username)->first();
        if ($existingUser) {
            return back()->withErrors(['Failed' => 'Register Failed: Username already exists.']);
        }
        $user = User::create([
            'username' => $validateData['username'],
            'password' => bcrypt($validateData['password']),
            'fullname' => $validateData['fullname'],
            'age' => $validateData['age'],
        ]);
        return redirect()->route('getLogin')->with('Success','Registration has been successful');
    }

    public function username()
    {
        return 'username';
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('getLanding')->with('success', 'Berhasil logout!');
    }
}
