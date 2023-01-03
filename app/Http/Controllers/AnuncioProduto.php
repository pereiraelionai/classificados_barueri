<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\AnuncioProduto as Produto;


class AnuncioProduto extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('form.anuncioProduto');
    }

    public function store(Request $request) {

        $regras = [
            'titulo' => 'required|min:3|max:86',
            'descricao' => 'required|max:257',
            'categoria' => 'required',
            'valor' => 'required',
            'foto_capa' => 'required|mimes:jpg,jpeg,png',
            'foto_1' => 'mimes:jpg,jpeg,png|size:512'
        ];

        $msg = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'min' => 'O título deve conter no mínimo 3 caracteres',
            'titulo.max' => 'O título deve conter no máximo 86 caracteres',
            'descricao.max' => 'A descrição deve conter no máximo 257 caracteres',
            'mimes' => 'A foto deve ser um arquivo do tipo JPG, JPEG ou PNG',
        ];

        $request->validate($regras, $msg);

        $produto = new Produto();

        $produto->titulo = $request->input('titulo');
        $produto->descricao = $request->input('descricao');
        $produto->categoria = $request->input('categoria');
        $produto->valor = $request->input('valor');

        if($request->hasFile('foto_capa') && $request->file('foto_capa')->isValid()) {

            $requestFoto = $request->input('foto_capa');
            $extencao = $requestFoto->extension();
            $fotoNome = md5($requestFoto->getClientOriginalName() . strtotime('now') . "." . $extencao);
            $requestFoto->move(public_path('img/anuncio_produtos'), $fotoNome);
            $produto->foto_1 = $fotoNome;
        }

        if($request->hasFile('foto_1') && $request->file('foto_1')->isValid()) {

            $requestFoto = $request->input('foto_1');
            $extencao = $requestFoto->extension();
            $fotoNome = md5($requestFoto->getClientOriginalName() . strtotime('now') . "." . $extencao);
            $requestFoto->move(public_path('img/anuncio_produtos'), $fotoNome);
            $produto->foto_1 = $fotoNome;
        }

        $produto->save();

        return redirect()->route('minha_area');

    }

    public static function Categorias() {

        $categorias = Categoria::all();

        success('Categorias', 'Lista de categorias para o select do form', $categorias);
    }
}
