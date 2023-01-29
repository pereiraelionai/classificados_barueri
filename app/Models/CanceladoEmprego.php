<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanceladoEmprego extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'anuncio_empregos_id', 'motivo_cancelados_id', 'descricao'];
}
