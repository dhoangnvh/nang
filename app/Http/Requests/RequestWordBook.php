<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class RequestWordBook extends FormRequest
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
            'title_book' => ['required',Rule::unique('word_book', 'name')->where(function ($query) {
                return $query->where('user_id', Auth::id());
            })->ignore($this->id)],
        ];
    }

    public function messages()
    {
        return [
            'title_book.required' => '単語は空白または重複しています。',
            'title_book.unique' => '単語は空白または重複しています。',
        ];
    }
}
