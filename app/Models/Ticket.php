<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_order',
        'status',
        'id_movie',
        'id_seat',
    ];

    public function order()
    {
        return $this->belongsTo(order::class, 'id_order');
    }
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'id_movie');
    }
    public function seat()
    {
        return $this->belongsTo(Seat::class, 'id_seat');
    }
}
