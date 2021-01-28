<?php
include "../functions.php";
include "../connect.php";
include "../model/product.php";
include "../view/header.php";

$con = new connect();
$con->openConnection();
$con->modificarQuantitatProd($_POST["borrar"]);
$con->closeConnection();
$_SESSION["error"] = "Has borrat un producte!";
header("Location: ../view/productPanel.php");
?>