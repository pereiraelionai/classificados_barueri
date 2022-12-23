<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;


class AnuncioProduto extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('form.anuncioProduto');
    }

    public static function Categorias() {

        $categorias = Categoria::all();

        success('Categorias', 'Lista de categorias para o select do form', $categorias);
    }
}
