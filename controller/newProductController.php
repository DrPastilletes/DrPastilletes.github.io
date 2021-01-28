<?php
include "../functions.php";
include "../connect.php";
include "../model/product.php";
include "filesaws.php";
echo "principi";
session_start();
ob_start();
unset($_SESSION["error"]);
$nomProducte = $_POST["inputName"];
$descripcio = $_POST["inputDesc"];
$preu = $_POST["inputPrice"];
$stock = $_POST["inputStock"];
$img = $_FILES["inputImg"];
$image = getimagesize($_FILES["inputImg"]["tmp_name"]);
$image_width = $image[0];
echo $image_width;
$image_height = $image[1];
echo $image_height;
echo "abans if";
if($image_width==$image_height && $image_height>399){
    echo "dintre if";
    $imgResult = pujarImg($img);
    print_r($imgResult);
    $prod = new product($nomProducte,$descripcio,$preu,$stock,$imgResult[0],$imgResult[1]);
    print_r($prod);
    $con = new connect();
    $con -> openConnection();
    $con -> addProduct($prod);
    $con -> closeConnection();
    $_SESSION["error"] = $imgResult[0];
    header("Location: ../view/newProduct.php");
}else{
    echo "dintre else";
    $_SESSION["error"] = "La imatge és massa petita o no es quadrada (ex: 400x400)";
    header("Location: ../view/newProduct.php");
}

?>
