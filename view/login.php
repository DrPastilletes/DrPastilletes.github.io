<?php
session_start();
include "../model/usuari.php";
include "../view/header.php";
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
        function enableBtn() {
            document.getElementById("btnSubmit").disabled = false;
        }
    </script>
</head>
<body>
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
        <div class="col-md-3"></div>
        <div class="col-md-6 align-self-center">
            <form action="../controller/loginController.php" method="post">
                <div class="form-group">
                    <label for="inputLoginEmail">Adreça de correu electronic</label>
                    <input type="email" class="form-control" name="inputLoginEmail" aria-describedby="emailHelp"
                           placeholder="E-mail">
                </div>
                <div class="form-group">
                    <label for="inputLoginPassword">Contrasenya</label>
                    <input type="password" class="form-control" name="inputLoginPassword" placeholder="Contrasenya">
                </div>
                <div class="g-recaptcha mt-5" data-sitekey="6LcW4eQZAAAAAJOi1Os-rwuqc_u6Yhr9E-BwGh_H"
                     data-callback="enableBtn"></div>
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