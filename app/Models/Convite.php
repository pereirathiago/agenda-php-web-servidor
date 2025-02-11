<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Convite extends Model
{
    use HasFactory;

    protected $table = 'convites';

    protected $fillable = [
        'status_convite',
        'id_usuario_convidado',
        'id_compromisso'
    ];


    public function usuarioConvidado(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_usuario_convidado');
    }

    public function compromisso(): BelongsTo
    {
        return $this->belongsTo(Compromisso::class, 'id_compromisso');
    }
}
