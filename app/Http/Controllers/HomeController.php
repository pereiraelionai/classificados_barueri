<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioProduto;
use App\Models\Categoria;
use App\Models\AnuncioEmprego;
use App\Models\AnuncioServico;

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
    #TODO:Criar paginação para os anuncios
    public function anuncioFiltro($filtro) {

        $anuncio_filtrado = [];

        $anuncio_filtrado = AnuncioProduto::where('ativo', '=', 1)->where('categoria_id', '=', $filtro)
        ->leftjoin('categorias', 'categoria_id', '=', 'categorias.id')
        ->leftjoin('tipo_anuncios', 'tipo_anuncios_id', '=', 'tipo_anuncios.id')
        ->select('anuncio_produtos.*', 'categorias.nome_categoria', 'tipo_anuncios.tipo')
        ->orderByRaw('anuncio_produtos.id DESC')->get();

        $qtd_anuncios = AnuncioProduto::where('ativo', '=', 1)->where('categoria_id', '=', $filtro)->count();

        $categoria = Categoria::where('id', '=', $filtro)->get('nome_categoria');

        return view('anuncio_filtro')->with('anuncio_filtrado', $anuncio_filtrado)->with('categoria', $categoria)->with('qtd_anuncios', $qtd_anuncios);
    }

    public function anuncioSearch(Request $request) {

        $pesquisa = $request->input('pesquisa');

        $anuncio_search = [];

        $anuncio_search = AnuncioProduto::where('ativo', '=', 1)->where('titulo', 'like', '%'.$pesquisa.'%')
        ->leftjoin('categorias', 'categoria_id', '=', 'categorias.id')
        ->leftjoin('tipo_anuncios', 'tipo_anuncios_id', '=', 'tipo_anuncios.id')
        ->select('anuncio_produtos.*', 'categorias.nome_categoria', 'tipo_anuncios.tipo')
        ->orderByRaw('anuncio_produtos.id DESC')->get();

        $qtd_anuncios = AnuncioProduto::where('ativo', '=', 1)->where('titulo', 'like', '%'.$pesquisa.'%')->count();

        return view('anuncio_search')->with('anuncio_search', $anuncio_search)->with('qtd_anuncios', $qtd_anuncios);
    }

    public function empregosOnly() {

        $empregos = AnuncioEmprego::where('ativo', '=', 1)
        ->leftjoin('categorias', 'categoria_id', '=', 'categorias.id')
        ->leftjoin('tipo_anuncios', 'tipo_anuncios_id', '=', 'tipo_anuncios.id')
        ->select('anuncio_empregos.*', 'categorias.nome_categoria', 'tipo_anuncios.tipo')
        ->orderByRaw('anuncio_empregos.id DESC')->get();

        $qtd_anuncios = AnuncioEmprego::where('ativo', '=', 1)->count();


        return view('anuncio_empregosOnly')->with('empregos', $empregos)->with('qtd_anuncios', $qtd_anuncios);
    }

    public function servicosOnly() {

        $servicos = AnuncioServico::where('ativo', '=', 1)
        ->leftjoin('categorias', 'categoria_id', '=', 'categorias.id')
        ->leftjoin('tipo_anuncios', 'tipo_anuncios_id', '=', 'tipo_anuncios.id')
        ->select('anuncio_servicos.*', 'categorias.nome_categoria', 'tipo_anuncios.tipo')
        ->orderByRaw('anuncio_servicos.id DESC')->get();

        $qtd_anuncios = AnuncioServico::where('ativo', '=', 1)->count();


        return view('anuncio_servicosOnly')->with('servicos', $servicos)->with('qtd_anuncios', $qtd_anuncios);
    }
}
