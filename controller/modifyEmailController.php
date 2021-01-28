<?php
session_start();
include "../model/usuari.php";
include "../functions.php";
include "../connect.php";
include "sendMail.php";

$email = $_POST["inputEmail"];

$con = new connect();
$con -> openConnection();
$con -> modificarMail($email,$_SESSION["user_loged"][0]);
$con -> closeConnection();

$usu = new usuari($_SESSION["user_loged"][3], $_SESSION["user_loged"][1], $_SESSION["user_loged"][2],
    $email, $_SESSION["user_loged"][5], $_SESSION["user_loged"][9],
    $_SESSION["user_loged"][7], $_SESSION["user_loged"][6], $_SESSION["user_loged"][8]);
$usu -> setUserId($_SESSION["user_loged"][0]);

$_SESSION['user_loged'] = null;

sendVerificationMail($usu);
header("Location: ../view/index.php");
?>
