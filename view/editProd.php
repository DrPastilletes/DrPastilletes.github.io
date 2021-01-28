<?php include "header.php"; ?>
<?php include "../connect.php";
$con = new connect();
$con->openConnection();
$prod = $con->getProdById($_POST["editProd"]);
echo $_POST["idProducte"];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 ">
            <form action="../controller/editProdController.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" name="id" placeholder="id" value="<?php echo $prod[0]?>" hidden>
                </div>
                <div class="form-group">
                    <label for="inputName">Nom</label>
                    <input type="text" class="form-control" name="inputName" placeholder="Nom" value="<?php echo $prod[1]?>">
                </div>
                <div class="form-group">
                    <label for="inputSurname">Descripcio</label>
                    <textarea class="form-control" name="inputDesc" placeholder="Descripcio"><?php echo $prod[2]?></textarea>
                </div>
                <div class="form-group">
                    <label for="inputName">Preu</label>
                    <input type="number" class="form-control" min="0.1" step="any" name="inputPrice" value="<?php echo $prod[3]?>">
                </div>
                <div class="form-group">
                    <label for="inputName">Quantitat</label>
                    <input type="number" class="form-control" min="1" name="inputStock" value="<?php echo $prod[4]?>">
                </div>
                <div class="form-group">
                    <label for="inputName">Imatge</label>
                    <input type="file" class="form-control btn" name="inputImg">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="linkImg" placeholder="Nom" value="<?php echo $prod[5]?>" hidden>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="keyImg" placeholder="Nom" value="<?php echo $prod[6]?>" hidden>
                </div>
                <button type="submit" class="btn btn-primary" id="btnSubmit">Enviar</button>
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
