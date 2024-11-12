<?php
require_once 'Database.php';

class CarrinhoController {

    private $db;
    private $conn;

    public function __construct() {
        // Inicializando a conexão com o banco de dados
        $this->db = new Database();
        $this->conn = $this->db->getConnection();
    }

    // Método para adicionar um produto ao carrinho
    public function adicionarProduto($produtoId, $quantidade) {
        // Verificando se o carrinho já existe na sessão
        if (!isset($_SESSION['carrinho'])) {
            $_SESSION['carrinho'] = [];
        }

        // Verificando se o produto já existe no carrinho
        if (isset($_SESSION['carrinho'][$produtoId])) {
            $_SESSION['carrinho'][$produtoId]['quantidade'] += $quantidade;
        } else {
            // Buscando informações do produto no banco de dados
            $produto = $this->buscarProdutoPorId($produtoId);
            if ($produto) {
                $_SESSION['carrinho'][$produtoId] = [
                    'produto' => $produto,
                    'quantidade' => $quantidade,
                    'subtotal' => $produto['preco'] * $quantidade
                ];
            }
        }

        // Atualiza o total do carrinho
        $this->atualizarTotalCarrinho();
    }

    // Método para remover um produto do carrinho
    public function removerProduto($produtoId) {
        if (isset($_SESSION['carrinho'][$produtoId])) {
            unset($_SESSION['carrinho'][$produtoId]);
        }

        // Atualiza o total do carrinho
        $this->atualizarTotalCarrinho();
    }

    // Método para calcular o total do carrinho
    public function atualizarTotalCarrinho() {
        $total = 0;
        foreach ($_SESSION['carrinho'] as $item) {
            $total += $item['subtotal'];
        }

        $_SESSION['totalCarrinho'] = $total;
    }

    // Método para listar os produtos do carrinho
    public function listarCarrinho() {
        if (isset($_SESSION['carrinho'])) {
            return $_SESSION['carrinho'];
        }

        return [];
    }

    // Método para limpar o carrinho
    public function limparCarrinho() {
        unset($_SESSION['carrinho']);
        unset($_SESSION['totalCarrinho']);
    }

    // Método para finalizar a compra (por exemplo, gravando no banco de dados)
    public function finalizarCompra($usuarioId) {
        // Aqui você pode inserir as informações da compra no banco de dados, como
        // produtos comprados, quantidade, total, e o id do usuário.

        // Exemplo de gravação de compra
        $query = "INSERT INTO compras (usuario_id, total, data_compra) VALUES (?, ?, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("id", $usuarioId, $_SESSION['totalCarrinho']);
        $stmt->execute();

        // Obtendo o ID da compra registrada
        $compraId = $stmt->insert_id;

        // Inserir os itens da compra
        foreach ($_SESSION['carrinho'] as $produtoId => $item) {
            $produto = $item['produto'];
            $quantidade = $item['quantidade'];
            $subtotal = $item['subtotal'];

            $query = "INSERT INTO itens_compra (compra_id, produto_id, quantidade, subtotal) VALUES (?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("iiid", $compraId, $produtoId, $quantidade, $subtotal);
            $stmt->execute();
        }

        // Após finalizar a compra, limpa o carrinho
        $this->limparCarrinho();
    }

    // Método auxiliar para buscar um produto pelo ID
    private function buscarProdutoPorId($produtoId) {
        $query = "SELECT id, nome, preco FROM produtos WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $produtoId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>
