<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\AuthService;
use App\Jobs\RegisterUserJob;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __invoke()
    {
        return view('auth.register', []);
    }

    public function registration(AuthService $service, RegisterRequest $request) {

        $register = $service->register($request->validated());

        if($register) {
            $this->dispatch(new RegisterUserJob($request->email));
            return redirect(route('auth_login'))->with(['registration_success' => 'Registration successful. Sing In...']);
        }

        return redirect(route('auth_reg'))->withErrors(['reg' => 'Undefined error, try again']);
    }
}
