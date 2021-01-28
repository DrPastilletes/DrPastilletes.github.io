<?php
include "header.php"
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 ">
            <form action="../controller/newProductController.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="inputName">Nom</label>
                    <input type="text" class="form-control" name="inputName" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="inputSurname">Descripcio</label>
                    <textarea class="form-control" name="inputDesc" placeholder="Descripcio"></textarea>
                </div>
                <div class="form-group">
                    <label for="inputName">Preu</label>
                    <input type="number" min="0.1" step="any" class="form-control" name="inputPrice">
                </div>
                <div class="form-group">
                    <label for="inputName">Quantitat</label>
                    <input type="number" class="form-control" name="inputStock">
                </div>
                <div class="form-group">
                    <label for="inputName">Imatge</label>
                    <input type="file" class="form-control btn" name="inputImg">
                </div>
                <button type="submit" class="btn btn-primary" id="btnSubmit">Submit</button>
            </form>
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
        </div>
        <div class="col-md-3"></div>
    </div>
</div>
<?php ?>
<?php include "footer.php"?>
