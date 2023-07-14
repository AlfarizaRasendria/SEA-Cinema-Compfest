<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Order;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['username', 'password', 'fullname', 'age', 'balance'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'username_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function withdrawn()
    {
        return $this->hasOne(Withdrawn::class);
    }
    public function TopUp()
    {
        return $this->hasOne(TopUp::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'id_user');
    }

    public function tickets()
    {
        return $this->hasManyThrough(Ticket::class, Order::class, 'id_user', 'id_order');
    }
}
