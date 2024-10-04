<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GymClass extends Model
{
    use HasFactory;
    private static $gymClass;

    private static function saveBasicInfo($gymClass, $request)
    {
        $gymClass->name                 = $request->name;
        $gymClass->trainer_id           = $request->trainer_id;
        $gymClass->class_time           = $request->class_time;
        $gymClass->duration             = $request->duration;
        $gymClass->capacity             = $request->capacity;
        $gymClass->active_status        = $request->active_status;

        // Calculate the end time based on the duration
        $startTime = Carbon::parse($request->class_time);
        $gymClass->end_time = $startTime->copy()->addHours(2);

        $gymClass->save();
    }

    public static function newGymClass($request)
    {
        self::$gymClass = new GymClass();
        self::saveBasicInfo(self::$gymClass, $request);
    }


    public static function updateGymClass($request, $gymClass)
    {

        self::saveBasicInfo($gymClass, $request);
    }

    public static function deleteGymClass($gymClass)
    {

        $gymClass->delete();
    }

    public static function checkTrainerSchedule($trainer_id, $class_time, $duration)
    {
        $start_time = Carbon::parse($class_time);
        $end_time = $start_time->copy()->addMinutes($duration);

        $conflict = GymClass::where('trainer_id', $trainer_id)
            ->where(function($query) use ($start_time, $end_time) {
                $query->whereBetween('class_time', [$start_time, $end_time])
                    ->orWhereBetween('end_time', [$start_time, $end_time])
                    ->orWhere(function($q) use ($start_time, $end_time) {
                        $q->where('class_time', '<=', $start_time)
                            ->where('end_time', '>=', $end_time);
                    });
            })
            ->exists();
        return $conflict;
    }

    public static function checkClassLimits($trainer_id, $date)
    {
        $trainerCount = GymClass::where('trainer_id', $trainer_id)
            ->whereDate('class_time', $date)
            ->count();

        $totalCount = GymClass::whereDate('class_time', $date)
            ->count();

        return $trainerCount < 6 && $totalCount < 6;
    }


    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function currentBookings()
    {
        return $this->bookings()->whereDate('booking_time', today())->count();
    }
}
