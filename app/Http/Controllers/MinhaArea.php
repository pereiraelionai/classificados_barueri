<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioProduto;
use App\Models\AnuncioEmprego;
use App\Models\AnuncioServico;


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
    public function AnuncioProdutos()
    {   
        $id_user = auth()->user()->id;
        
        $anuncios_produtos = AnuncioProduto::where('id_user', '=', $id_user)->where('ativo', '=', 1)
                            ->leftjoin('categorias', 'categoria_id', '=', 'categorias.id')
                            ->leftjoin('tipo_anuncios', 'tipo_anuncios_id', '=', 'tipo_anuncios.id')
                            ->select('anuncio_produtos.*', 'categorias.nome_categoria', 'tipo_anuncios.tipo')
                            ->orderByRaw('anuncio_produtos.id DESC')->get();
        
        success('Anuncio Empregos', 'Lista de anuncio de empregos para a minha area', $anuncios_produtos);
    }

    public function AnuncioEmpregos() {

        $id_user = auth()->user()->id;

        $anuncio_empregos = AnuncioEmprego::where('id_user', '=', $id_user)->where('ativo', '=', 1)
                            ->leftjoin('regimes', 'regime_id', '=', 'regimes.id')
                            ->select('anuncio_empregos.*', 'regimes.nome_regime')
                            ->orderByRaw('anuncio_empregos.id DESC')->get();

        success('Anuncio Empregos', 'Lista de anuncio de empregos para a minha area', $anuncio_empregos);
    }

    public function AnuncioServicos() {

        $id_user = auth()->user()->id;

        $anuncio_servicos = AnuncioServico::where('id_user', '=', $id_user)->where('ativo', '=', 1)
                            ->orderByRaw('anuncio_servicos.id DESC')->get();

        success('Anuncio Empregos', 'Lista de anuncio de empregos para a minha area', $anuncio_servicos);
    }

    public function getProduto(Request $request) {
        
        $anuncio_produto = AnuncioProduto::where('id', '=', $request->input('id'))->select('titulo')->get();
        
        success('Produto', 'Produto selecionado', $anuncio_produto);

    }

    public function getEmprego(Request $request) {
        
        $anuncio_emprego = AnuncioEmprego::where('id', '=', $request->input('id'))->select('titulo')->get();
        
        success('Emprego', 'Emprego selecionado', $anuncio_emprego);

    }
}
