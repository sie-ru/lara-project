<?php

namespace App\Http\Services;

use App\Jobs\RegisterUserJob;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AuthService
{
    public function register(array$data) : bool
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'telegram' => $data['telegram'],
            'avatar' => $data['avatar'] ?? '/default.jpg'
        ]);

        if($user) {
            return true;
        }

        return false;
    }

    public function login(array $data) : bool
    {
        if(auth('web')->attempt($data)) {
            return true;
        }

        return false;
    }

    public function logout() : bool
    {
        if(auth('web')->logout()) {
            return true;
        }

        return false;
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        //Todo
    }
}
