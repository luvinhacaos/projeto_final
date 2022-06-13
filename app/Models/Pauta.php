<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pauta extends Model
{
    use HasFactory;

    protected $fillable = [
        'desc_pauta',
        'tipo_pauta',
        'ativa_sn',
    ];

    public function votos()
    {
        return $this->hasMany(Voto::class, 'id_pauta');
    }
}
