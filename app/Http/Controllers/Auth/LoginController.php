<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Services\AuthService;
use Illuminate\Http\Response;


class LoginController extends Controller
{
    public function __invoke()
    {
        return view('auth.login', []);
    }

    public function login(AuthService $service, LoginRequest $request) {

        $auth = $service->login($request->validated());

        if($auth) {
            return redirect(route('index'));
        }

        return redirect(route('auth_login'))->withErrors(['login_error' => 'Login error, please try again']);
    }

    public function logout(AuthService $service) {

        $logout = $service->logout();

        if($logout) {
            return redirect(route('index'));
        }

        return redirect(route('auth_login'))->withErrors(['logout_error' => 'Undefined error, try again']);
    }
}
