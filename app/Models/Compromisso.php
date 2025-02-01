<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Compromisso extends Model
{
    /** @use HasFactory<\Database\Factories\CompromissoFactory> */
    use HasFactory;

    protected $table = 'compromissos';

    protected $fillable = [
        'id_compromisso_organizador',
        'titulo',
        'descricao',
        'data_hora_inicio',
        'data_hora_fim',
        'id_local',
    ];

    protected $casts = [
        'data_hora_inicio' => 'datetime',
        'data_hora_fim' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function local(): BelongsTo
    {
        return $this->belongsTo(Local::class);
    }
}
