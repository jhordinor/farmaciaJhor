<?php
include_once('Conexion.php');

class Usuario {
    private $acceso;
    public $objetos;

    public function __construct() {
        $db = new Conexion();
        $this->acceso = $db->getPdo();
    }

    public function Loguearse($dni, $pass) {
        $sql = "SELECT * 
                FROM usuario 
                INNER JOIN tipo_us ON usuario.us_tipo = tipo_us.id_tipo_us 
                WHERE usuario.dni_us = :dni 
                AND usuario.contraseña_us = :pass";
        $query = $this->acceso->prepare($sql);
        $query->execute(array(':dni' => $dni, ':pass' => $pass));
        $this->objetos = $query->fetchAll();
        return $this->objetos;
    }
}
?>
