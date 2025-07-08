<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'google_id',
    ];

    protected $hidden = [
        'remember_token',
    ];

    // Relasi ke Booking
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    // Relasi ke Payment
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    // Relasi ke Meja
    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }
}
