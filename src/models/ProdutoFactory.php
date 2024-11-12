<?php

require_once 'Produto.php';

class ProdutoFactory {

    // Método para criar um novo produto
    public static function criarProduto($id, $nome, $descricao, $preco) {
        return new Produto($id, $nome, $descricao, $preco);
    }

    // Método para criar um produto fictício (exemplo de uso de Factory)
    public static function criarProdutoFicticio() {
        return new Produto(0, "Produto Fictício", "Descrição fictícia", 100.00);
    }
}
?>
