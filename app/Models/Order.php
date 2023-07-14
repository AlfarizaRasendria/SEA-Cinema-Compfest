<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class,'id_user');
    }

    public function payment(){
        return $this->hasOne(Payment::class,'id_order');
    }

    public function tickets(){
        return $this->hasMany(Ticket::class,'id_order');
    }
}
