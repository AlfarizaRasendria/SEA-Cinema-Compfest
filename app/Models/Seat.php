<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_movie',
        'number',
    ];

    public function Movies(){
        return $this->belongsTo(Movie::class,'id_movie');
    }

}

