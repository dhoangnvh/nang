<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestSetting extends FormRequest
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
            'google_sheet_url' => 'required',
            'google_sheet_name' => 'required',
            'youtube_api_key' => 'required',
            'channel_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'google_sheet_url.required' => 'Google スプレッドシートは、必ず指定してください。',
            'google_sheet_name.required' => 'シート名は、必ず指定してください。',
            'youtube_api_key.required' => 'Youtube Api Keyは、必ず指定してください。',
            'channel_id.required' => 'Channelは、必ず指定してください。'
        ];
    }
}
