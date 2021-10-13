<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required','between:3,50'],
            'email' => ['required','email'],
            'country_id' => ['required','exists:countries,id'],
            'aspiration_id' => ['required','exists:aspirations,id'],
            'therapy_id' => ['required','exists:therapies,id'],
        ];
    }
}
