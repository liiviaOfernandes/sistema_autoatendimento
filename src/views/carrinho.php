<?php

require_once 'Database.php';
require_once 'Produto.php';

class Carrinho {

    private $db;
    private $itens = [];

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // Método para adicionar produto no banco
    public function adicionarProduto($produtoId, $quantidade) {
        // Insere o produto no banco de dados
        $query = "INSERT INTO carrinhos (produto_id, quantidade) VALUES (:produto_id, :quantidade)";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':produto_id', $produtoId);
        $stmt->bindParam(':quantidade', $quantidade);
        
        return $stmt->execute(); // Retorna true se a inserção for bem-sucedida
    }

    // Método para calcular o total do carrinho
    public function calcularTotal() {
        $query = "SELECT p.preco, c.quantidade FROM carrinhos c JOIN produtos p ON c.produto_id = p.id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        $total = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $total += $row['preco'] * $row['quantidade'];
        }

        return $total;
    }
}
?>
