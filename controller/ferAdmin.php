<?php
session_start();
include "../model/usuari.php";
include "../connect.php";
$con = new connect();
$con->openConnection();
$con->ferUserAdmin($_POST["ferAdmin"]);
$con->closeConnection();
header("Location: ../view/adminPanel.php");
?>
