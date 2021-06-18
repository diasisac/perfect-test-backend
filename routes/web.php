<?php

use Illuminate\Support\Facades\Route;



/*
Telas para ver o funcionamento sem dados
*/
Route::get('/', 'DashboardController@index');

Route::get('/produtos','ProdutoController@index');
Route::get('/produto/{id}','ProdutoController@exibir');
Route::post('/produto/cadastrar','ProdutoController@cadastrar');
Route::post('/produto/editar','ProdutoController@editar');

Route::get('/produto/excluir/{id}','ProdutoController@excluir');

Route::get('/vendas','VendaController@index');
Route::get('/venda/{id}','VendaController@exibir');
Route::post('/venda/cadastrar','VendaController@cadastrar');
Route::post('/venda/editar','VendaController@editar');

Route::get('/venda/excluir/{id}','VendaController@excluir');