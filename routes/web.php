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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/anuncie', function() {
    return view('anuncie');
})->name('anuncie')->middleware('auth');

Auth::routes();

Route::get('/minha_area', [App\Http\Controllers\HomeController::class, 'index'])->name('minha_area');
Route::get('/anuncio_produto', [App\Http\Controllers\AnuncioProduto::class, 'index'])->name('anuncio_produto');


Route::prefix('/sistema')->group(function() {

});
