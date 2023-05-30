// executa o JS depois de todo HTML ser carregado
$(document).ready( function () {
    
    const selectFiltroTipo = $("#id-select-filtro-tipo");
    
    selectFiltroTipo.on("change", function (){
        updateProdutos();
    });

    function updateProdutos(){
        // Pego o valor da propriedade VALUE do elemento selecionando
        //  e coloco na váriavel tipoProdutoId
        const tipoProdutoId = selectFiltroTipo.val();
        console.log(tipoProdutoId);
        $.ajax({
            type: "GET",
            url: `/pedido/usuario/getprodutos/${tipoProdutoId}`,
            data: null,
            dataType: "json",
            success: function(response){
                // Procuro onde quero imprimir as informações
                divProduto = $("#id-div-lista-produto");
                // Apago qualquer informação dentro do local selecionado
                divProduto.html("");
                // Imprimo os dados recebidos
                response.return.forEach(produto => {
                    divProduto.append(`<p>${produto.id} - ${produto.nome}</p>`);
                });
            },
            error: function(error){
                console.log("caiu no erro");
                console.log(error);
            }
        });
    }

});
