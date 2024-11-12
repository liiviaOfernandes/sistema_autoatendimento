let carrinho = [];  // Array para armazenar os itens no carrinho

// Função para adicionar um produto ao carrinho
function adicionarAoCarrinho(nome, preco) {
    carrinho.push({ nome: nome, preco: preco });  // Adiciona o item ao carrinho
    atualizarCarrinho();  // Atualiza a exibição do carrinho
    alert(`${nome} adicionado ao carrinho!`);  // Exibe mensagem ao usuário
}

// Função para atualizar a lista de produtos no carrinho e o total
function atualizarCarrinho() {
    let listaProdutos = document.getElementById("listaProdutos");
    let total = 0;  // Inicializa o total do carrinho
    listaProdutos.innerHTML = "";  // Limpa a lista de produtos no carrinho

    // Itera sobre os itens do carrinho e atualiza a lista na página
    carrinho.forEach((item) => {
        listaProdutos.innerHTML += `<p>${item.nome} - R$${item.preco.toFixed(2)}</p>`;  // Adiciona item à lista
        total += item.preco;  // Atualiza o total
    });

    document.getElementById("total").innerText = `R$${total.toFixed(2)}`;  // Exibe o total no HTML
}

// Função para finalizar a compra
function finalizarCompra() {
    if (carrinho.length > 0) {
        window.location.href = "pagamento.html";  // Redireciona para a página de pagamento
    } else {
        alert("Seu carrinho está vazio!");  // Alerta o usuário caso o carrinho esteja vazio
    }
}

// Função para remover um item específico do carrinho (opcional)
function removerDoCarrinho(nome) {
    carrinho = carrinho.filter(item => item.nome !== nome);  // Remove o item pelo nome
    atualizarCarrinho();  // Atualiza o carrinho
}

// Função para limpar o carrinho (opcional)
function limparCarrinho() {
    carrinho = [];  // Limpa o carrinho
    atualizarCarrinho();  // Atualiza a exibição
}
