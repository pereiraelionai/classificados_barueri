<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regime;
use App\Models\AnuncioEmprego as Emprego;
use App\Models\CanceladoEmprego;
use Illuminate\Support\Facades\Validator;

class AnuncioEmprego extends Controller
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
        return view('form.anuncioEmprego');
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
            'titulo' => 'required|min:3|max:51',
            'descricao' => 'required|max:2500',
            'regime' => 'required',
            'cidade' => 'required|min:3|max:18',
            'estado' => 'required',
            'qtd_vagas' => 'required',
            'data_inicio' => 'required'
        ];

        $msg = [
            'required' => 'O campo :attribute precisa ser preenchido',
            'titulo.min' => 'O título deve conter no mínimo 3 caracteres',
            'titulo.max' => 'O título deve conter no máximo 86 caracteres',
            'cidade.min' => 'A cidade deve conter no mínimo 3 caracteres',
            'cidade.max' => 'A cidade deve conter no máximo 18 caracteres',
            'descricao.max' => 'A descrição deve ter no máximo 2500 caracteres'
        ];

        $request->validate($regras, $msg);

        //personalizando validação para valor em branco no form
        if($request->input('salario') == ',' && $request->input('combinar') != 1) {
            $regra_salario = ['salario' => 'integer'];
            $msg_salario = ['integer' => 'O campo salario precisa estar preenchido'];
            $request->validate($regra_salario, $msg_salario);
        }

        if($request->input('combinar') == 1) {
            $salario = null;
        } else {
            $salario = $request->input('salario');
        }

        $emprego = new Emprego();
        $emprego->id_user = auth()->user()->id;
        $emprego->titulo = $request->input('titulo');
        $emprego->regime_id = $request->input('regime');
        $emprego->descricao = $request->input('descricao');
        $emprego->cidade = $request->input('cidade');
        $emprego->estado = $request->input('estado');
        $emprego->salario = $salario;
        $emprego->a_combinar = $request->input('combinar') == 'on' ? 1 : 0;
        $teste = $request->input('combinar') == 'on' ? 1 : 0;
        $emprego->nome_empresa = $request->input('empresa') != '' ? $request->input('empresa') : 'Confidencial';
        $emprego->qtd_vagas = $request->input('qtd_vagas');
        $emprego->data_inicio = $request->input('data_inicio');
        $emprego->exibir_contato = $request->input('exibir_contato') == 'on' ? 1 : 0;

        $emprego->save();

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

        $emprego_cancelado = new CanceladoEmprego();
        $saveBd = $emprego_cancelado->create($request->all());

        $inativar = Emprego::find($request->input('anuncio_empregos_id'));
        $inativar->ativo = 0;
        $inativar->update();
        $emprego = Emprego::find($request->input('anuncio_empregos_id'));

        success('Emprego Inativado', 'Emprego inativado com sucesso', $emprego);        

    }

    public static function Regimes() {

        $regimes = Regime::all();

        success('Regimes de Trabalho', 'Lista de regimes para o select do form', $regimes);
    }
}
