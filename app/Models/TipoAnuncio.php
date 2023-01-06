<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoAnuncio extends Model
{
    use HasFactory;

    protected $table = 'tipo_anuncios';

    public function anuncio_produtos_tipo() {
        return $this->hasMany('App\Models\AnuncioProduto', 'id', 'tipo_anuncios_id');
    }
}
