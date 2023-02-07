<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultantStoreRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user()->can('create consultant');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname'    => 'required|string',
            'lastname'     => 'required|string',
            'email'        => 'required|email',
            'birthday'     => 'required|date',
            'nationality'  => 'required|string',
            'religion'     => 'required|string',
            'gender'       => 'required|string',
            'phone'        => 'required|string',
            'address'      => 'required|string',
            'photo'        => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',

            //Qualification
            'qualification'     => 'required|string',
            'specialization'    => 'required|string',
            'membership'        => 'required',
        ];
    }
}