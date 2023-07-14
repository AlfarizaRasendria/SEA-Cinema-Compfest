<?php

namespace App\Models;

use App\Models\Seat;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

    class Movie extends Model
    {
        use HasFactory;

        protected $fillable = [
            'title',
            'description',
            'release_date',
            'poster_url',
            'age_rating',
            'ticket_price',
        ];

        public $timestamps = false;

        public function seats(){
            return $this->hasMany(Seat::class,'id_movie');
        }
        public function tickets(){
            return $this->hasMany(Ticket::class,'id_movie');
        }


    }
