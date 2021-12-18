<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardCreateRequest extends FormRequest
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
            'letter'      => 'required',
            'word'        => 'required',
            'translation' => 'required',
            'language_id' => 'required',
            'img_front'   => 'required|mimes:jpeg,jpg,png,gif',
            'sound'       => 'required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav',
            'img_back'    => 'mimes:jpeg,jpg,png,gif',
            'video'       => 'mimes:application/octet-stream,video/webm,mp4,ogg',
        ];
    }
}
