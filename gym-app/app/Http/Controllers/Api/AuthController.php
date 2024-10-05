<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Trainee;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Admin,Trainer,Trainee',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Assign role to the user
        $user->assignRole($validatedData['role']);

        if ($validatedData['role'] === 'Trainee') {
            Trainee::create([
                'user_id' => $user->id,
                'mobile' => '0 ',
                'gender' => ' ',
                'date_of_birth' => now()->toDateString(),

            ]);
        }

        return response()->json([
            'message' => 'User registered successfully.',
            'user' => $user,
        ], 201);
    }

    // User login
    public function login(Request $request)
    {


        // In your login method
        try {
            // Validate the login credentials
            $credentials = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            // Attempt to log the user in
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $token = $user->createToken('API Token')->plainTextToken; // If using Sanctum

                return response()->json([
                    'message' => 'Login successful.',
                    'user' => $user,
                    'token' => $token,
                ]);
            }

            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        } catch (\Exception $e) {
            Log::error('Login Error: ' . $e->getMessage());
            return response()->json(['error' => 'Something went wrong!'], 500);
        }
    }

    // User logout
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete(); // If using Sanctum

        return response()->json([
            'message' => 'Logged out successfully.',
        ]);
    }
}
