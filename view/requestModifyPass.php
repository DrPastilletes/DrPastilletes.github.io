<?php
include "header.php";
?>
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-2"></div>
        <div class="col-8 align-self-center">
            <p>Sol·licitant el canvi de contrasenya rebràs un correu per a poder efectuar el canvi</p>
            <form action="../controller/sendMailPassChange.php">
                <input type="submit" class="btn btn-dark" value="Sol·licitar Correu">
            </form>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php
include "footer.php";
?>
