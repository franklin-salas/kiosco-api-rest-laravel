<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RegistroRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'email','unique:users,email'],
            'password' => ['required', 'confirmed'],
        ];

        /*
        use Illuminate\Validation\Rules\Password as PasswordRule;

        
        'password' => ['required', 'confirmed', PasswordRule::min(8)->letters()->symbols()->numbers()]
        */
    }
}
