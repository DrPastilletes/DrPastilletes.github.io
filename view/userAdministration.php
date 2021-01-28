<?php
session_start();
include "../model/usuari.php";
include "header.php";
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4"><a class="btn btn-dark mr-3 mt-5 w-100" href="modifyUser.php">Canviar dades personals</a></div>
        <div class="col-4"><a class="btn btn-dark mr-3 mt-5 w-100" href="modifyEmail.php">Canviar Email</a></div>
        <div class="col-2"></div>
    </div>
    <div class="row">
        <div class="col-2"></div>
        <div class="col-4"><a class="btn btn-dark mr-3 mt-5 w-100" href="requestModifyPass.php">Canviar Contrasenya</a></div>
        <div class="col-4"><a class="btn btn-dark mr-3 mt-5 w-100" href="historialComandes.php">Veure Factures</a></div>
        <div class="col-2"></div>
    </div>

</div>
<?php include "footer.php"; ?>