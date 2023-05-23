// executa o JS depois de todo HTML ser carregado
$(document).ready( function () {
    // no JS
    // const listaProduto = document.querySelector("#id-div-lista-produto");
    // No Jquery
    //const listaProduto = $("#id-div-lista-produto");
    // console.log(listaProduto);
    
    // Procurar um botão na página e adicionar um evento de click
    
    // Pelo JS
    //document.querySelector("#id-button-busca").addEventListener("click", function(){
    //    alert("botão clicado");
    //});
    
    // Pelo JQuery
    $("#id-button-busca").click( function(){
        alert("botão clicado");
    });
});