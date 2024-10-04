<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GymClass;
use App\Models\Trainer;
use Illuminate\Support\Facades\Auth;


class TrainerDashboardController extends Controller
{
    public function index()
    {
        $trainerId = Trainer::where('user_id', Auth::id())->value('id');
        $gymClasses = GymClass::where('trainer_id', $trainerId)
            ->orderBy('class_time', 'asc')
            ->get();

        return view('trainer.home.index', compact('gymClasses'));
    }
}
