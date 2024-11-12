<?php

require_once 'Produto.php';

class CarrinhoService {

    private $itens = []; // Array para armazenar os produtos no carrinho

    // Adiciona um produto ao carrinho
    public function adicionarProduto(Produto $produto, $quantidade) {
        // Verifica se o produto já está no carrinho
        foreach ($this->itens as $item) {
            if ($item['produto']->getId() === $produto->getId()) {
                // Se já está no carrinho, apenas aumenta a quantidade
                $item['quantidade'] += $quantidade;
                return;
            }
        }
        // Se não está no carrinho, adiciona o produto
        $this->itens[] = [
            'produto' => $produto,
            'quantidade' => $quantidade
        ];
    }

    // Remove um produto do carrinho
    public function removerProduto($produtoId) {
        foreach ($this->itens as $index => $item) {
            if ($item['produto']->getId() === $produtoId) {
                // Remove o produto do carrinho
                unset($this->itens[$index]);
                return true;
            }
        }
        return false; // Produto não encontrado no carrinho
    }

    // Calcula o total do carrinho
    public function calcularTotal() {
        $total = 0;
        foreach ($this->itens as $item) {
            $total += $item['produto']->calcularSubtotal($item['quantidade']);
        }
        return $total;
    }

    // Exibe os itens no carrinho
    public function exibirCarrinho() {
        foreach ($this->itens as $item) {
            echo "Produto: " . $item['produto']->getNome() . " | Quantidade: " . $item['quantidade'] . " | Subtotal: R$" . number_format($item['produto']->calcularSubtotal($item['quantidade']), 2, ',', '.') . "<br>";
        }
    }

    // Retorna os itens do carrinho
    public function getItens() {
        return $this->itens;
    }
}

?>
