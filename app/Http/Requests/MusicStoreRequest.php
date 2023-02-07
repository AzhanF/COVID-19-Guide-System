<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MusicStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->can('create music');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'audio'         => 'nullable|file|mimes:mp3,ogg,wav',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'title'         => 'required|string',
            'artist'        => 'nullable|string',
            'genre'         => 'nullable|string',

        ];
    }
}
