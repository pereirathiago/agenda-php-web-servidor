<?php

namespace App\Http\Requests\convite;

use App\Models\Convite;
use Illuminate\Foundation\Http\FormRequest;

use \App\Models\Local;

class UpdateConviteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->can('update', Convite::find($this->id));
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
            'statusConvite' => 'required|in:0,1',
            'idCompromisso' => 'required|exists:compromissos,id',
        ];
    }
}
