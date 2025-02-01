<?php

namespace App\Http\Requests\compromisso;

use Illuminate\Foundation\Http\FormRequest;

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
            'id_local' => 'required|exists:locais,id',
        ];
    }
    
}
