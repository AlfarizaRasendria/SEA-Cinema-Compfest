<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movie;
use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getDashboard()
    {
        $user = auth()->user();

        $totalTicketBooked = $user
            ->tickets()
            ->where('tickets.status', 'booked')
            ->count();
        $balance = $user->balance;
        $totalMovieBooked = $user
            ->tickets()
            ->where('tickets.status', 'booked')
            ->distinct('id_movie')
            ->count('id_movie');

        return view('user.dashboard', compact('totalTicketBooked', 'balance', 'totalMovieBooked'));
    }
}
