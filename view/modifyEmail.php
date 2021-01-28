<?php include "header.php" ?>
<div class="container-fluid">
    <div class="row justify-content-center mt-5">
        <div class="col-2"></div>
        <div class="col-8 align-self-center">
            <div class="form-group">
                <form action="../controller/modifyEmailController.php" method="post">
                    <label for="inputEmail">Adreça de correu electronic</label>
                    <input type="email" class="form-control" name="inputEmail" aria-describedby="emailHelp"
                           placeholder="E-mail"
                           value="<?php echo isset($_SESSION["user_loged"][4]) ? $_SESSION["user_loged"][4] : null ?>">
                    <div class="form-group mt-5">
                        <button type="submit" class="btn btn-primary w-100" id="btnSubmit">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php include "footer.php" ?>
