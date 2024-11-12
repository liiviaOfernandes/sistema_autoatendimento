<?php

class PagamentoService {

    private $total;
    private $statusPagamento;

    // Inicializa o serviço de pagamento com o total da compra
    public function __construct($total) {
        $this->total = $total;
        $this->statusPagamento = false; // Estado inicial de pagamento
    }

    // Processa o pagamento
    public function processarPagamento($metodoPagamento) {
        if ($metodoPagamento === 'cartao') {
            // Simulação de processamento com cartão de crédito
            $this->statusPagamento = $this->processarCartaoCredito();
        } elseif ($metodoPagamento === 'boleto') {
            // Simulação de processamento com boleto
            $this->statusPagamento = $this->processarBoleto();
        } else {
            // Método de pagamento inválido
            throw new Exception("Método de pagamento inválido.");
        }

        if ($this->statusPagamento) {
            return "Pagamento aprovado!";
        } else {
            return "Pagamento não aprovado. Tente novamente.";
        }
    }

    // Simulação de processamento com cartão de crédito
    private function processarCartaoCredito() {
        // Aqui você pode integrar com uma API de pagamento real
        return rand(0, 1) === 1; // Retorna verdadeiro ou falso aleatoriamente
    }

    // Simulação de processamento com boleto bancário
    private function processarBoleto() {
        // A lógica de boleto seria diferente e poderia ser integrada a um sistema de pagamento bancário
        return rand(0, 1) === 1; // Retorna verdadeiro ou falso aleatoriamente
    }

    // Retorna o status do pagamento
    public function getStatusPagamento() {
        return $this->statusPagamento;
    }

    // Retorna o valor total do pagamento
    public function getTotal() {
        return $this->total;
    }
}

?>
