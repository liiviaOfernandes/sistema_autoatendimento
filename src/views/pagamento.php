<?php

class Pagamento {

    private $total;
    private $status;

    public function __construct($total) {
        $this->total = $total;
        $this->status = false; // Inicialmente o pagamento está como não aprovado
    }

    // Processa o pagamento
    public function processar($metodoPagamento) {
        if ($metodoPagamento == 'cartao') {
            return $this->processarCartao();
        } elseif ($metodoPagamento == 'boleto') {
            return $this->processarBoleto();
        } else {
            throw new Exception("Método de pagamento inválido.");
        }
    }

    // Processa o pagamento via cartão de crédito
    private function processarCartao() {
        // Simulação de pagamento com cartão
        $this->status = rand(0, 1) === 1;
        return $this->status ? "Pagamento com cartão aprovado!" : "Pagamento com cartão falhou!";
    }

    // Processa o pagamento via boleto
    private function processarBoleto() {
        // Simulação de pagamento com boleto
        $this->status = rand(0, 1) === 1;
        return $this->status ? "Pagamento com boleto aprovado!" : "Pagamento com boleto falhou!";
    }

    public function getStatus() {
        return $this->status;
    }

    public function getTotal() {
        return $this->total;
    }
}
?>
