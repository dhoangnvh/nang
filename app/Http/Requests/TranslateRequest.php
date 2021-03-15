<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TranslateRequest extends FormRequest
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
            'project_id' => 'required',
            // 'key_file_path' => 'required',
        ];
    }

    public function messages()
    {
        return [
            "project_id.required" => "公開キーは必須項目です。",
            "key_file_path.required" => "秘密キーは必須項目です。",
        ];
    }
}
