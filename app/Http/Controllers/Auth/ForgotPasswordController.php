<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
        return view('admin.forgot_password');
    }

    protected function validateEmail(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());
    }

    public function rules(){
        return [
            'email' => 'required|email',
        ];
    }

    public function validationErrorMessages(){
        return [
            'email.required'=>'',
            'email.email'=>'メールアドレスの形式が正しくありません'
        ];
    }

    // protected function sendResetLinkFailedResponse(Request $request, $response)
    // {
    //     $response = 'nooo';
    //     return back()
    //             ->withInput($request->only('email'))
    //             ->withErrors(['email' => trans($response)]);
    // }
}
