<?php
include "../pdf/provaPDF.php";

$idComanda = $_POST["idComanda"];
$con = new connect();
$con->openConnection();
$comanda = $con->getComandById($idComanda);
$client = $con->getUserById($comanda['usuari']);

crearPDF($comanda);

?>