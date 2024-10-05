<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TrainerController;
use App\Http\Controllers\Api\GymClassController;
use App\Http\Controllers\Api\BookingController;

// routes/api.php

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


// Routes that require authentication
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);


    // Trainer routes
    Route::middleware(['role:Trainer'])->group(function () {
        Route::get('trainer-classes', [GymClassController::class, 'indexForTrainer']);
    });

    // Trainee routes
    Route::middleware(['role:Trainee'])->group(function () {
        Route::get('/gym-classes', [GymClassController::class, 'index']);
        Route::get('/bookings', [BookingController::class, 'index']);         // List all bookings for the authenticated trainee
        Route::post('/bookings', [BookingController::class, 'store']);        // Create a new booking
        Route::delete('/bookings/{id}', [BookingController::class, 'destroy']);

    });

    Route::middleware(['auth:sanctum', 'role:Admin'])->group(function () {
        Route::get('/trainers/names', [TrainerController::class, 'getTrainers']);
        Route::get('/trainers', [TrainerController::class, 'index']);         // List all trainers
        Route::post('/trainers', [TrainerController::class, 'store']);       // Create a new trainer
        Route::put('/trainers/{trainer}', [TrainerController::class, 'update']); // Update a specific trainer
        Route::delete('/trainers/{trainer}', [TrainerController::class, 'destroy']); // Delete a specific trainer


        Route::get('/gym-classes', [GymClassController::class, 'index']);          // List all gym classes
        Route::post('/gym-classes', [GymClassController::class, 'store']);        // Create a new gym class
        Route::put('/gym-classes/{gymClass}', [GymClassController::class, 'update']); // Update a specific gym class
        Route::delete('/gym-classes/{gymClass}', [GymClassController::class, 'destroy']); // Delete a specific gym class
    });
});





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

