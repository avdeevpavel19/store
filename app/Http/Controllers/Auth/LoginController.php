<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(LoginRequest $request) {
        $success = auth()->attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        if ($success) {
            return redirect(route('welcome'));
        } else {
            throw ValidationException::withMessages([
                'exception' => 'Логин или пароль введен не верно',
            ]);
        }
    }

    public function logout() {
        auth()->logout();

        return redirect()->route('login');
    }
}
