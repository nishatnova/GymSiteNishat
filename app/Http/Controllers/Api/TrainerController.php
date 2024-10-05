<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trainer;
use App\Models\User;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function index()
    {
        $trainers = Trainer::with('user')->get();
        return response()->json($trainers);
    }


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
            'mobile' => 'nullable|string|max:20|unique:trainers,mobile',
            'experience' => 'nullable|string',
            'description' => 'nullable|string',
            'expertise' => 'required|string',
            'availability' => 'nullable|string',
            'active_status' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ], [
            'user_id.required'         => 'Trainer name field is required',
            'expertise.required'       => 'Expertise field is required',
            'mobile.unique'            => 'This Phone number is already taken. Please input different Phone number.',
        ]);

        Trainer::newTrainer($request);

        return response()->json(['message' => 'Trainer created successfully.']);
    }


    public function update(Request $request, Trainer $trainer)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'mobile' => 'nullable|string|max:20',
            'experience' => 'nullable|string',
            'description' => 'nullable|string',
            'expertise' => 'required|string',
            'availability' => 'nullable|string',
            'active_status' => 'nullable|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        Trainer::updateTrainer($request, $trainer);
        return response()->json($trainer);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trainer $trainer)
    {
        Trainer::deleteTrainer($trainer);

        return response()->json(null, 204);
    }

    public function getTrainers()
    {
        // Fetch users with the Trainer role
        $trainers = User::role('Trainer')->get(['id', 'name']);

        return response()->json($trainers);
    }

}
