<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('admin.form_reset_password')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

    protected $redirectTo = RouteServiceProvider::HOME;

    protected function validationErrorMessages()
    {
        return [
            'password.required'=>'パスワードは、必ず指定してください。',
            'password.min'=>'パスワードは8文字以上で、確認と一致する必要があります。',
            'password.confirmed'=>'パスワードとパスワード確認が一致しません。'
        ];
    }
}
