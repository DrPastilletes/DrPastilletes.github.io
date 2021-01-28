<?php
session_start();
include "sendMail.php";
include "../model/usuari.php";
include "../connect.php";
$usu = new usuari($_SESSION["user_loged"][3], $_SESSION["user_loged"][1], $_SESSION["user_loged"][2],
    $_SESSION["user_loged"][4], $_SESSION["user_loged"][5], $_SESSION["user_loged"][9],
    $_SESSION["user_loged"][7], $_SESSION["user_loged"][6], $_SESSION["user_loged"][8]);
$con = new connect();
$con->openConnection();
$con-> openConnection();
$u = $con-> getUserByMail($usu->getEmail());
$con -> closeConnection();
$usu->setUserId($u['id']);


sendChangePasswordMail($usu);
header("Location: ../view/index.php");
?>

