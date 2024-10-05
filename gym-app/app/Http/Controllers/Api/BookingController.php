<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GymClass;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    public function index()
    {
        $traineeId = Auth::id();
        $bookings = Booking::where('trainee_id', $traineeId)->with('gymClass')->get();
        return response()->json($bookings);
    }

    // Book a gym class for the authenticated trainee
    public function store(Request $request)
    {
        $request->validate([
            'gym_class_id' => 'required|exists:gym_classes,id',
        ]);

        // Check if class is already booked by the trainee
        $existingBooking = Booking::where('trainee_id', Auth::id())
            ->where('gym_class_id', $request->gym_class_id)
            ->first();

        if ($existingBooking) {
            throw ValidationException::withMessages(['gym_class_id' => 'You have already booked this class.']);
        }

        // Create a new booking
        $booking = Booking::create([
            'trainee_id' => Auth::id(),
            'gym_class_id' => $request->gym_class_id,
            'booking_time' => now(),
        ]);

        return response()->json($booking, 201);
    }

    public function destroy($id)
    {
        $booking = Booking::where('id', $id)->where('trainee_id', Auth::id())->firstOrFail();
        $booking->delete();
        return response()->json(null, 204);
    }


}
