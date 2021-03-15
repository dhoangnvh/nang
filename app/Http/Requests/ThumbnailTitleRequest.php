<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThumbnailTitleRequest extends FormRequest
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
            'thumbnail' => 'nullable|image',
            'title' => 'nullable|max:100'
        ];
    }

    public function messages()
    {
        return [
            "thumbnail.image" => "画像の形式は正しくありません。",
            "title.max" => "タイトルは100文字以下入力してください。",
        ];
    }
}
