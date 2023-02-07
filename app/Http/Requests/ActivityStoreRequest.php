<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ActivityStoreRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->can('create activity');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'video'         => 'nullable|mimetypes:video/mp4,video/x-flv,video/avi,video/quicktime,video/x-ms-wmv',
            'title'         => 'required|string',
            'description'   => 'required|string',
            'tutorial'      => 'required|string',
        ];
    }
}