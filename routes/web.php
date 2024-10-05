<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Trainer\TrainerDashboardController;
use App\Http\Controllers\Trainee\TraineeDashboardController;
use App\Http\Controllers\Admin\TrainerController;
use App\Http\Controllers\Admin\GymClassController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['middleware' => ['role:Trainer']], function() {
    Route::get('/trainer/dashboard', [TrainerDashboardController::class, 'index'])->name('trainer.dashboard');
});

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/list/gymclass', [WebsiteController::class, 'gymClass'])->name('list.gymclass');
Route::get('/list/trainers', [WebsiteController::class, 'trainers'])->name('list.trainers');

Route::group(['middleware' => ['role:Admin']], function() {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('trainer', TrainerController::class);
    Route::resource('gymClass', GymClassController::class);
});



Route::group(['middleware' => ['role:Trainee']], function() {
    Route::get('/trainee/dashboard', [TraineeDashboardController::class, 'index'])->name('trainee.dashboard');
    Route::post('/trainee/profile/update', [TraineeDashboardController::class, 'updateProfile'])->name('trainee.profile.update');
    Route::post('/bookings', [BookingController::class, 'create'])->name('bookings.create');
    Route::get('list/bookings', [TraineeDashboardController::class, 'myBookings'])->name('bookings.list');
});



