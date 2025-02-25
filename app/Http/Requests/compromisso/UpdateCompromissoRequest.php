<?php

namespace App\Http\Requests\compromisso;

use App\Models\Compromisso;
use Illuminate\Foundation\Http\FormRequest;

use \App\Models\Local;

class UpdateCompromissoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('update', Compromisso::find($this->id));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|exists:compromissos,id',
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
