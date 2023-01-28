<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\MotivoCancelados;
use App\Models\AnuncioProduto as Produto;
use App\Models\CanceladoProduto;
use Illuminate\Support\Facades\Validator;


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
        #TODO:Select categoria não preenche os dados caso o formulário não seja validado
        #TODO:Imagens não preenche os dados caso o formulário não seja validado

        $regras = [
            'titulo' => 'required|min:3|max:79',
            'descricao' => 'required|max:2500',
            'categoria' => 'required',
            'foto_capa' => 'required|mimes:jpg,jpeg,png',
            'foto_1' => 'mimes:jpg,jpeg,png'
        ];

        $msg = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'min' => 'O título deve conter no mínimo 3 caracteres',
            'titulo.max' => 'O título deve conter no máximo 86 caracteres',
            'mimes' => 'A foto deve ser um arquivo do tipo JPG, JPEG ou PNG',
            'descricao.max' => 'A descrição deve ter no máximo 2500 caracteres'
        ];

        $request->validate($regras, $msg);

        //personalizando validação para valor em branco no form
        if($request->input('valor') == ',') {
            $regra_valor = ['valor' => 'integer'];
            $msg_valor = ['integer' => 'O campo valor precisa estar preenchido'];
            $request->validate($regra_valor, $msg_valor);
        }


        $produto = new Produto();
        $produto->titulo = $request->input('titulo');
        $produto->descricao = $request->input('descricao');
        $produto->categoria_id = $request->input('categoria');
        $produto->valor = $request->input('valor');
        $produto->id_user = auth()->user()->id;
        $produto->exibir_contato = $request->input('exibir_contato') == 'on' ? 1 : 0;
        
        //função que prepara as imagens para serem salvas no banco
        $produto->foto_1 = setImagem('foto_capa', $request);
        if($request->file('foto_1')) {
            $produto->foto_2 = setImagem('foto_1', $request);

        }
        if($request->file('foto_2')) {
            $produto->foto_3 = setImagem('foto_2', $request);

        }
        if($request->file('foto_3')) {
            $produto->foto_4 = setImagem('foto_3', $request);

        }

        $produto->save();

        return redirect()->route('minha_area');

    }

    public function getProduto(Request $request) {
        
        $anuncio_produto = Produto::where('id', '=', $request->input('id_produto'))->select('titulo')->get();
        
        success('Produto', 'Produto selecionado', $anuncio_produto);

    }

    public function inativar(Request $request) {

        $regras = [
            'motivo_cancelados_id' => 'required'
        ];

        $msg = [
            'motivo_cancelados_id.required' => 'Selecione o motivo do cancelamento'
        ];

        $validator = Validator::make($request->all(), $regras, $msg);

        if($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $produto_cancelado = new CanceladoProduto();
        $saveBd = $produto_cancelado->create($request->all());

        $inativar = Produto::find($request->input('anuncio_produtos_id'));
        $inativar->ativo = 0;
        $inativar->update();
        $produto = Produto::find($request->input('anuncio_produtos_id'));

        success('Produto Inativado', 'Produto inativado com sucesso', $produto);        

    }

    public static function Categorias() {

        $categorias = Categoria::all();

        success('Categorias', 'Lista de categorias para o select do form', $categorias);
    }

    public function MotivoCancelados() {

        $motivos = MotivoCancelados::all();

        success('Motivos Cancelamento', 'Lista de motivos para o select do form', $motivos);

    }
}
