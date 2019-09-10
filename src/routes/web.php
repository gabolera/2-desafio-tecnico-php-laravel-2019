<?php

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
    return view('welcome');
});


Auth::routes();

Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);
Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index'])->middleware('auth');


Route::group(['prefix'=>'dashboard', 'middleware' => 'auth'], function(){
    
    Route::get('/', ['as' => 'index', 'uses' => 'DashboardController@index']);

    Route::get('/clientes', ['as' => 'cliente.index', 'uses' => 'ClienteController@index']);
    Route::get('/cliente/novo', ['as' => 'cliente.create', 'uses' => 'ClienteController@create']);
    Route::post('/cliente/novo', ['as' => 'cliente.store', 'uses' => 'ClienteController@store']);
    Route::get('/cliente/{id}', ['as' => 'cliente.show', 'uses' => 'ClienteController@show']);
    Route::get('/cliente/e/{id}', ['as' => 'cliente.edit', 'uses' => 'ClienteController@edit']);
    Route::put('/cliente/e/{id}', ['as' => 'cliente.update', 'uses' => 'ClienteController@update']);
    Route::post('/cliente/d', ['as' => 'cliente.destroy', 'uses' => 'ClienteController@destroy']);
    Route::post('/cliente/dm/', ['as' => 'cliente.MultipleDestroy', 'uses' => 'ClienteController@MultipleDestroy']);

    Route::get('/produtos', ['as' => 'produto.index', 'uses' => 'ProdutoController@index']);
    Route::get('/produto/novo', ['as' => 'produto.create', 'uses' => 'ProdutoController@create']);
    Route::post('/produto/novo', ['as' => 'produto.store', 'uses' => 'ProdutoController@store']);
    Route::get('/produto/{id}', ['as' => 'produto.show', 'uses' => 'ProdutoController@show']);
    Route::get('/produto/e/{id}', ['as' => 'produto.edit', 'uses' => 'ProdutoController@edit']);
    Route::put('/produto/e/{id}', ['as' => 'produto.update', 'uses' => 'ProdutoController@update']);
    Route::post('/produto/d/{id}', ['as' => 'produto.destroy', 'uses' => 'ProdutoController@destroy']);

    Route::get('/pedidos', ['as' => 'pedido.index', 'uses' => 'PedidoController@index']);
    Route::get('/pedidos/novo', ['as' => 'pedido.create', 'uses' => 'PedidoController@create']);
    Route::post('/pedidos/novo', ['as' => 'pedido.store', 'uses' => 'PedidoController@store']);
    Route::get('/pedidos/{id}', ['as' => 'pedido.show', 'uses' => 'PedidoController@show']);
    Route::get('/pedidos/e/{id}', ['as' => 'pedido.edit', 'uses' => 'PedidoController@edit']);
    Route::put('/pedidos/e/{id}', ['as' => 'pedido.update', 'uses' => 'PedidoController@update']);
    Route::post('/pedidos/d', ['as' => 'pedido.destroy', 'uses' => 'PedidoController@destroy']);
    Route::get('/pedidos/i/{id}', ['as' => 'pedido.print', 'uses' => 'PedidoController@pdfPedido']);
    Route::post('/pedidos/u/pagamento', ['as' => 'pedido.updatePagamento', 'uses' => 'PedidoController@pagamentoPedido']);
    
});    

Route::get('/api/produto/consulta', ['as' => 'produto.pesquisa', 'uses' => 'ProdutoController@search']);


Route::get('/api/produto/consulta/{id}', ['as' => 'produto.api', 'uses' => 'ProdutoController@API']);
Route::get('/api/cliente/consulta/{id}', ['as' => 'cliente.api', 'uses' => 'ClienteController@API']);
Route::get('/api/pedido/consulta/{id}', ['as' => 'pedido.api', 'uses' => 'PedidoController@API']);
