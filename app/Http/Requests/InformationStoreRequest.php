<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationStoreRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->can('create information');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'         => 'required|string',
            'description'   => 'required|string',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}