// produtos do carrinho
let carrinhoProdutos = [];

    $(".btn-carrinho").on('click', function() {
        let id = $(this).attr("id");
        carrinhoProdutos.push({id:id});
        console.log(carrinhoProdutos)
    });




