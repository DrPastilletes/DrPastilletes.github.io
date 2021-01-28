<?php
session_start();
include "../model/usuari.php";
include "header.php";
?>
    <div>
        <?php
        if (isset($_SESSION["error"])) {
            ?>
            <div class="alert alert-success">
                <?php echo $_SESSION["error"]; ?>
            </div>
            <?php
            unset($_SESSION["error"]);
        }
        ?>
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-2"></div>
            <div class="col-8 align-self-center">
                <form action="../controller/modifyPassController.php" method="post">
                    <div class="form-group">
                        <label for="inputOldPassword">Contrasenya Antiga</label>
                        <input type="password" class="form-control" name="inputOldPassword" placeholder="Contrasenya">
                    </div>
                    <div class="form-group">
                        <label for="inputNewPassword">Nova Contrasenya</label>
                        <input type="password" class="form-control" name="inputNewPassword" placeholder="Contrasenya">
                    </div>
                    <div class="form-group">
                        <label for="inputNewConfirmPassword">Confirmar Contrasenya</label>
                        <input type="password" class="form-control" name="inputNewConfirmPassword"
                               placeholder="Contrasenya">
                    </div>
                    <div class="g-recaptcha" data-sitekey="6LcW4eQZAAAAAJOi1Os-rwuqc_u6Yhr9E-BwGh_H"
                         data-callback="enableBtn"></div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary lign-self-center w-100" id="btnSubmit">Enviar
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

<?php include "footer.php" ?>