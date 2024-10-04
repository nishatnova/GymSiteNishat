<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Trainee;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            // Add other validation rules as needed
        ]);

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // Create the trainee record
        Trainee::create([
            'user_id' => $user->id,
            'mobile' => '011122233', // Replace with actual data
            'gender' => 'female', // Replace with actual data
            'date_of_birth' => now()->toDateString(), // Replace with actual data
        ]);

        // Redirect or return response
        return redirect()->route('home')->with('success', 'Registration successful!');
    }
}

