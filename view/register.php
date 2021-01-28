<?php
session_start();
include "../model/usuari.php";
include "../view/header.php";

if(isset($_SESSION["register_submit"]) && $_SESSION["register_submit"] == true){
    $user = $_SESSION["usuari"];
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <title>Document</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
        function enableBtn(){
            document.getElementById("btnSubmit").disabled = false;
        }
    </script>
</head>
<body>
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-md-3"></div>
        <div class="col-md-6 align-self-center">
            <div>
                <?php
                if (isset($_SESSION["error"])) {
                    ?>
                    <div class="alert alert-danger">
                        <?php echo $_SESSION["error"]; ?>
                    </div>
                    <?php
                    unset($_SESSION["error"]);
                }
                ?>
            </div>
            <form action="../controller/registerController.php" method="post">
                <div class="form-group">
                    <label for="inputName">Nom</label>
                    <input type="text" class="form-control" name="inputName" placeholder="Nom" value="<?php echo isset($_SESSION["usuari"][1]) ? $_SESSION["usuari"][1] : null?>">
                </div>
                <div class="form-group">
                    <label for="inputSurname">Cognoms</label>
                    <input type="text" class="form-control" name="inputSurname" placeholder="Cognoms" value="<?php echo isset($_SESSION["usuari"][2]) ? $_SESSION["usuari"][2] : null?>">
                </div>
                <div class="form-group">
                    <label for="inputName">DNI</label>
                    <input type="text" class="form-control" name="inputDNI" placeholder="DNI" value="<?php echo isset($_SESSION["usuari"][0]) ? $_SESSION["usuari"][0] : null?>">
                </div>
                <div class="form-group">
                    <label for="inputTel">Telefon</label>
                    <input type="tel" class="form-control" name="inputTel" placeholder="Telefon" value="<?php echo isset($_SESSION["usuari"][5]) ? $_SESSION["usuari"][5] : null?>">
                </div>
                <div class="form-group">
                    <label for="inputEmail">Adreça de correu electronic</label>
                    <input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp"
                           placeholder="E-mail" value="<?php echo isset($_SESSION["usuari"][3]) ? $_SESSION["usuari"][3] : null?>">
                </div>
                <div class="form-group">
                    <label for="inputStreet">Adreça</label>
                    <input type="text" class="form-control" name="inputStreet" aria-describedby="emailHelp"
                           placeholder="Adreça" value="<?php echo isset($_SESSION["usuari"][1]) ? $_SESSION["usuari"][1] : null?>">
                </div>
                <div class="form-group">
                    <label for="inputPostalCode">Codi Postal</label>
                    <input type="text" class="form-control" name="inputPostalCode"
                           placeholder="Codi Postal" value="<?php echo isset($_SESSION["usuari"][6]) ? $_SESSION["usuari"][6] : null?>">
                </div>
                <div class="form-group">
                    <label for="inputPassword">Contrasenya</label>
                    <input type="password" class="form-control" name="inputPassword" placeholder="Contrasenya">
                </div>
                <div class="form-group">
                    <label for="inputConfirmPassword">Confirmar Contrasenya</label>
                    <input type="password" class="form-control" name="inputConfirmPassword"
                           placeholder="Confirmar Contrasenya">
                </div>
                <div class="g-recaptcha mt-5" data-sitekey="6LcW4eQZAAAAAJOi1Os-rwuqc_u6Yhr9E-BwGh_H" data-callback="enableBtn"></div>
                <div class="form-group mt-5">
                    <button type="submit" class="btn btn-primary w-100" id="btnSubmit" disabled="disabled">Enviar</button>
                </div>
            </form>

        </div>
        <div class="col-md-3"></div>
    </div>
</div>

</body>
</html>
