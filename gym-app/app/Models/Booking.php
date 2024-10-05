<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'trainee_id',
        'gym_class_id',
        'booking_time',
    ];
    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }

    public function gymClass()
    {
        return $this->belongsTo(GymClass::class, 'gym_class_id');
    }
}
