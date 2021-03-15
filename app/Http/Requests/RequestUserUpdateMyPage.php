<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\User;
use Auth;

class RequestUserUpdateMyPage extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'login' => ['required',Rule::unique('users', 'login')->ignore(Auth::id())],
            'email' => ['nullable','email',Rule::unique('users', 'email')->ignore(Auth::id())],
            'password' => 'nullable|min:8',
            'confirm_password' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'login.required' => 'ログインIDは、必ず指定してください。',
            'login.unique' => '指定のログインIDは既に使用されています。',
            'email.email' => 'メールアドレスの形式が正しくありません',
            'email.unique' => '指定のメールアドレスは既に使用されています。',
            'password.min' => 'パスワードは8文字以上で、確認と一致する必要があります。',
            'confirm_password.same' => 'パスワードとパスワード確認が一致しません。',
        ];
    }
}
