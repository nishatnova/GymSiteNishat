<?php

namespace App\Actions\Fortify;

use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Models\Trainee;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'role' => ['required', 'in:Admin,Trainer,Trainee'], // Validate role input
        ])->validate();

        // Create the user
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        // Assign role to the user based on the input
        $role = $input['role'];
        $user->assignRole($role);

        if ($role === 'Trainee') {
            Trainee::create([
                'user_id' => $user->id,
                'mobile' => '0111222',
                'gender' => 'female',
                'date_of_birth' => now()->toDateString(),

            ]);
        }

        return $user;


    }
}
