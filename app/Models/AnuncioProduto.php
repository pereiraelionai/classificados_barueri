<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnuncioProduto extends Model
{
    use HasFactory;

    protected $table = 'anuncio_produtos';

    public function categorias() {
        return $this->hasMany('App\Models\Categoria', 'id', 'categoria_id');
    }

    public function tipo_anuncios() {
        return $this->hasMany('App\Models\TipoAnuncio', 'id', 'tipo_anuncios_id');
    }
}
