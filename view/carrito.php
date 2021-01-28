<?php include "header.php"; ?>
<?php include "../connect.php";
$con = new connect();
$con->openConnection();
$prod = $con->getProdById($_POST["id"]);
$id = $_SESSION["user_loged"]["id"];
$resultatComanda = $con->comprovarComandes($id);
$linies = $con->getComandLines($resultatComanda[0]['idComanda']);

$preuFinal = 0;
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
<div class="container">
    <div class="row">
        <div class="col-7">
            <?php
            foreach ($linies as $linia) {
                ?>
                <div class="d-flex producte mb-3">
                    <?php
                    $preuFinal += $linia['preuFinal'];
                    $producte = $con->getProdById($linia['producte']);
                    ?>
                    <img src="<?php echo $producte['img']; ?>">
                    <div class="info d-flex justify-content-between align-items-center w-100">
                        <span><?php echo $producte['nomProducte']; ?></span>
                        <span><?php echo "x" . $linia['quantitat']; ?></span>
                        <span><?php echo $linia['preuFinal'] . "€"; ?></span>
                        <form method="post" action="../controller/borrarLinia.php">
                            <input type="text" name="borrar" value="<?php echo $linia['idLinia']; ?>" hidden>
                            <input type="submit" class="btn btn-danger" value="X">
                        </form>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="col-5">
            <div class="d-flex justify-content-between w-100">
                <span>Preu total</span>
                <span><?php echo $preuFinal; ?>€</span>
            </div>
            <div class="d-flex justify-content-between w-100">
                <span>IVA</span>
                <span>21%</span>
            </div>
            <hr>
            <div class="d-flex justify-content-between w-100">
                <span>Preu Final</span>
                <span><?php
                    $preuFinal = $preuFinal * 1.21;
                    echo $preuFinal; ?>€</span>
            </div>
            <hr>
            <div>
                <form method="post" action="../controller/acabarComanda.php">
                    <input type="text" name="id" value="<?php echo $resultatComanda[0]['idComanda']; ?>" hidden>
                    <input type="text" name="preu" value="<?php echo $preuFinal; ?>" hidden>
                    <input type="submit" class="btn btn-success w-100 mb-3 p-3" value="Comprar!">
                </form>
            </div>
            <div id="smart-button-container">
                <div style="text-align: center;">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
            <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"
                    data-sdk-integration-source="button-factory"></script>
            <script>
                function initPayPalButton() {
                    paypal.Buttons({
                        style: {
                            shape: 'rect',
                            color: 'gold',
                            layout: 'vertical',
                            label: 'paypal',

                        },

                        createOrder: function (data, actions) {
                            return actions.order.create({
                                purchase_units: [{"amount": {"currency_code": "USD", "value": 1}}]
                            });
                        },

                        onApprove: function (data, actions) {
                            return actions.order.capture().then(function (details) {
                                alert('Transaction completed by ' + details.payer.name.given_name + '!');
                            });
                        },

                        onError: function (err) {
                            console.log(err);
                        }
                    }).render('#paypal-button-container');
                }

                initPayPalButton();
            </script
            <?php
            $con->closeConnection();
            ?>
        </div>
    </div>
</div>

<br>
<hr>


