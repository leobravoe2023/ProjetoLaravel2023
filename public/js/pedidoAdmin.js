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
                //console.log(response);
                const listPedidos = $("#list-pedidos");
                listPedidos.html("");
                response.return.forEach(pedido => {
                    switch (pedido.status) {
                        case 'A':
                            listPedidos.append(`<a href="#" class="list-group-item list-group-item-action">Pedido ${pedido.id}</a>`);
                            break;
                        case 'R':
                            listPedidos.append(`<a href="#" class="list-group-item list-group-item-action list-group-item-warning">Pedido ${pedido.id}</a>`);
                            break
                        case 'C':
                            listPedidos.append(`<a href="#" class="list-group-item list-group-item-action list-group-item-danger">Pedido ${pedido.id}</a>`);
                            break;
                        case 'E':
                            listPedidos.append(`<a href="#" class="list-group-item list-group-item-action list-group-item-primary">Pedido ${pedido.id}</a>`);
                            break;
                        case 'F':
                            listPedidos.append(`<a href="#" class="list-group-item list-group-item-action list-group-item-success">Pedido ${pedido.id}</a>`);
                            break;
                    }
                });
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
    // chamo a função
    updatePedidos();
});