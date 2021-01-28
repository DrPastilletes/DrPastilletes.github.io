<?php
session_start();
include "../connect.php";
include "../model/liniaComanda.php";
include "../model/comanda.php";
include "../model/usuari.php";

if (isset($_SESSION["user_loged"]) && $_SESSION["user_loged"]["activation"] >= 2) {
    $con = new connect();
    $con->openConnection();
    $prod = $con->getProdById($_POST["id"]);
    $preu = floatval($prod["preu"]);
    $quantitat = intval($_POST["quantitat"]);
    $preuFinal = $preu * $quantitat;
    $id = $_SESSION["user_loged"]["id"];
    $resultatComanda = $con->comprovarComandes($id);
    if (count($resultatComanda) == 0) {
        $comanda = new comanda($id, 0, date("Y-m-d"),0);
        $comandaBBDD = $con->addCart($comanda);
    }
    $resultatComanda = $con->comprovarComandes($id);

    $liniaExistent = $con->comprovarLiniesComandes($resultatComanda[0]['idComanda'], $_POST["id"]);
    $linia = new liniaComanda($prod["idProducte"], $_POST["quantitat"], $preuFinal, $resultatComanda[0]['idComanda']);
    if (count($liniaExistent) == 0) {
        $con->addProdToCart($linia);
    } else {
        $idBBDD = $liniaExistent[0]['idLinia'];
        $quantitatBBDD = intval($liniaExistent[0]['quantitat']) + $quantitat;
        $preuBBDD = intval($liniaExistent[0]['preuFinal']) + $preuFinal;
        $con->modificarQuantitatLinies($quantitatBBDD, $preuBBDD, $idBBDD);
    }

    $con->closeConnection();
    header("Location: ../view/productes.php");
} else {
    $_SESSION["error"] = "Has de iniciar sessio abans de comprar res, si ja has iniciat sessio activa la conta!";
    header("Location: ../view/login.php");
}


?>

