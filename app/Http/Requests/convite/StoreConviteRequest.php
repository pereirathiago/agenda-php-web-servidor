<?php

namespace App\Http\Requests\convite;

use Illuminate\Foundation\Http\FormRequest;

use \App\Models\Local;

class StoreConviteRequest extends FormRequest
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
            'idUsuarioConvidado' => 'required|exists:users,id',
            'statusConvite' => 'required|in:0,1,2,3',
            'idCompromisso' => 'required|exists:compromissos,id',
        ];
    }
    
}
