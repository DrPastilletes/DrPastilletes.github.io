<?php
session_start();
include "../model/usuari.php";
include "../connect.php";
$con = new connect();
$con->openConnection();
$con->ferUserNormal($_POST["ferUser"]);
$_SESSION["user_loged"] = $con->getUserById($_SESSION["user_loged"]["id"]);
$con->closeConnection();
if($_SESSION["user_loged"]["activation"]<2){
    header("Location: ../view/index.php");
}else{
    header("Location: ../view/adminPanel.php");
}
?>
