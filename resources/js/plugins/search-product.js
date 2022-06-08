var Axios = require('axios');

const search = document.getElementById("search");
try {
search.addEventListener("keyup", function (e) {
    let valueSearch = e.target.value;
    if (valueSearch != "") {
        Axios.get( `http://127.0.0.1:8000/pesquisar/produto/${e.target.value}`).then(resp => {

            let products = resp.data;

            let html = '';
            let urlImage = 'http://127.0.0.1:8000/storage/products/';
            for ( products of products) { // para cada elemento do array, imprime o nome
                html+= `
                    <section class="produto rounded">
                        <img src="${urlImage}${products.photo}" alt="${products.name}" width="210" height="210">
                        <p>${products.name}</p>
                        <h4 class="font-weight-bold text-color-price">R$ ${products.price}</h4>
                        <div class="text-center">
                            <a href="#">
                                <p class="font-weight-bold bto-adicionar text-center">&nbsp; Adicionar Ao Carrinho &nbsp;</p>
                            </a>
                        </div>
                    </section>
                `;
            }
            document.getElementById("produtos").innerHTML = html;
        });    
    }
});
} catch (error) {
    
}