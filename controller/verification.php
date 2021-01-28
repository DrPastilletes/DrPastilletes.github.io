<?php
include "../connect.php";
$id = $_GET["userId"] ?? 'noUser';
$token = $_GET['token'] ?? 'noToken';
$con = new connect();
$con->openConnection();

$usuari = $con->getTokenByIdUsuari($id);
$con -> closeConnection();

if(strcmp($token,$usuari===0)){
    $con-> openConnection();
    $con-> activarUser($id);
    $con -> closeConnection();
    $_SESSION["error"] = "Conta activada!!!";
    header("Location: ../view/login.php");
}

?>