<?php

require_once 'Usuario.php';

class Register {

    private $usuario;

    public function __construct(Usuario $usuario) {
        $this->usuario = $usuario;
    }

    // Registra um novo usuário
    public function registrar($nome, $email, $senha) {
        if ($this->usuario->verificarEmail($email)) {
            return "Email já registrado!";
        }
        
        // Registra o usuário no sistema
        $this->usuario->cadastrar($nome, $email, $senha);
        return "Usuário registrado com sucesso!";
    }
}
?>
