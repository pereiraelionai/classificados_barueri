<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Totas home controller
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/anuncios_filtro/{filtro}', [App\Http\Controllers\HomeController::class, 'anuncioFiltro'])->name('anuncios_filtro');
Route::get('/anuncio_search', [App\Http\Controllers\HomeController::class, 'anuncioSearch'])->name('anuncios_search');
Route::get('/anuncio_empregos/only', [App\Http\Controllers\HomeController::class, 'empregosOnly'])->name('empregosOnly');
Route::get('/anuncio_servicos/only', [App\Http\Controllers\HomeController::class, 'servicosOnly'])->name('servicosOnly');

//rota anuncie grátis
Route::get('/anuncie', function() {
    return view('anuncie');
})->name('anuncie')->middleware('auth');

Auth::routes();

//rotas minha área
Route::get('/minha_area', [App\Http\Controllers\MinhaArea::class, 'index'])->name('minha_area')->middleware('auth');
Route::get('/minha_area/produtos', [App\Http\Controllers\MinhaArea::class, 'AnuncioProdutos'])->middleware('auth');
Route::get('/minha_area/empregos', [App\Http\Controllers\MinhaArea::class, 'AnuncioEmpregos'])->middleware('auth');
Route::get('/minha_area/servicos', [App\Http\Controllers\MinhaArea::class, 'AnuncioServicos'])->middleware('auth');
Route::get('/minha_area/get_produto/{id}', [App\Http\Controllers\MinhaArea::class, 'getProduto'])->middleware('auth');
Route::get('/minha_area/get_emprego/{id}', [App\Http\Controllers\MinhaArea::class, 'getEmprego'])->middleware('auth');
Route::get('/minha_area/get_servico/{id}', [App\Http\Controllers\MinhaArea::class, 'getServico'])->middleware('auth');
Route::get('/minha_area/inativos', [App\Http\Controllers\MinhaArea::class, 'getInativos'])->middleware('auth');
Route::get('/minha_area/favoritos', [App\Http\Controllers\MinhaArea::class, 'getFavoritos'])->middleware('auth');

//rotas anuncio produto controller
Route::get('/anuncio_produto', [App\Http\Controllers\AnuncioProduto::class, 'create'])->name('anuncio_produto')->middleware('auth');
Route::post('/anuncio_produto', [App\Http\Controllers\AnuncioProduto::class, 'store'])->name('anuncio_produto_salvar')->middleware('auth');
Route::post('/anuncio_produto/inativar', [App\Http\Controllers\AnuncioProduto::class, 'inativar'])->middleware('auth');

//rotas anuncio emprego controller
Route::get('/anuncio_emprego', [App\Http\Controllers\AnuncioEmprego::class, 'create'])->name('anuncio_emprego')->middleware('auth');
Route::post('/anuncio_emprego', [App\Http\Controllers\AnuncioEmprego::class, 'store'])->name('anuncio_emprego_salvar')->middleware('auth');
Route::post('/anuncio_emprego/inativar', [App\Http\Controllers\AnuncioEmprego::class, 'inativar']);

//rotas anuncio serviço controller
Route::get('/anuncio_servico', [App\Http\Controllers\AnuncioServico::class, 'create'])->name('anuncio_servico')->middleware('auth');
Route::post('/anuncio_servico', [App\Http\Controllers\AnuncioServico::class, 'store'])->name('anuncio_servico_salvar')->middleware('auth');
Route::post('/anuncio_servico/inativar', [App\Http\Controllers\AnuncioServico::class, 'inativar'])->middleware('auth');

//rotas para Ajax
Route::get('/anuncio_produto/categoria', [App\Http\Controllers\AnuncioProduto::class, 'Categorias'])->name('categorias')->middleware('auth');
Route::get('/anuncio_emprego/regime', [App\Http\Controllers\AnuncioEmprego::class, 'Regimes'])->name('regimes')->middleware('auth');
Route::get('/motivo_cancelados', [App\Http\Controllers\AnuncioProduto::class, 'MotivoCancelados'])->name('motivos')->middleware('auth');

//rotas favoritos
Route::post('/favoritos', [App\Http\Controllers\Favorito::class, 'setFavorito']);

//rotas mensagens
Route::get('/mensagens/{id_anuncio}/{tipo_anuncio}', [App\Http\Controllers\Mensagem::class, 'create'])->name('mensagem_form')->middleware('auth');
Route::post('/mensagens/enviar', [App\Http\Controllers\Mensagem::class, 'store'])->name('mensagem_send')->middleware('auth');
Route::get('/mensagens', [App\Http\Controllers\Mensagem::class, 'index'])->name('mensagens')->middleware('auth');
Route::post('/mensagens/enviar_resposta', [App\Http\Controllers\Mensagem::class, 'resposta'])->middleware('auth');
Route::get('/conversa/{id_mensagem}', [App\Http\Controllers\Mensagem::class, 'conversa'])->name('conversa')->middleware('auth');