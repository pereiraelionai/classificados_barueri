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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/anuncios_filtro/{filtro}', [App\Http\Controllers\HomeController::class, 'anuncioFiltro'])->name('anuncios_filtro');
Route::get('/anuncio_search', [App\Http\Controllers\HomeController::class, 'anuncioSearch'])->name('anuncios_search');

Route::get('/anuncio_empregos/only', [App\Http\Controllers\HomeController::class, 'empregosOnly'])->name('empregosOnly');
Route::get('/anuncio_servicos/only', [App\Http\Controllers\HomeController::class, 'servicosOnly'])->name('servicosOnly');


Route::get('/anuncie', function() {
    return view('anuncie');
})->name('anuncie')->middleware('auth');

Auth::routes();

Route::get('/minha_area', function() {
    return view('minha_area');
})->name('minha_area');
Route::get('/minha_area/produtos', [App\Http\Controllers\MinhaArea::class, 'AnuncioProdutos']);
Route::get('/minha_area/empregos', [App\Http\Controllers\MinhaArea::class, 'AnuncioEmpregos']);
Route::get('/minha_area/servicos', [App\Http\Controllers\MinhaArea::class, 'AnuncioServicos']);
Route::get('/minha_area/get_produto/{id}', [App\Http\Controllers\MinhaArea::class, 'getProduto']);
Route::get('/minha_area/get_emprego/{id}', [App\Http\Controllers\MinhaArea::class, 'getEmprego']);
Route::get('/minha_area/get_servico/{id}', [App\Http\Controllers\MinhaArea::class, 'getServico']);
Route::get('/minha_area/inativos', [App\Http\Controllers\MinhaArea::class, 'getInativos']);

Route::get('/anuncio_produto', [App\Http\Controllers\AnuncioProduto::class, 'create'])->name('anuncio_produto');
Route::post('/anuncio_produto', [App\Http\Controllers\AnuncioProduto::class, 'store'])->name('anuncio_produto_salvar');
Route::post('/anuncio_produto/inativar', [App\Http\Controllers\AnuncioProduto::class, 'inativar']);

Route::get('/anuncio_emprego', [App\Http\Controllers\AnuncioEmprego::class, 'create'])->name('anuncio_emprego');
Route::post('/anuncio_emprego', [App\Http\Controllers\AnuncioEmprego::class, 'store'])->name('anuncio_emprego_salvar');
Route::post('/anuncio_emprego/inativar', [App\Http\Controllers\AnuncioEmprego::class, 'inativar']);

Route::get('/anuncio_servico', [App\Http\Controllers\AnuncioServico::class, 'create'])->name('anuncio_servico');
Route::post('/anuncio_servico', [App\Http\Controllers\AnuncioServico::class, 'store'])->name('anuncio_servico_salvar');
Route::post('/anuncio_servico/inativar', [App\Http\Controllers\AnuncioServico::class, 'inativar']);

//rotas para Ajax
Route::get('/anuncio_produto/categoria', [App\Http\Controllers\AnuncioProduto::class, 'Categorias'])->name('categorias');
Route::get('/anuncio_emprego/regime', [App\Http\Controllers\AnuncioEmprego::class, 'Regimes'])->name('regimes');
Route::get('/motivo_cancelados', [App\Http\Controllers\AnuncioProduto::class, 'MotivoCancelados'])->name('motivos');


Route::prefix('/sistema')->group(function() {

});
