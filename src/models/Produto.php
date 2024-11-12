<?php

class Produto {

    private $id;
    private $nome;
    private $descricao;
    private $preco;

    public function __construct($id, $nome, $descricao, $preco) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
    }

    // Getter e Setter para ID
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    // Getter e Setter para Nome
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    // Getter e Setter para Descrição
    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    // Getter e Setter para Preço
    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    // Método para calcular o preço total com base em uma quantidade
    public function calcularSubtotal($quantidade) {
        return $this->preco * $quantidade;
    }
}
?>
