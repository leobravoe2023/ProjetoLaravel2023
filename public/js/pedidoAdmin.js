// executa o JS depois de todo HTML ser carregado
$(document).ready(function () {
    // declaro a função
    function updatePedidos() {
        $.ajax({
            type: "GET",
            url: "/pedido/admin/getpedidos",
            data: null,
            dataType: "json",
            success: function (response) {
                printPedidos(response.return);
                $(".class-list-pedido").on("click", function () {
                    const idPedido = this.getAttribute("value");
                    console.log(idPedido);
                    //updatePedidoProdutos(idPedido);
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    function printPedidos(arrayPedidos) {
        const listPedidos = $("#list-pedidos");
        listPedidos.html("");
        arrayPedidos.forEach(pedido => {
            switch (pedido.status) {
                case 'A':
                    listPedidos.append(`<a value="${pedido.id}" href="#" class="list-group-item list-group-item-action class-list-pedido">Pedido ${pedido.id}</a>`);
                    break;
                case 'R':
                    listPedidos.append(`<a value="${pedido.id}" href="#" class="list-group-item list-group-item-action list-group-item-warning class-list-pedido">Pedido ${pedido.id}</a>`);
                    break
                case 'C':
                    listPedidos.append(`<a value="${pedido.id}" href="#" class="list-group-item list-group-item-action list-group-item-danger class-list-pedido">Pedido ${pedido.id}</a>`);
                    break;
                case 'E':
                    listPedidos.append(`<a value="${pedido.id}" href="#" class="list-group-item list-group-item-action list-group-item-primary class-list-pedido">Pedido ${pedido.id}</a>`);
                    break;
                case 'F':
                    listPedidos.append(`<a value="${pedido.id}" href="#" class="list-group-item list-group-item-action list-group-item-success class-list-pedido">Pedido ${pedido.id}</a>`);
                    break;
            }
        });
    }
    function updateTipoProdutosDropdown() {
        $.ajax({
            type: "GET",
            url: `/pedido/admin/gettipoprodutos`,
            data: null,
            dataType: "json",
            success: function (response) {
                console.log(response)
                printSelectTipoProdutos(response.return);
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    function printSelectTipoProdutos(arrayTipoProdutos) {
        const selectTipoProdutos = $('#id-select-tipo-produtos');
        selectTipoProdutos.html("");
        arrayTipoProdutos.forEach(tipoProduto => {
            selectTipoProdutos.append(`<option value="${tipoProduto.id}">${tipoProduto.descricao}</option>`);
        });
    }
    // chamo a função
    updatePedidos();
    // chamo a função
    updateTipoProdutosDropdown();
});
