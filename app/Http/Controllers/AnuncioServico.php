<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnuncioServico as Servico;
use App\Models\CanceladoServico;
use Illuminate\Support\Facades\Validator;

class AnuncioServico extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.anuncioServicos');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'titulo' => 'required|min:3|max:79',
            'descricao' => 'required|max:2500',
            'valor' => 'required',
        ];

        $msg = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'min' => 'O título deve conter no mínimo 3 caracteres',
            'titulo.max' => 'O título deve conter no máximo 86 caracteres',
            'descricao.max' => 'A descrição deve ter no máximo 2500 caracteres'
        ];

        $request->validate($regras, $msg);

        $servico = new Servico();
        $servico->id_user = auth()->user()->id;
        $servico->titulo = $request->input('titulo');
        $servico->descricao = $request->input('descricao');
        $servico->valor = $request->input('valor');
        $servico->por_hora = $request->input('por_hora') == 'on' ? 1 : 0;
        $servico->exibir_contato = $request->input('exibir_contato') == 'on' ? 1 : 0;

        $servico->save();

        return redirect()->route('minha_area');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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

        $servico_cancelado = new CanceladoServico();
        $saveBd = $servico_cancelado->create($request->all());

        $inativar = Servico::find($request->input('anuncio_servicos_id'));
        $inativar->ativo = 0;
        $inativar->update();
        $servico = Servico::find($request->input('anuncio_servicos_id'));

        success('Serviço Inativado', 'Serviço inativado com sucesso', $servico);        

    }
}
