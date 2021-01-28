<?php
include "../functions.php";
include "../connect.php";
include "../model/product.php";
include "../view/header.php";

$prodInsuficient = false;
$_SESSION["error"] = "No es pot acabar la comanda degut a que no hi ha stock suficient de/ls seguten/s productes:";
$id = $_SESSION["user_loged"]["id"];
$con = new connect();
$con->openConnection();
$resultatComanda = $con->comprovarComandes($id);
$linies = $con->getComandLines($resultatComanda[0]['idComanda']);
foreach ($linies as $linia){
    $producte = $con->getProdById($linia['producte']);
    if(intval($producte['stock'])<intval($linia['quantitat'])){
        $prodInsuficient = true;
        $_SESSION["error"] .= "<br>".$producte["nomProducte"];
    }
}

if(!$prodInsuficient){
    $_SESSION["error"] = "La teva Comanda s'ha finalitzat amb exit!";
    foreach ($linies as $linia){
        $producte = $con->getProdById($linia['producte']);
        $quant = intval($producte['stock'])-intval($linia['quantitat']);
        $con ->reduirQuantitatProdcutes($quant,$linia['producte']);
    }
    $con->acabarComanda($_POST["preu"],$_POST["id"]);
}
$con->closeConnection();

header("Location: ../view/carrito.php");
?>
