<?php
include "../functions.php";
include "../connect.php";
include "../model/usuari.php";
include "../model/product.php";
include "../view/header.php";
include "filesaws.php";

$id = $_POST["id"];
$nom = $_POST["inputName"];
$descripcio = $_POST["inputDesc"];
$preu = $_POST["inputPrice"];
$quantitat = $_POST["inputStock"];
$imgNova = $_FILES["inputImg"];
$imgAntiga = $_POST["linkImg"];
$keyImg = $_POST["keyImg"];

$con = new connect();
$con -> openConnection();
if($imgNova['error']==0){
    $imgResult = pujarImg($imgNova);
    $image = getimagesize($_FILES["inputImg"]["tmp_name"]);
    $image_width = $image[0];
    $image_height = $image[1];
    if($image_width==$image_height && $image_height>399){
        $prod = new product($nom,$descripcio,$preu,$quantitat,$imgResult[0],$imgResult[1]);
        $con -> modificarProd($prod,$id);
    }
}

if($imgNova['error']==4){
    $prod = new product($nom,$descripcio,$preu,$quantitat,$imgAntiga,$keyImg);
    $con -> modificarProd($prod,$id);
}
$con-> closeConnection();
header("Location: ../view/productPanel.php");
?>
