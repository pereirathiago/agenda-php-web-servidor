<?php

namespace App\Http\Requests\compromisso;

use Illuminate\Foundation\Http\FormRequest;

use \App\Models\Local;

class StoreCompromissoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'titulo' => 'required|string',
            'descricao' => 'nullable|string',
            'data_hora_inicio' => 'required|date',
            'data_hora_fim' => 'required|date',
            'id_local' => [
            'required',
            'exists:locais,id',
            function ($attribute, $value, $fail) {
                if (!Local::where('id', $value)->where('id_usuario', auth()->id())->exists()) {
                $fail('O local selecionado não pertence ao usuário autenticado.');
                }
            },
            ],
        ];
    }
    
}
