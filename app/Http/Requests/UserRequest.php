<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            // 'email' => ['required', 'email'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'email.required' => 'O campo E-mail é obrigatório',
            'email.email' => 'O campo email não está no formato correto',
            'password.required' => 'O campo senha é obrigatório',
            'password.min' => 'O campo senha tem o mínimo de 6 caracteres',
            'password.confirmed' => 'O campo de confirmação tem que ser igual a senha.',
        ];
    }
}
