<?php
include_once('../model/Usuario.php');
session_start();
$user = $_POST['user'];
$pass = $_POST['pass'];

$usuario = new Usuario();

if (!empty($_SESSION['us_tipo'])){
    //session_destroy();
    switch ($_SESSION['us_tipo']) {
        case '1':
            header("location: ../view/adm_catalogo.php");
            break;
            
        case '2':
            header("location:../view/tec_catalogo.php");
            break;
    }
}
else {
    $usuario->Loguearse($user, $pass);
    if(!empty($usuario->objetos)){
        foreach ($usuario->objetos  as $objeto) {
            $_SESSION['id_usuario'] = $objeto-> id_usuario;
            $_SESSION['us_tipo'] = $objeto-> us_tipo;
            $_SESSION['nombre_us'] = $objeto-> nombre_us;
        }
        switch ($_SESSION['us_tipo']) {
            case '1':
                header("location: ../view/adm_catalogo.php");
                break;
                
            case '2':
                header("location:../view/tec_catalogo.php");
                break;
        }
    }
    
    else {
        header("location:../view/login.php");
    }
}

?>