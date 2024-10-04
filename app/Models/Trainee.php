<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'mobile',
        'gender',
        'date_of_birth',
        // Add any other necessary fields here
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function gymClasses()
    {
        return $this->hasMany(GymClass::class);
    }
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

}
