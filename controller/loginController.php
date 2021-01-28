<?php
include "../functions.php";
include "../connect.php";
include "../model/usuari.php";
session_start();

$email = $_POST["inputLoginEmail"];
$pass = $_POST['inputLoginPassword'];
$con = new connect();
$con->openConnection();
if ($con->checkEmail($email)) {
    $usuari = $con->getUserByMail($email);
    $passBBDD = $usuari["Contrasenya"];
    if (checkPassword($pass, $passBBDD)) {
        $_SESSION["user_loged"] = $usuari;
        header("Location: ../view/index.php");
    } else {
        $_SESSION["error"] = "La contrasenya introduida no es correcta... ";
        header("Location: ../view/login.php");
    }
} else {
    $_SESSION["error"] = "El mail introduit no esta registrat, prova a registrarte abans de iniciar sessió";
    header("Location: ../view/login.php");
}
?>
