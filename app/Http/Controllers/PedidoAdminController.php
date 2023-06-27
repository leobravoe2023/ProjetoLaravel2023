<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidoAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("PedidoAdmin/index");
    }

    /**
     * Retorna a lista de todos os pedidos do banco de dados no formato JSON
     *
     * @return \Illuminate\Http\Response
     */
    public function getPedidos(){
        // Lebrar de dar o use App\Models\Pedido;
        $pedidos = Pedido::all();
        $response["success"] = true;
        $response["message"] = "Consulta de Pedidos realizada com sucesso";
        $response["return"] = $pedidos;
        return response()->json($response, 200);
    }

}
