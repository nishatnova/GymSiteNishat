<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Illuminate\Support\Facades\Auth;

class LoginResponse implements LoginResponseContract
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
