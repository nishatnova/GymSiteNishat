<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GymClass;
use App\Models\Trainer;

class WebsiteController extends Controller
{
    public function index()
    {
        $gymClasses = GymClass::where('active_status', 1)
            ->orderBy('class_time', 'asc')
            ->get();
        return view('website.home.index', compact('gymClasses'));
    }

    public function gymClass()
    {
        $gymClasses = GymClass::where('active_status', 1)
            ->orderBy('class_time', 'asc')
            ->get();
        return view('website.others.gymClass', compact('gymClasses'));
    }

    public function trainers()
    {
        $trainers = Trainer::with('user')->orderBy('id', 'desc')->get();
        return view('website.others.trainers', compact('trainers'));
    }

}
