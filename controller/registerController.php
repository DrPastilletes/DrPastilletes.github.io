<?php
include "../functions.php";
include "../connect.php";
include "../model/usuari.php";
include "sendMail.php";
session_start();
ob_start();
unset($_SESSION["error"]);
$_SESSION["register_submit"] = true;

$dni = $_POST['inputDNI'];
$nom = $_POST['inputName'];
$cognom = $_POST['inputSurname'];
$email = $_POST['inputEmail'];
$telefon = $_POST['inputTel'];
$adreca = $_POST['inputStreet'];
$cp = $_POST['inputPostalCode'];
$pass1 = $_POST['inputPassword'];
$pass2 = $_POST['inputConfirmPassword'];

$_SESSION["usuari"] = [$dni, $nom, $cognom, $email, $adreca, $telefon, $cp];

if(checkRegister($dni, $nom, $cognom, $email, $adreca, $telefon, $cp, $pass1 ,$pass2)){
    $_SESSION["error"] = "Vigila!! Has de omplir tots els camps...";
    header("Location: ../view/register.php");
}
if(!isEmail($email)){
    $_SESSION["error"] = "Vigila!! El correu és incorrecte...";
    header("Location: ../view/register.php");
}
if(!comparePasswords($pass1,$pass2)){
    $_SESSION["error"] = "Vigila!! Les contrasenyes no coincideixen...";
    header("Location: ../view/register.php");
}
$con = new connect();
$con -> openConnection();
if ($con -> checkDni($dni)){
    $_SESSION["error"] = "Vigila!! El DNI introduit ja esta a la base de dades...";
    header("Location: ../view/register.php");
}

if ($con -> checkEmail($email)){
    $_SESSION["error"] = "Vigila!! El mail introduit ja esta a la base de dades...";
    header("Location: ../view/register.php");
}

if(!isset($_SESSION["error"])){
    $passEncriptada = encriptarPassword($pass1);
    $token = generateToken();
    $user = new usuari($dni, $nom, $cognom, $email, $adreca, $telefon, $cp, $passEncriptada, $token);
    $con -> addUser($user);
    sendVerificationMail($user);
    $_SESSION["register_submit"] = false;
    unset($_SESSION["usuari"]);
    $_SESSION["error"] = "S'ha enviat un mail al teu correu electronic, verifica el teu compte siusplau!";
    header("Location: ../view/login.php");
}
$con -> closeConnection();


?>
