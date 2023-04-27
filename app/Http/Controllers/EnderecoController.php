<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Endereco;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $enderecos = DB::select("SELECT * from Enderecos WHERE Users_id = 1");
            return view("Endereco/index")->with("enderecos", $enderecos);
        } catch (\Throwable $th) {
            return view("Endereco/index")->with("enderecos", [])->with("message", [$th->getMessage(), "danger"]);
        }
    }

    public function indexMessage($message)
    {
        try {
            $enderecos = DB::select("SELECT * from Enderecos WHERE Users_id = 1");
            return view("Endereco/index")->with("enderecos", $enderecos)->with("message", $message);
        } catch (\Throwable $th) {
            return view("Endereco/index")->with("enderecos", [])->with("message", [$th->getMessage(), "danger"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Endereco/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $endereco = new Endereco();
            $endereco->Users_id = 1;
            $endereco->bairro = $request->bairro;
            $endereco->logradouro = $request->logradouro;
            $endereco->numero = $request->numero;
            $endereco->complemento = $request->complemento;
            $endereco->save();
            return $this->indexMessage(["TipoProduto cadastrado com sucesso", "success"]);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $endereco = Endereco::find($id);
            if( isset($endereco) ){
                return view("Endereco/show")->with("endereco", $endereco);
            }
            return $this->indexMessage(["Endereco não encontrado", "warning"]);
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $endereco = Endereco::find($id);
            if( isset($endereco) ) {
                return view("Endereco/edit")->with("endereco", $endereco);
            }
            else {
                return $this->indexMessage(["Endereco não encontrado", "warning"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
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
        try {
            $endereco = Endereco::find($id);
            if( isset($endereco) ){
                $endereco->Users_id = 1;
                $endereco->bairro = $request->bairro;
                $endereco->logradouro = $request->logradouro;
                $endereco->numero = $request->numero;
                $endereco->complemento = $request->complemento;
                $endereco->update();
                return $this->indexMessage(["Endereco atualizado com sucesso", "success"]);
            }
            else{
                return $this->indexMessage(["Endereco não encontrado", "warning"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $endereco = Endereco::find($id);
            // se o produto existir
            if( isset($endereco) ){
                $endereco->delete();
                // recarregar a view index
                return $this->indexMessage(["Endereco removido com sucesso", "success"]);
            }
            else {
                return $this->indexMessage(["Endereco não encontrado", "warning"]);
            }
        } catch (\Throwable $th) {
            return $this->indexMessage([$th->getMessage(), "danger"]);
        }
    }
}
