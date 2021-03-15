<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class RequestWordBookUpdate extends FormRequest
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
            'name_book'=>['required',Rule::unique('word_book', 'name')->where(function ($query) {
                return $query->where('user_id', Auth::id());
            })->ignore($this->book_id)],
            'text_translate'=>[Rule::unique('text_translate', 'text')->where(function ($query) {
                return $query->where('book_id', $this->book_id);
            })->ignore($this->text_translate_id)]
        ];
    }

    public function messages()
    {
        return [
            'text_translate.unique' => '翻訳単語は重複できません。',
            'name_book.required' => '単語は空白または重複しています。',
            'name_book.unique' => '単語は空白または重複しています。'
        ];
    }
}
