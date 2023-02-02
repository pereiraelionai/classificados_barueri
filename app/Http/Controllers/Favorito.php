<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorito as TbFavorito;

class Favorito extends Controller
{
    public function setFavorito(Request $request) {

        if(!auth()->user()) {
            error('Usuário não autenticado', 'Autentique-se para utilizar o sistema');
        }

        $user = auth()->user()->id;
        $check = $request->input('check');
        $anuncio_id = $request->input('anuncio_id');
        $tipo_anuncio = $request->input('tipo_anuncio');
        $titulo = $request->input('titulo');

        if($check == 'false') {
            //criar anuncio favorito na db
            $favorito = new TbFavorito();
            $favorito->users_id = $user;
            $favorito->tipo_anuncios_id = $tipo_anuncio;
            $favorito->anuncio_id = $anuncio_id;
            $favorito->save();

            success('Anúncio Favorito', 'Anúncio favoritado com sucesso', $titulo);        

        } else {
            //deletar anuncio favorito da db
            $del_favorito = TbFavorito::where('users_id', '=', $user)
                                    ->where('anuncio_id', '=', $anuncio_id)
                                    ->where('tipo_anuncios_id', '=', $tipo_anuncio)->delete();

            warning('Anúncio Favorito Deletado', 'Anúncio favorito deletado com sucesso', $titulo);        
        }   

    }
}
