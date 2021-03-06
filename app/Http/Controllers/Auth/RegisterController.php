<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $request)
    {
        try {
            $user = User::create([
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);

            event(new Registered($user));
            auth("web")->login($user);

            return redirect()->route('verification.notice');
        } catch (\Illuminate\Database\QueryException $queryException) {
            return abort(500);
        }
    }

    public function verify()
    {
        return view('auth.verify-email');
    }

    public function emailVerificationRequest(EmailVerificationRequest $request)
    {
        try {
            $request->fulfill();
            return redirect()->route('catalog.index');
        } catch (\OAuthException $OAuthException) {
            return abort(403);
        }
    }

    public function sendEmailVerificationNotification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Отправлена ссылка для подтверждения!');
    }
}
