<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        try {
            $success = auth()->attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ]);

            if ($success) {
                return redirect(route('catalog.index'));
            } else {
                throw ValidationException::withMessages([
                    'exception' => 'Логин или пароль введен не верно',
                ]);
            }
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('login');
    }
}
