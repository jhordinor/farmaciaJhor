<?php
class Conexion {
    private $servidor = "localhost";
    private $db = "famarcia";
    private $puerto = "3306";
    private $charset = "utf8";
    private $usuario = "root";
    private $pass = "1234";
    private $pdo;

    public function __construct() {
        try {
            $this->pdo = new PDO(
                "mysql:host={$this->servidor};dbname={$this->db};port={$this->puerto};charset={$this->charset}",
                $this->usuario,
                $this->pass
            );
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function getPdo() {
        return $this->pdo;
    }
}
?>
