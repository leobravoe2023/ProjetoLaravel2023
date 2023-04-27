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

Route::get('teste', function () {
    echo "<html>";
    echo "<h1>Hello World Rotas</h1>";
    echo "</html>";
});

Route::get('ola/{nome}/{sobrenome}', function ($nome, $sobrenome) {
    echo "Olá! Seja bem vindo $nome $sobrenome";
});

Route::get('ola/{nome?}', function ($nome=null) {
    if(isset($nome))
        echo "Olá! Seja bem vindo $nome.";
    else
        echo "Olá! Seja bem vindo usuário anônimo.";
});
                //     Leonardo/3
Route::get('rotacomregra/{nome}/{n}', function ($nome, $n) {
    // campo de inicialização (apenas 1 vez)
    // campo de teste
    // campo de incremento
    for ($i = 0; $i < $n; $i++) { 
        echo "Olá! Seja bem vindo $nome <br>";
    }
});

Route::prefix('/app')->group(function(){
    Route::get('/', function () {
        echo "página no app";
    });
    Route::get('/user', function () {
        echo "página do usuário";
    });
    Route::get('/admin', function () {
        echo "página do administrador";
    });
});

// Exemplo de rota http://127.0.0.1:8000/tipoproduto/add/Macarrão
use App\Models\TipoProduto; // dou use no Model
Route::get("tipoproduto/add/{descricao}", function($descricao){
    $tipoProduto = new TipoProduto(); // Crio um objeto do Model
    $tipoProduto->descricao = $descricao; // Seto os atributos do Obj
    $tipoProduto->save(); // Uso o método do Obj
    echo "Dado salvo com sucesso";
});

// Exemplo de rota http://127.0.0.1:8000/produto/add/Quatro Queijos/50.50/1/Queijos.../url/
use App\Models\Produto; // dou use no Model
Route::get("produto/add/{nome}/{preco}/{Tipo_Produtos_id}/{ingredientes}/{urlImage}",
            function($nome, $preco, $Tipo_Produtos_id, $ingredientes, $urlImage){
    $produto = new Produto(); // Crio um objeto do Model
    // Defino o valor dos atributos do Objeto utilizando as variáveis da rota
    $produto->nome = $nome;
    $produto->preco = $preco;
    $produto->Tipo_Produtos_id = $Tipo_Produtos_id;
    $produto->ingredientes = $ingredientes;
    $produto->urlImage = $urlImage;
    $produto->save(); // Uso o método do Obj
    echo "Dado salvo com sucesso";
});

// Quando o usuário acessar a rota: /tipoproduto
// O arquivo de rotas irá encaminar a requisição para o controlador responsável
// O controlador TipoProdutoController irá rodar o método index
// Route::get("/tipoproduto", "\App\Http\Controllers\TipoProdutoController@index")->name("tipoproduto.index");
// Route::get("/tipoproduto/create", "\App\Http\Controllers\TipoProdutoController@create")->name("tipoproduto.create");
// Route::post("/tipoproduto", "\App\Http\Controllers\TipoProdutoController@store")->name("tipoproduto.store");
Route::resource("tipoproduto", "\App\Http\Controllers\TipoProdutoController");

// Rotas de produto
// Route::get("/produto", "\App\Http\Controllers\ProdutoController@index")->name("produto.index");
// Route::get("/produto/create", "\App\Http\Controllers\ProdutoController@create")->name("produto.create");
// Route::post("/produto", "\App\Http\Controllers\ProdutoController@store")->name("produto.store");
// Route::get("/produto/{id}", "\App\Http\Controllers\ProdutoController@show")->name("produto.show");
// Route::get("/produto/{id}/edit", "\App\Http\Controllers\ProdutoController@edit")->name("produto.edit");
// Route::put("/produto/{id}", "\App\Http\Controllers\ProdutoController@update")->name("produto.update");
// Route::delete("/produto/{id}", "\App\Http\Controllers\ProdutoController@destroy")->name("produto.destroy");
Route::resource("produto", "\App\Http\Controllers\ProdutoController");

Route::resource("endereco", "\App\Http\Controllers\EnderecoController");

Route::resource("userinfo", "\App\Http\Controllers\UserInfoController");


