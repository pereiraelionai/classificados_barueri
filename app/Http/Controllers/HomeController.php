<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioProduto;

class HomeController extends Controller
{
    public function index() {

        $anuncios_produtos = [];

        $anuncios_produtos = AnuncioProduto::where('ativo', '=', 1)
        ->leftjoin('categorias', 'categoria_id', '=', 'categorias.id')
        ->leftjoin('tipo_anuncios', 'tipo_anuncios_id', '=', 'tipo_anuncios.id')
        ->select('anuncio_produtos.*', 'categorias.nome_categoria', 'tipo_anuncios.tipo')
        ->orderByRaw('anuncio_produtos.id DESC')->get();

        return view('index')->with('anuncio_produtos', $anuncios_produtos);
    }
}
