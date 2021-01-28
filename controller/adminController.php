<?php
include "../functions.php";
include "../connect.php";
include "../model/usuari.php";
include "../view/header.php";

if($_POST["borrar"]==1){
    $_SESSION["error"] = "Estas intentatn borrar l'usuari admin!";
    header("Location: ../view/adminPanel.php");
} else{
    $con = new connect();
    $con->openConnection();
    $con->deleteUserById($_POST["borrar"]);
    $con->closeConnection();
    if($_POST["borrar"]==$_SESSION["user_loged"][0]){
        unset($_SESSION["user_loged"]);
        header("Location: ../view/index.php");
    }else{
        $_SESSION["error"] = "Usuari esborrat!";
        header("Location: ../view/adminPanel.php");
    }
}

?>
