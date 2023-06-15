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
            <div class="m-3">
                <h4>Itens do pedido</h4>
            </div>
            <div class="m-3">
                <table class="table text-center">
                    <tbody id="id-tbody-itens-pedido"></tbody>
                </table>
            </div>
            <div class="m-3">
                <a href="#" class="btn btn-primary w-100">Próximo</a>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="id-edit-modal" tabindex="-1" aria-labelledby="id-modal-label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="id-modal-label">Editar Produto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3">

                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-3">
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <form id="id-form-modal-botao-remover" method="post" action="">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection