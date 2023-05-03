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
    return view('welcome');
});

// Rotas de TipoProduto
// Route::get("/tipoproduto", "\App\Http\Controllers\TipoProdutoController@index")->name("tipoproduto.index");
// Route::get("/tipoproduto/create", "\App\Http\Controllers\TipoProdutoController@create")->name("tipoproduto.create");
// Route::post("/tipoproduto", "\App\Http\Controllers\TipoProdutoController@store")->name("tipoproduto.store");
Route::resource("tipoproduto", "\App\Http\Controllers\TipoProdutoController");

// Rotas de Produto
// Route::get("/produto", "\App\Http\Controllers\ProdutoController@index")->name("produto.index");
// Route::get("/produto/create", "\App\Http\Controllers\ProdutoController@create")->name("produto.create");
// Route::post("/produto", "\App\Http\Controllers\ProdutoController@store")->name("produto.store");
// Route::get("/produto/{id}", "\App\Http\Controllers\ProdutoController@show")->name("produto.show");
// Route::get("/produto/{id}/edit", "\App\Http\Controllers\ProdutoController@edit")->name("produto.edit");
// Route::put("/produto/{id}", "\App\Http\Controllers\ProdutoController@update")->name("produto.update");
// Route::delete("/produto/{id}", "\App\Http\Controllers\ProdutoController@destroy")->name("produto.destroy");
Route::resource("produto", "\App\Http\Controllers\ProdutoController");

// Rotas de Endereco
Route::resource("endereco", "\App\Http\Controllers\EnderecoController");

// Rotas de UserInfo
Route::resource("userinfo", "\App\Http\Controllers\UserInfoController");

// Rotas de autenticação
Auth::routes();
Route::get("/home", "\App\Http\Controllers\HomeController@index")->name("home");

