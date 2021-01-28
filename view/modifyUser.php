<?php
session_start();
include "../model/usuari.php";
include "header.php";
?>
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-2"></div>
            <div class="col-8 align-self-center">
                <form action="../controller/userController.php" method="post">
                    <div class="form-group">
                        <label for="inputName">Nom</label>
                        <input type="text" class="form-control" name="inputName" placeholder="Nom"
                               value="<?php echo isset($_SESSION["user_loged"][1]) ? $_SESSION["user_loged"][1] : null ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputSurname">Cognoms</label>
                        <input type="text" class="form-control" name="inputSurname" placeholder="Cognoms"
                               value="<?php echo isset($_SESSION["user_loged"][2]) ? $_SESSION["user_loged"][2] : null ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputName">DNI</label>
                        <input type="text" class="form-control" name="inputDNI" placeholder="DNI"
                               value="<?php echo isset($_SESSION["user_loged"][3]) ? $_SESSION["user_loged"][3] : null ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputTel">Telefon</label>
                        <input type="tel" class="form-control" name="inputTel" placeholder="Telefon"
                               value="<?php echo isset($_SESSION["user_loged"][9]) ? $_SESSION["user_loged"][9] : null ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputStreet">Adreça</label>
                        <input type="text" class="form-control" name="inputStreet" aria-describedby="emailHelp"
                               placeholder="Adreça"
                               value="<?php echo isset($_SESSION["user_loged"][5]) ? $_SESSION["user_loged"][5] : null ?>">
                    </div>
                    <div class="form-group">
                        <label for="inputPostalCode">Codi Postal</label>
                        <input type="text" class="form-control" name="inputPostalCode"
                               placeholder="Codi Postal"
                               value="<?php echo isset($_SESSION["user_loged"][7]) ? $_SESSION["user_loged"][7] : null ?>">
                    </div>
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary align-self-center w-100" id="btnSubmit">Enviar</button>
                    </div>
                </form>
            </div>
            <div class="col-2"></div>
        </div>
    </div>

<?php
include "footer.php";
?>