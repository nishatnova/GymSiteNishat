<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use Illuminate\Http\Request;
use App\Models\User;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trainers = Trainer::all();
        return view('admin.trainer.index',[
            'trainers' => $trainers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::whereHas('roles', function($q){$q->where('name', 'Trainer');})->get();
        return view('admin.trainer.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => [
                'required',
                'exists:users,id',
                function ($attribute, $value, $fail) {
                    // Check if the user already has a trainer profile
                    if (Trainer::where('user_id', $value)->exists()) {
                        $fail('This user already has a trainer profile.');
                    }
                },
            ],
            'mobile' => 'required|string|max:20|unique:trainers,mobile',
            'experience' => 'nullable|string',
            'description' => 'nullable|string',
            'expertise' => 'required|string',
            'availability' => 'required|string',
            'active_status' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'user_id.required'         => 'Trainer name field is required',
            'expertise.required'       => 'Expertise field is required',
            'availability.required'    => 'Availability field is required',
            'mobile.unique'            => 'This Phone number is already taken. Please input different Phone number.',
        ]);

        Trainer::newTrainer($request);

        return redirect()->route('trainer.create')->with('message', 'Trainer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Trainer $trainer)
    {
        return view('admin.trainer.show', ['trainer' => $trainer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trainer $trainer)
    {
        $users = User::whereHas('roles', function($q){$q->where('name', 'Trainer');
        })->get();
        return view('admin.trainer.edit', compact('trainer', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'mobile' => 'required|string|max:20',
            'experience' => 'nullable|string',
            'description' => 'nullable|string',
            'expertise' => 'required|string',
            'availability' => 'required|string',
            'active_status' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        Trainer::updateTrainer($request, $trainer);

        return redirect()->route('trainer.index')->with('message', 'Trainer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        Trainer::deleteTrainer($trainer);
        return redirect()->route('trainer.index')->with('message', 'Trainer deleted successfully.');
    }
}
