<?php
include "../functions.php";
include "../connect.php";
include "../model/product.php";
include "../view/header.php";

$con = new connect();
$con->openConnection();
$con->deleteLineById($_POST["borrar"]);
$con->closeConnection();
$_SESSION["error"] = "Has borrat una linia de la comanda!";
header("Location: ../view/carrito.php");
?>
