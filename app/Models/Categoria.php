<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public function anuncio_produtos() {
        return $this->belongsTo('App\Models\AnuncioProduto', 'id', 'categoria_id');
    }
}
