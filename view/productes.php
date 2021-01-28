<?php include "header.php"; ?>
<?php include "../model/product.php"; ?>
<?php include "../connect.php"; ?>
<style>
    .card {
        padding: 0 10px;

    }
</style>
<div class="container-fluid">
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
    <?php
    $con = new connect();
    $con->openConnection();
    $contador = 0;

    foreach ($con->getProds() as $prod) {
        if ($contador % 5 == 0) {
            ?>
            <div class="row">
            <?php
        }
        $contador++;
        ?>
        <div class="card m-2" style="width: 18rem;">
            <img class="card-img-top" src="<?php echo $prod["img"] ?>" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title"><?php echo $prod["nomProducte"] ?></h5>
                <p class="card-text"><?php echo $prod["descripcio"] ?></p>
                <div class="row">
                    <div class="col-8">
                        <?php if ($_SESSION["user_loged"]["activation"] >= 1) {
                            if ($prod["stock"] == 0) {
                                ?>
                                <span class="text-danger">Fora d'stock!</span>
                                <?php
                            } else {
                                ?>
                                <form method="post" action="detailProduct.php">
                                    <input value="<?php echo $prod["idProducte"] ?>" name="id" hidden>
                                    <button type="submit" class="btn btn-primary">Ver más</button>
                                </form>
                                <?php
                            }
                        } else {
                            $_SESSION["error"] = "Has de iniciar sessio abans de comprar res, si ja has iniciat sessio activa la conta!";
                            if ($prod["stock"] == 0) {
                                ?>
                                <span class="text-danger">Fora d'stock!</span>
                                <?php
                            } else {
                                ?>
                                <form method="post" action="productes.php">
                                    <button type="submit" class="btn btn-primary">Ver más</button>
                                </form>
                                <?php
                            }
                        } ?>

                    </div>
                    <div class="col-4">
                        <p><?php echo $prod["preu"] ?> €</p>
                    </div>
                </div>

            </div>
        </div>
        <?php
        if ($contador % 5 == 0) {
            ?>
            </div>
            <?php
        }
    }
    $con->closeConnection();
    ?>
</div>
<?php include "footer.php"; ?>
