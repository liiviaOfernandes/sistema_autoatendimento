<?php

require_once 'Database.php';

class Usuario {

    private $db;

    public function __construct() {
        // Inicializa a conexão com o banco de dados
        $this->db = (new Database())->connect();
    }

    // Verifica as credenciais do usuário durante o login
    public function verificarCredenciais($email, $senha) {
        $query = "SELECT * FROM usuarios WHERE email = :email";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return true;
        }

        return false;
    }

    // Verifica se o email já está registrado no banco
    public function verificarEmail($email) {
        $query = "SELECT * FROM usuarios WHERE email = :email";
        
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        return $usuario ? true : false; // Se o usuário existir, retorna verdadeiro
    }

    // Cadastra um novo usuário
    public function cadastrar($nome, $email, $senha) {
        // Criptografa a senha antes de salvar no banco
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";

        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senhaHash);

        return $stmt->execute(); // Retorna true se a inserção for bem-sucedida
    }
}

?>
