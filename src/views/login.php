<?php

require_once 'Usuario.php';

class Login {

    private $usuario;

    public function __construct(Usuario $usuario) {
        $this->usuario = $usuario;
    }

    // Realiza o login do usuário
    public function autenticar($email, $senha) {
        // Verifica se o usuário existe e a senha está correta
        if ($this->usuario->verificarCredenciais($email, $senha)) {
            $_SESSION['usuario_logado'] = $email;
            return true;
        }
        return false;
    }

    // Verifica se o usuário está logado
    public function verificarLogin() {
        return isset($_SESSION['usuario_logado']);
    }

    // Realiza o logout
    public function logout() {
        session_destroy();
        unset($_SESSION['usuario_logado']);
    }
}
?>
