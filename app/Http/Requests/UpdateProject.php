<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProject extends FormRequest
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
            'name' => 'required',
            // 'image' => 'required',
            'description' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên dự án không được trống.',
            // 'image.required' => 'Ảnh không được trống.',
            'description.required' => 'Mô tả không được trống.',
            'content.required' => 'Nội dung không được trống.',
        ];
    }
}
