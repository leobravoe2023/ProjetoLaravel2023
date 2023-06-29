@extends('layouts/app')

@section('content')
    <link rel="stylesheet" href="{{ asset('/css/pedidoAdmin.css') }}">
    <script src="{{ asset('/js/pedidoAdmin.js') }}"></script>

    <div class="container">
        <div class="row">

            {{-- Parte da esquerda --}}
            <div class="col-md-3">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary w-100">Voltar</a>
                <div id="list-pedidos" class="list-group my-3 overflow-auto">
                </div>
            </div>

            {{-- Parte do meio --}}
            <div class="col-md-6">
                <h2 id="id-h2-pedido" class="text-center">Pedido 8</h2>
                <div id="list-produtos" class="list-group my-3 overflow-auto">
                    <span class="list-group-item">
                        Pizza - Pepperoni - 1x
                        <div class="float-end">
                            <i class="fa-solid fa-pencil-square"></i>
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </span>
                    <span class="list-group-item">
                        Suco - Laranja - 2x
                        <div class="float-end">
                            <i class="fa-solid fa-pencil-square"></i>
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </span>
                    <span class="list-group-item">
                        Cerveja - Skol-Lata - 1x
                        <div class="float-end">
                            <i class="fa-solid fa-pencil-square"></i>
                            <i class="fa-solid fa-trash"></i>
                        </div>
                    </span>
                </div>
                <div class="input-group my-3">
                    <input type="text" class="form-control" value="Valor total do pedido" readonly>
                    <span class="input-group-text">R$</span>
                    <span class="input-group-text">100,00</span>
                </div>
            </div>

            {{-- Parte da direita --}}
            <div class="col-md-3">
                <select name="" id="id-select-tipo-produtos" class="form-select my-1">
                </select>
                <select name="" id="" class="form-select my-1">
                    <option value="1">Pepperoni</option>
                    <option value="4">Bacon</option>
                </select>
                <input type="number" name="" id="" class="form-control text-end my-1" value="1">
                <a href="#" class="btn btn-secondary w-100 my-1">Adicionar Produto</a>
                <select name="" id="" class="form-select my-1">
                    <option value="1">Rua A</option>
                    <option value="2">Rua B</option>
                </select>
                <a href="#" class="btn btn-warning w-100 my-1">Confirmar Pedido</a>
                <a href="#" class="btn btn-primary w-100 my-1">Imprimir Comandas</a>
                <a href="#" class="btn btn-danger w-100 my-1">Cancelar Pedido</a>
                <a href="#" class="btn btn-success w-100 my-1">Finalizar Pedido</a>
            </div>
        </div>
    </div>
@endsection
