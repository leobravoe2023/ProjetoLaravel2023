@extends('layouts/app')

@section('content')
    <script src="{{ asset("js/pedidoUsuario.js") }}"></script>
    <div class="container">
        {{-- Parte superior --}}
        <div>
            <h1 class="text-center">Faça seu pedido</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Filtro de nome de produto">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="id-button-busca">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <select class="form-select" id="id-select-filtro-tipo">
                        <option value="0">Tudo</option>
                        <option value="1">Pizza</option>
                        <option value="2">Suco</option>
                        <option value="3">Cerveja</option>
                    </select>
                </div>
            </div>
        </div>
        {{-- Parte meio --}}
        <div id="id-div-lista-produto">
        </div>
        {{-- Parte inferior --}}
        <div class="my-4 border border-dark">
        </div>
    </div>
@endsection