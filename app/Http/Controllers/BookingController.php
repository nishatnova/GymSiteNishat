<?php

namespace App\Http\Controllers;

use App\Models\GymClass;
use Illuminate\Http\Request;
use App\Models\Booking;
use Auth;

class BookingController extends Controller
{

    // In BookingController.php
    public function index()
    {
        $bookings = Booking::with('gymClass')->where('trainee_id', auth()->id())->get();
        return view('trainee.home.classes', compact('bookings'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'gym_class_id' => 'required|exists:gym_classes,id', // Ensure class exists
        ]);

        // Check if the class is fully booked
        $gymclass = GymClass::findOrFail($request->gym_class_id);
        $currentBookings = $gymclass->currentBookings();
        $capacity = $gymclass->capacity;

        if ($currentBookings >= $capacity) {
            return back()->withErrors(['error' => 'Class is fully booked.']);
        }

        // Check for booking conflicts for the trainee
        $conflictingBooking = Booking::where('trainee_id', Auth::id())
            ->whereHas('gymClass', function($query) use ($gymclass) {
                $query->where('class_time', '<=', $gymclass->class_time->addHours(2)) // Assuming 2-hour class duration
                ->where('class_time', '>=', $gymclass->class_time->subHours(2));
            })
            ->exists();

        if ($conflictingBooking) {
            return back()->withErrors(['error' => 'You already have a booking that conflicts with this class.']);
        }

        $existingBooking = Booking::where('trainee_id', Auth::id())
            ->where('gym_class_id', $request->gym_class_id)
            ->first();

        if ($existingBooking) {
            return back()->withErrors(['error' => 'You have already booked this class.']);
        }

        Booking::create([
            'trainee_id' => Auth::id(),
            'gym_class_id' => $request->gym_class_id,
            'booking_time' => now(),
            ]);

    return redirect()->route('home')->with('success', 'Booking created successfully!');
    }
}
