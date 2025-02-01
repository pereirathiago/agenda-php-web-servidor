<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local extends Model
{
    /** @use HasFactory<\Database\Factories\LocalFactory> */
    use HasFactory;

    protected $table = 'locais';

    protected $fillable = [
        'id_usuario',
        'cep',
        'endereco',
        'sem_numero',
        'numero',
        'bairro',
        'cidade',
        'estado',
    ];
    
    protected $casts = [
        'sem_numero' => 'boolean',
    ];
    
}
