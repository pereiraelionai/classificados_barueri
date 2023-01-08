<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioProduto;

class MinhaArea extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $id_user = auth()->user()->id;
        
        $anuncios_produtos = AnuncioProduto::where('id_user', '=', $id_user)->where('ativo', '=', 1)
                            ->leftjoin('categorias', 'categoria_id', '=', 'categorias.id')
                            ->leftjoin('tipo_anuncios', 'tipo_anuncios_id', '=', 'tipo_anuncios.id')
                            ->select('anuncio_produtos.*', 'categorias.nome_categoria', 'tipo_anuncios.tipo')
                            ->orderByRaw('anuncio_produtos.id DESC')->get();
        
        return view('minha_area')->with('anuncio_produtos', $anuncios_produtos);
    }
}
