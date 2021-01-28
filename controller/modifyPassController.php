<?php
session_start();
include "../model/usuari.php";
include "../functions.php";
include "../connect.php";

$pass = $_POST["inputOldPassword"];
$passBBDD = $_SESSION["user_loged"][6];
$pass1 = $_POST["inputNewPassword"];
$pass2 = $_POST["inputNewConfirmPassword"];

if(checkPassword($pass,$passBBDD)){
    if(comparePasswords($pass1 , $pass2)){
        $passEncriptada = encriptarPassword($pass1);
        $con = new connect();
        $con -> openConnection();
        $con -> canviarContrasenya($_SESSION["user_loged"][0],$passEncriptada);
        $con -> closeConnection();
        unset($_SESSION["user_loged"]);
        header("Location: ../view/index.php");
    }else{
        $_SESSION["error"] = "Les contrasenyes introduides no coincideixen... ";
        header("Location: ../view/modifyPass.php");
    }
}else{
    $_SESSION["error"] = "La contrasenya antiga introduida no es correcta... ";
    header("Location: ../view/modifyPass.php");
}

?>
