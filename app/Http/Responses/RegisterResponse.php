<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\RegisterResponse as RegisterResponseContract;
use Illuminate\Support\Facades\Auth;

class RegisterResponse implements RegisterResponseContract
{
    public function toResponse($request)
    {
        $user = Auth::user();

        if ($user->hasRole('Admin')) {
            return redirect()->route('admin.dashboard');
        }
        elseif ($user->hasRole('Trainer')) {
            return redirect()->route('trainer.dashboard');
        }
        elseif ($user->hasRole('Trainee')) {
            return redirect()->route('trainee.dashboard');
        }

        return redirect('/dashboard');
    }
}

