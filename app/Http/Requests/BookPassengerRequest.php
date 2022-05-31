<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookPassengerRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'given_name' => 'required',
            'surname' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'passport' => 'required',
             
        ];
    }
}
