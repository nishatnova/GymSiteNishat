<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GymClass;

class WebsiteController extends Controller
{
    public function index()
    {
        $gymClasses = GymClass::where('active_status', 1)
            ->orderBy('class_time', 'asc')
            ->get();
        return view('website.home.index', compact('gymClasses'));
    }

}
