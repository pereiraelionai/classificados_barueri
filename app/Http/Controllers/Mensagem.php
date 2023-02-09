<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioProduto;
use App\Models\AnuncioEmprego;
use App\Models\AnuncioServico;
use App\Models\Conversa;
use App\Models\Mensagem as ORMMensagem;
use App\Classes\stdObject;

class Mensagem extends Controller
{   
    public function index() {

        $id_user = auth()->user()->id;

        $mensagens = ORMMensagem::where('id_remetente', $id_user)->orWhere('id_destinatario', $id_user)
                                ->leftjoin('tipo_anuncios', 'tipo_anuncio', '=', 'tipo_anuncios.id')
                                ->leftjoin('anuncio_produtos', 'anuncio_id', '=', 'anuncio_produtos.id')
                                ->select('mensagens.*', 'tipo_anuncios.tipo', 'anuncio_produtos.titulo as title_anuncio', 'anuncio_produtos.foto_1')->get();

        $qtdConversaNaoLida = Conversa::where('dest_id', auth()->user()->id)->where('lida', 0)->count();

        $arrayCount = [];

        foreach($mensagens as $mensagem) {
            $qtdByIdMsg = Conversa::where('dest_id', auth()->user()->id)->where('lida', 0)->where('mensagens_id', $mensagem->id)->count();
            $mensagem->qtdByMsg = $qtdByIdMsg;
        }

        return view('mensagens')->with('mensagens', $mensagens)->with('qtdConversaNaoLida', $qtdConversaNaoLida);
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

        $mensagem = new ORMMensagem();
        $mensagem->titulo = $request->input('titulo');
        $mensagem->id_remetente = auth()->user()->id;
        $mensagem->id_destinatario = $request->input('id_user');
        $mensagem->anuncio_id = $request->input('anuncio_id');
        $mensagem->tipo_anuncio = $request->input('tipo_anuncio');
        $mensagem->save();

        $conversa = new Conversa();
        $conversa->mensagem = $request->input('mensagem');
        $conversa->mensagens_id = $mensagem->id;
        $conversa->autor_id = auth()->user()->id;
        $conversa->dest_id = $request->input('id_user');
        $conversa->save();

        return redirect()->route('mensagens');
    }

    public function conversa($id_mensagem) {

        $usuario = auth()->user()->id;

        $conversas = Conversa::where('mensagens_id', $id_mensagem)
                            ->leftjoin('users', 'autor_id', '=', 'users.id')
                            ->select('conversas.*', 'users.nome')->get();
        
        $mensagem = ORMMensagem::where('mensagens.id', $id_mensagem)
                            ->select('mensagens.*')->get();

        $qtdConversaNaoLida = Conversa::where('dest_id', $usuario)->where('lida', 0)->count();

        //marcando mensagens como lida ao entrar na conversa
        $setLida = Conversa::where('mensagens_id', $id_mensagem)->where('dest_id', $usuario)
                            ->update(['lida' => 1]);
        
        $resposta_dest = Conversa::where('mensagens_id', $id_mensagem)
                            ->leftjoin('users', 'autor_id', '=', 'users.id')
                            ->leftjoin('users as u', 'dest_id', '=', 'u.id')
                            ->select('conversas.*', 'users.nome as autor_nome', 'u.nome as dest_nome')->orderBy('created_at', 'desc')->first(); 

        $destinatario = new stdObject();
        $destinatario->id = $resposta_dest->dest_id == $usuario ? $resposta_dest->autor_id : $resposta_dest->dest_id;
        $destinatario->nome = $destinatario->id == $resposta_dest->autor_id ? $resposta_dest->dest_nome : $resposta_dest->autor_nome;

        if($mensagem[0]->tipo_anuncio == 1) {
            $anuncio = AnuncioProduto::where('id', $mensagem[0]->anuncio_id)->get('titulo');
        }

        if($mensagem[0]->tipo_anuncio == 2) {
            $anuncio = AnuncioServico::where('id', $mensagem[0]->anuncio_id)->get('titulo');
        }

        if($mensagem[0]->tipo_anuncio == 3) {
            $anuncio = AnuncioEmprego::where('id', $mensagem[0]->anuncio_id)->get('titulo');
        }

        return view('conversas')
                ->with('conversas', $conversas)
                ->with('mensagem', $mensagem)
                ->with('anuncio', $anuncio)
                ->with('qtdConversaNaoLida', $qtdConversaNaoLida)
                ->with('usuario', $usuario)
                ->with('destinatario', $destinatario);
    }

    public function resposta(Request $request) {

        $conversa = new Conversa();
        $conversa->mensagem = $request->input('msg');
        $conversa->mensagens_id = $request->input('id_mensagem');
        $conversa->autor_id = auth()->user()->id;
        $conversa->dest_id = $request->input('id_destinatario');
        $conversa->save();

        success('Mensagens Conversa', 'Resposta enviada com sucesso', $conversa);
    }
}