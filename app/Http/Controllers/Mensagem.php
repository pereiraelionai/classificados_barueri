<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioProduto;
use App\Models\AnuncioEmprego;
use App\Models\AnuncioServico;
use App\Models\Conversa;
use App\Models\Mensagem as ORMMensagem;

class Mensagem extends Controller
{   
    public function index() {

        $id_user = auth()->user()->id;

        $mensagens = ORMMensagem::where('id_remetente', $id_user)
                                ->leftjoin('tipo_anuncios', 'tipo_anuncio', '=', 'tipo_anuncios.id')
                                ->leftjoin('anuncio_produtos', 'anuncio_id', '=', 'anuncio_produtos.id')
                                ->select('mensagens.*', 'tipo_anuncios.tipo', 'anuncio_produtos.titulo as title_anuncio')->get();

        return view('mensagens')->with('mensagens', $mensagens);
    }

    public function create($id_anuncio, $tipo_anuncio) {
        
        if($tipo_anuncio == 1) {
            $anuncio = AnuncioProduto::find($id_anuncio);
        }

        if($tipo_anuncio == 2) {
            $anuncio = AnuncioServico::find($id_anuncio);
        }

        if($tipo_anuncio == 3) {
            $anuncio = AnuncioEmprego::find($id_anuncio);
        }

        return view('form.mensagens')->with('anuncio', $anuncio);
    }

    public function store(Request $request) {
        
        $regras = [
            'titulo' => 'required|max: 80',
            'mensagem' => 'required|max: 1600'
        ];

        $msg = [
            'required' => 'O campo :attribute não pode estar em branco.',
            'mensagem.max' => 'A mensagem deve ter no máximo 1600 caracteres',
            'titulo.max' => 'O título deve conter no máximo 80 caracteres'
        ];

        $request->validate($regras, $msg);

        $conversa = new Conversa();
        $conversa->mensagem = $request->input('mensagem');
        $conversa->save();

        $mensagem = new ORMMensagem();
        $mensagem->titulo = $request->input('titulo');
        $mensagem->id_remetente = auth()->user()->id;
        $mensagem->id_destinatario = $request->input('id_user');
        $mensagem->conversas_id = $conversa->id;
        $mensagem->anuncio_id = $request->input('anuncio_id');
        $mensagem->tipo_anuncio = $request->input('tipo_anuncio');
        $mensagem->save();

        return view('mensagens');
    }
}
