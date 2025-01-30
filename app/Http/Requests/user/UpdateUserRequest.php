<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            "name" => "required|string",
            "email" => [
                'required',
                'string',
                'email',
                Rule::unique('users')->ignore($this->user()->id),
            ],
            'nome_usuario' => [
                'required',
                'string',
                'max:30',
                Rule::unique('users', 'nome_usuario')->ignore($this->user()->id),
            ],
            'data_nascimento' => 'required|date|before:today',
            'genero' => 'required|in:Masculino,Feminino,Outro',
            'foto_perfil' => 'nullable|url',
            'password' => [
                'required',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ],
        ];
    }
}
