<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function getTrainers()
    {
        // Fetch users with the Trainer role
        $trainers = User::role('Trainer')->get(['id', 'name']);

        return response()->json($trainers);
    }
}
