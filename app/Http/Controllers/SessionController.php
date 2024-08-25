<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Movie;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SessionController extends Controller
{
    public function HomeAuth() {
        return view('auth.auth');
    }

    public function getLogin()
    {
        return view('auth.login');
    }
    public function getRegist()
    {
        return view('auth.register');
    }
    public function getLanding()
    {
        $response = Http::get('https://old-movies-api.vercel.app/api/movies');
        $data = $response->json();


        foreach ($data as $item) {
            if (
                Movie::where('title', $item['title'])
                    ->where('description', $item['description'])
                    ->where('release_date', $item['release_date'])
                    ->where('poster_url', $item['poster_url'])
                    ->where('age_rating', $item['age_rating'])
                    ->where('ticket_price', $item['ticket_price'])
                    ->doesntExist()
            ) {
                $movie = Movie::create($item);

                for ($i = 1; $i <= 64; $i++) {
                    $seat = Seat::create([
                        'id_movie' => $movie->id,
                        'number' => $i,
                        'status' => 'available',
                    ]);

                    $ticket = new Ticket();
                    $ticket->status = 'available';
                    $ticket->id_order = null;
                    $ticket->id_movie = $movie->id;
                    $ticket->id_seat = $seat->id;
                    $ticket->save();
                }

            }
        }
        return view('landing.landing')->with('Initmessage' ,'Data has been imported.');
    }


}
