<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->usuario);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'nomeCompleto' => 'sometimes|string|max:255',
            'nomeUsuario' => 'sometimes|string|max:255|unique:usuarios,nome_usuario,' . $this->usuario->id,
            'dataNascimento' => 'sometimes|date|before:today',
            'genero' => 'sometimes|in:Masculino,Feminino,Outro',
            'fotoPerfil' => 'nullable|url',
            'email' => 'sometimes|email|unique:users,email,' . $this->user()->id,
            'senha' => [
                'sometimes',
                'confirmed',
                Password::min(8)
                    ->letters()
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
            ]
        ];
    }
}
