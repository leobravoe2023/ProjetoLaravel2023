// executa o JS depois de todo HTML ser carregado
$(document).ready(function () {

    function groupBy(arr, property) {
        return arr.reduce(function (anterior, atual) {
            if (!anterior[atual[property]]) {
                anterior[atual[property]] = [];
            }
            anterior[atual[property]].push(atual);
            return anterior;
        }, []);
    }

    const selectFiltroTipo = $("#id-select-filtro-tipo");

    selectFiltroTipo.on("change", function () {
        updateProdutos();
    });

    function updateProdutos() {
        // Pego o valor da propriedade VALUE do elemento selecionando
        //  e coloco na váriavel tipoProdutoId
        const tipoProdutoId = selectFiltroTipo.val();
        //console.log(tipoProdutoId);
        $.ajax({
            type: "GET",
            url: `/pedido/usuario/getprodutos/${tipoProdutoId}`,
            data: null,
            dataType: "json",
            success: function (response) {
                produtos_group = groupBy(response.return, "Tipo_Produtos_id");
                //console.log(produtos_group);
                showUpdatedProdutos(produtos_group);
                // Buscando todos os botões de adicionar produto
                const arrayBtnAddProduto = $(".btn-add-produto");
                // Faço o forEach no array e chamo a posição corrente de btnAddProduto
                arrayBtnAddProduto.each(function (position, btnAddProduto) {
                    btnAddProduto.addEventListener("click", addProdutoNoPedido);
                });
            },
            error: function (error) {
                console.log("caiu no erro");
                console.log(error);
            }
        });
    }

    function addProdutoNoPedido() {
        const idProdutoAdionado = this.getAttribute("value"); //4
        const idTipoProdutoAdicionado = this.getAttribute("value-tipo"); // 1
        const quantProdutoAdicionado = $(`#id-quant-produto-${idProdutoAdionado}`).val(); // 1
        const produto = produtos_group[idTipoProdutoAdicionado].find(obj => obj.id == idProdutoAdionado);
        console.log(produto);
        // Seleciono o local onde irei manipular o HTML
        const tabela = $("#id-tbody-itens-pedido");
        tabela.append(`
            <tr>
                <td>
                    ${produto.id}
                </td>
                <td>
                    ${produto.nome}
                </td>
                <td>
                    ${quantProdutoAdicionado*produto.preco}
                </td>
                <td>
                    <a class="btn btn-secondary">Editar</a>
                    <a class="btn btn-danger">Remover</a>
                </td>
            </tr>
        `);
        $(this).hide(20).show(20).hide(20).show(20);
    }

    function showUpdatedProdutos(produtos_group) {
        // Procuro onde quero imprimir as informações
        divProduto = $("#id-div-lista-produto");
        // Apago qualquer informação dentro do local selecionado
        divProduto.html("");
        produtos_group.forEach(produtos_tipo => {
            // Imprimir informações do tipo
            divProduto.append(`
                <div class="my-4 border border-dark">
                    <div class="m-4">
                        <h4 class="d-inline">${produtos_tipo[0].descricao}</h4>
                        <select class="float-end">
                            <option value="">Ordem do sistema</option>
                            <option value="">Menor para maior</option>
                            <option value="">Maior para menor</option>
                        </select>
                    </div>
                    <div class="my-4 produto">
                    </div>
                </div>
            `);
            produtos_tipo.forEach(produto => {
                // Imprimir as informação da variável produto
                $(".my-4.produto:last").append(`
                    <div class="row m-3 border border-dark">
                        <div class="col-md-3 my-auto">
                            <img class="w-100 h-100" src="${produto.urlImage}">
                        </div>
                        <div class="col-md-6 my-auto">
                            <h5>${produto.nome}</h5>
                            <h6>Ingredientes:</h6>
                            <p>${produto.ingredientes}</p>
                        </div>
                        <div class="col-md-3 my-auto">
                            <div class="my-3">
                                <input type="text" class="form-control" value="R$ ${produto.preco}" readonly>
                            </div>
                            <div class="my-3">
                                <input type="number" class="form-control" id="id-quant-produto-${produto.id}" value="1">
                            </div>
                            <div class="my-3">
                                <a class="btn btn-primary w-100 btn-add-produto" value="${produto.id}" value-tipo="${produto.Tipo_Produtos_id}">Adicionar Produto</a>
                            </div>
                        </div>
                    </div>
                `);
            });
        });
    }

    // Depois de ter carregado o HTML e declarado todo compotamento do JS, executa o updateProdutos para mostrar os
    // produtos iniciais
    updateProdutos();

});
