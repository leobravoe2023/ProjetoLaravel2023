@extends('layouts/app')

@section('content')
    <link rel="stylesheet" href="{{asset("/css/pedidoAdmin.css")}}">

    <div class="container">
        <div class="row">
            
            {{-- Parte da esquerda --}}
            <div class="col-md-3">
                <a href="{{route("admin.dashboard")}}" class="btn btn-primary w-100">Voltar</a>
                <div id="list-pedidos" class="list-group my-3 overflow-auto">
                    <a href="#" class="list-group-item list-group-item-action">Pedido 10</a>  
                    <a href="#" class="list-group-item list-group-item-action list-group-item-primary">Pedido 9</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">Pedido 8</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-success">Pedido 7</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-danger">Pedido 6</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-warning">Pedido 5</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-info">Pedido 4</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-light">Pedido 3</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Pedido 2</a>
                    <a href="#" class="list-group-item list-group-item-action list-group-item-dark">Pedido 1</a>
                </div>
            </div>



            {{-- Parte do meio --}}
            <div class="col-md-6">
                
            </div>
            
            
            {{-- Parte da direita --}}
            <div class="col-md-3">
                
            </div>
        </div>
    </div>
@endsection