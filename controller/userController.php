<?php
session_start();
include "../model/usuari.php";
include "../connect.php";
$dni = $_POST['inputDNI'];
$nom = $_POST['inputName'];
$cognom = $_POST['inputSurname'];
$email = $_SESSION["user_loged"][4];
$telefon = $_POST['inputTel'];
$adreca = $_POST['inputStreet'];
$cp = $_POST['inputPostalCode'];
$pass1 = $_SESSION["user_loged"][6];
$token = $_SESSION["user_loged"][8];

$user = new usuari($dni, $nom, $cognom, $email, $adreca, $telefon, $cp, $pass1, $token);

$con = new connect();
$con -> openConnection();
$con -> modificarUsuari($user,$_SESSION["user_loged"][0]);
$_SESSION["user_loged"] = $con -> getUserByMail($email);
$con -> closeConnection();

header("Location: ../view/index.php");

?>
