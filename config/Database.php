<?php
require_once 'vendor/autoload.php';

use Dotenv\Dotenv;

class Database {
    private $conn;
    
    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();
    }

    // Método de conexão
    public function connect() {
        if ($this->conn === null) {
            try {
                $this->conn = new PDO(
                    "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_NAME'],
                    $_ENV['DB_USER'],
                    $_ENV['DB_PASS']
                );
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Erro de conexão: " . $e->getMessage();
            }
        }
        return $this->conn;
    }

    // Método para retornar a conexão
    public function getConnection() {
        return $this->connect(); // Retorna a conexão
    }
}
?>
