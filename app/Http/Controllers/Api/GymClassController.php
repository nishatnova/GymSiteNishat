<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GymClass;
use Carbon\Carbon;

class GymClassController extends Controller
{
    public function index()
    {
        $gymClasses = GymClass::with('trainer')->get();
        return response()->json($gymClasses);
    }

    public function store(Request $request)
    {
        $request->validate([
            'trainer_id' => 'required|exists:trainers,id',
            'class_time' => 'required|date',
            'capacity' => 'required|integer|min:1',
        ]);
        $classTime = Carbon::parse($request->class_time);
        $existingClasses = GymClass::where('trainer_id', $request->trainer_id)
            ->whereDate('class_time', $classTime->toDateString())
            ->get();

        if ($existingClasses->count() >= 5) {
            return response()->json(['error' => 'Trainer has reached the daily limit of 5 classes.'], 422);
        }

        foreach ($existingClasses as $existingClass) {
            if ($classTime->between($existingClass->class_time, $existingClass->class_time->copy()->addHours(2))) {
                return response()->json(['error' => 'This class conflicts with another class for this trainer.'], 422);
            }
        }

        GymClass::create($request->all());

        return response()->json('Class created successfully', 201);
    }

    public function update(Request $request, GymClass $gymClass)
    {
        $request->validate([
            'trainer_id' => 'required|exists:trainers,id',
            'class_time' => 'required|date',
            'capacity' => 'required|integer|min:1',
        ]);
        $classTime = Carbon::parse($request->class_time);
        $existingClasses = GymClass::where('trainer_id', $request->trainer_id)
            ->whereDate('class_time', $classTime->toDateString())
            ->get();

        if ($existingClasses->count() >= 5) {
            return response()->json(['error' => 'Trainer has reached the daily limit of 5 classes.'], 422);
        }

        foreach ($existingClasses as $existingClass) {
            if ($classTime->between($existingClass->class_time, $existingClass->class_time->copy()->addHours(2))) {
                return response()->json(['error' => 'This class conflicts with another class for this trainer.'], 422);
            }
        }

        GymClass::updateGymClass($request, $gymClass);
        return response()->json($gymClass);

    }

    public function destroy(GymClass $gymClass)
    {
        GymClass::deleteGymClass($gymClass);
        return response()->json(null, 204);
    }


}
