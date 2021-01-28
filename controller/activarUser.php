<?php
session_start();
include "../model/usuari.php";
include "../connect.php";
$con = new connect();
$con->openConnection();
$con->activarUser($_POST["activar"]);
$con->closeConnection();
header("Location: ../view/adminPanel.php");
?>
