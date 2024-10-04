<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GymClass;
use App\Models\Trainer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class GymClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gymClasses = GymClass::all();
        return view('admin.class.index',[
            'gymClasses' => $gymClasses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.class.create', [
            'trainers' => Trainer::where('active_status',1)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'trainer_id' => 'required|exists:trainers,id',
            'class_time' => 'required|date',
            'capacity' => 'required|integer|min:1',
        ]);

        $validator->after(function ($validator) use ($request) {
            $trainerId = $request->trainer_id;
            $classTime = Carbon::parse($request->class_time);

            // Check for time conflicts with other classes for the same trainer
            $existingClasses = GymClass::where('trainer_id', $trainerId)
                ->whereDate('class_time', $classTime->toDateString())
                ->get();

        // Limit to 5 classes per day
        if ($existingClasses->count() >= 5) {
            $validator->errors()->add('class_time', 'The trainer has reached the daily limit of 5 classes.');
        }

        // Check for time conflicts
        foreach ($existingClasses as $existingClass) {
            $existingClassTime = Carbon::parse($existingClass->class_time);
            if ($classTime->between($existingClassTime, $existingClassTime->copy()->addHours(2)) ||
                $classTime->copy()->addHours(2)->between($existingClassTime, $existingClassTime->copy()->addHours(2))) {
                $validator->errors()->add('class_time', 'This class conflicts with another class for this trainer.');
            }
        }
    });

        $validator->validate();

        GymClass::newGymClass($request);
        return redirect()->route('gymClass.index')->with('message', 'Class created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(GymClass $gymClass)
    {
        return view('admin.class.show', ['gymClass' => $gymClass]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GymClass $gymClass)
    {
        return view('admin.class.edit', [
            'trainers' => Trainer::where('active_status',1)->get(),
            'gymClass' => $gymClass,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GymClass $gymClass)
    {
        $validator = Validator::make($request->all(), [
            'trainer_id' => 'required|exists:trainers,id',
            'class_time' => 'required|date',
            'capacity' => 'required|integer|min:1',
        ]);

        $validator->after(function ($validator) use ($request) {
            $trainerId = $request->trainer_id;
            $classTime = Carbon::parse($request->class_time);

            // Check for time conflicts with other classes for the same trainer
            $existingClasses = GymClass::where('trainer_id', $trainerId)
                ->whereDate('class_time', $classTime->toDateString())
                ->get();

            // Limit to 5 classes per day
            if ($existingClasses->count() >= 5) {
                $validator->errors()->add('class_time', 'The trainer has reached the daily limit of 5 classes.');
            }

            // Check for time conflicts
            foreach ($existingClasses as $existingClass) {
                $existingClassTime = Carbon::parse($existingClass->class_time);
                if ($classTime->between($existingClassTime, $existingClassTime->copy()->addHours(2)) ||
                    $classTime->copy()->addHours(2)->between($existingClassTime, $existingClassTime->copy()->addHours(2))) {
                    $validator->errors()->add('class_time', 'This class conflicts with another class for this trainer.');
                }
            }
        });

        $validator->validate();

        GymClass::updateGymClass($request, $gymClass);

        return redirect()->route('gymClass.index')->with('message', 'Class updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GymClass $gymClass)
    {
        GymClass::deleteGymClass($gymClass);
        return redirect()->route('gymClass.index')->with('message', 'Class deleted successfully.');
    }
}
