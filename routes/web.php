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

Route::get('/', 'AppleController@index')->name('index');
Route::get('/servicos', 'AppleController@servicos')->name('servicos');
Route::get('/ajuda', 'AppleController@ajuda')->name('ajuda');
Route::get('/sobre', 'AppleController@sobre')->name('sobre');
Route::get('/produtos', 'AppleController@produtos')->name('produtos');
Route::get('/adminLogin', 'AppleController@adminLogin')->name('adminLogin');

Auth::routes([
    'register' => true, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/home', 'ProdutoController@index')->name('produto.index');
Route::post('/home', 'ProdutoController@store')->name('produto.store');
Route::get('/home/{id}/edit', 'ProdutoController@edit')->name('produto.edit');
Route::put('/home/{id}/edit', 'ProdutoController@update')->name('produto.update');
Route::delete('/home/{id}/destroy', 'ProdutoController@destroy')->name('produto.destroy');

/*Carrinho*/
Route::get('/carrinho', 'CarrinhoController@index')->name('carrinho.index');
Route::get('/carrinho/adicionar', function() {
    return redirect()->route('index');
});
Route::post('produtos/carrinho/adicionar', 'CarrinhoController@adicionar')->name('carrinho.adicionar');
Route::delete('produtos/carrinho/remover/{id}', 'CarrinhoController@remover')->name('carrinho.remover');
Route::post('produtos/carrinho/concluir', 'CarrinhoController@concluir')->name('carrinho.concluir');
Route::get('produtos/carrinho/compras', 'CarrinhoController@compras')->name('carrinho.compras');
Route::post('produtos/carrinho/cancelar', 'CarrinhoController@cancelar')->name('carrinho.cancelar');
Route::post('produtos/carrinho/desconto', 'CarrinhoController@desconto')->name('carrinho.desconto');



/*Cupons*/
Route::group(['prefix' => 'home'], function () {
    Route::get('cupons', 'Admin\CupomDescontoController@index')->name('admin.cupons');
    Route::get('cupons/adicionar', 'Admin\CupomDescontoController@adicionar')->name('admin.cupons.adicionar');
    Route::post('cupons/salvar', 'Admin\CupomDescontoController@salvar')->name('admin.cupons.salvar');
    Route::get('cupons/editar/{id}', 'Admin\CupomDescontoController@editar')->name('admin.cupons.editar');
    Route::put('cupons/atualizar/{id}', 'Admin\CupomDescontoController@atualizar')->name('admin.cupons.atualizar');
    Route::get('cupons/deletar/{id}', 'Admin\CupomDescontoController@deletar')->name('admin.cupons.deletar');
});
