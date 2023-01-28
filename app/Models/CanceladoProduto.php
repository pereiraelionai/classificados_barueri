<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CanceladoProduto extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'anuncio_produtos_id', 'motivo_cancelados_id', 'descricao'];

}
