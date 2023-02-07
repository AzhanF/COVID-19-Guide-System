<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdviceStoreRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->can('create advice');
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
            'advice'        => 'required|string',
            'consultant_id' => 'required|integer',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }
}