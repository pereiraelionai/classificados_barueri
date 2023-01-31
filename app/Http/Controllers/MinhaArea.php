<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioProduto;
use App\Models\AnuncioEmprego;
use App\Models\AnuncioServico;
use App\Classes\stdObject;


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

    public function getServico(Request $request) {
        
        $anuncio_servico = AnuncioServico::where('id', '=', $request->input('id'))->select('titulo')->get();
        
        success('Serviço', 'Serviço selecionado', $anuncio_servico);

    }

    public function getInativos() {

        $id_user = auth()->user()->id;

        $anuncio_produtos = AnuncioProduto::where('ativo', '=', 0)->where('id_user', '=', $id_user)->select('id', 'titulo', 'valor', 'tipo_anuncios_id')->get();
        $anuncio_empregos = AnuncioEmprego::where('ativo', '=', 0)->where('id_user', '=', $id_user)->select('id', 'titulo', 'salario as valor', 'tipo_anuncios_id')->get();
        $anuncio_servico = AnuncioServico::where('ativo', '=', 0)->where('id_user', '=', $id_user)->select('id', 'titulo', 'valor', 'tipo_anuncios_id')->get();

        $array_inativos = [];
        
        foreach($anuncio_produtos as $key => $produtos) {
            $inativos = new stdObject();
            $inativos->id = $produtos->id;
            $inativos->titulo = $produtos->titulo;
            $inativos->valor = $produtos->valor;
            $inativos->tipo_anuncio_id = $produtos->tipo_anuncios_id;
            $array_inativos[] = $inativos;
        }

        foreach($anuncio_empregos as $key => $empregos) {
            $inativos = new stdObject();
            $inativos->id = $empregos->id;
            $inativos->titulo = $empregos->titulo;
            $inativos->valor = $empregos->valor;
            $inativos->tipo_anuncio_id = $empregos->tipo_anuncios_id;
            $array_inativos[] = $inativos;
        }

        foreach($anuncio_servico as $key => $servicos) {
            $inativos = new stdObject();
            $inativos->id = $servicos->id;
            $inativos->titulo = $servicos->titulo;
            $inativos->valor = $servicos->valor;
            $inativos->tipo_anuncio_id = $servicos->tipo_anuncios_id;
            $array_inativos[] = $inativos;
        }

        success('Inativos', 'Inativos para a table', $array_inativos);

    }
}
