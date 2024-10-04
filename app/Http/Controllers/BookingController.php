<?php

namespace App\Http\Controllers;

use App\Models\GymClass;
use Illuminate\Http\Request;
use App\Models\Booking;
use Auth;

class BookingController extends Controller
{
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

    // Create the booking
    Booking::create([
        'trainee_id' => Auth::id(), // Assuming Auth is set up
        'gym_class_id' => $request->gym_class_id,
        'booking_time' => now(), // You can also allow the trainee to select a specific booking time
    ]);

    return redirect()->route('home')->with('success', 'Booking created successfully!');
}
}
