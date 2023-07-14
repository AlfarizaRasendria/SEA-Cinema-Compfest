<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Movie;
use App\Models\Ticket;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;

class MovieController extends Controller
{
    public function getAllMovie()
    {
        $Movies = Movie::all();
        return view('landing.movie', ['movies' => $Movies]);
    }

    public function getDetailMovie($id)
    {
        $Detail_movie = Movie::find($id);
        if ($Detail_movie) {
            return view('landing.detail_movie', ['detail_movie' => $Detail_movie]);
        } else {
            return redirect()
                ->back()
                ->with('error', 'Movie Not Found');
        }
    }
}
