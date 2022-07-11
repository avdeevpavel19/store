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
    public function index() {
        return view('auth.register');
    }

    public function store(RegisterRequest $request) {
        $user = User::create([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        if ($user) {
            event(new Registered($user));

            auth("web")->login($user);

            return redirect()->route('verification.notice');
        }
    }

    public function verify() {
        return view('auth.verify-email');
    }

    public function emailVerificationRequest(EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('catalog.index');
    }

    public function sendEmailVerificationNotification(Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Отправлена ссылка для подтверждения!');
    }
}
