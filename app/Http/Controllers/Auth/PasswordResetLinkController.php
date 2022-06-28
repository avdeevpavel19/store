<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ForgotPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class PasswordResetLinkController extends Controller
{
    public function index() {
        return view('auth.forgot-password');
    }

    public function store(ForgotPasswordRequest $request) {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if($status == "passwords.sent") {
            if ($status === Password::RESET_LINK_SENT) {
                return back()->with(['success' => 'На вашу почту отправлено письмо с восстановлением пароля.Перейдите по ссылке']);
            }
        } else {
            throw ValidationException::withMessages([
                'exception' => 'Пользователь с таким email не найден',
            ]);
        }
    }
}
