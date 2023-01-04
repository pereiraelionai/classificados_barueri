<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioProduto;

class HomeController extends Controller
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

        $anuncios_produtos = AnuncioProduto::where('id_user', '=', $id_user)->get();
        
        return view('minha_area')->with('anuncio_produtos', $anuncios_produtos);
    }
}
