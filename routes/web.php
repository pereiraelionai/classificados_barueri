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

Route::get('/minha_area', [App\Http\Controllers\MinhaArea::class, 'index'])->name('minha_area');
Route::get('/minha_area/empregos', [App\Http\Controllers\MinhaArea::class, 'AnuncioEmpregos']);
Route::get('/minha_area/empregos/dados', [App\Http\Controllers\MinhaArea::class, 'DadosAnuncioEmpregos']);
Route::get('/minha_area/servicos', [App\Http\Controllers\MinhaArea::class, 'AnuncioServicos']);

Route::get('/anuncio_produto', [App\Http\Controllers\AnuncioProduto::class, 'create'])->name('anuncio_produto');
Route::post('/anuncio_produto', [App\Http\Controllers\AnuncioProduto::class, 'store'])->name('anuncio_produto_salvar');
Route::post('/anuncio_produto/inativar', [App\Http\Controllers\AnuncioProduto::class, 'inativar'])->name('anuncio_produto_inativar');

Route::get('/anuncio_emprego', [App\Http\Controllers\AnuncioEmprego::class, 'create'])->name('anuncio_emprego');
Route::post('/anuncio_emprego', [App\Http\Controllers\AnuncioEmprego::class, 'store'])->name('anuncio_emprego_salvar');

Route::get('/anuncio_servico', [App\Http\Controllers\AnuncioServico::class, 'create'])->name('anuncio_servico');
Route::post('/anuncio_servico', [App\Http\Controllers\AnuncioServico::class, 'store'])->name('anuncio_servico_salvar');

//rotas para Ajax
Route::get('/anuncio_produto/categoria', [App\Http\Controllers\AnuncioProduto::class, 'Categorias'])->name('categorias');
Route::get('/anuncio_emprego/regime', [App\Http\Controllers\AnuncioEmprego::class, 'Regimes'])->name('regimes');


Route::prefix('/sistema')->group(function() {

});
