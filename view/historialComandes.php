<?php
include "header.php";
include "../connect.php";

$con = new connect();
$con->openConnection();
$comandes = $con->getCartsByUser($_SESSION["user_loged"][0]);
$con->closeConnection();
?>
    <div class="container">
        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
            <tr>
                <th class="th-sm">ID Comanda</th>
                <th class="th-sm">Data</th>
                <th class="th-sm">PDF</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($comandes as $comanda) {
                ?>
                <tr>
                    <td><?php echo $comanda['idComanda'] ?></td>
                    <td><?php echo $comanda['dataFi'] ?></td>
                    <td>
                        <form method="post" action="../controller/crearPDF.php">
                            <input type="hidden" name="idComanda" value="<?php echo $comanda['idComanda'] ?>">
                            <button class="btn btn-danger" type="submit">Obrir PDF <i class="bi bi-file-earmark-text"></i></button>
                        </form>
                    </td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>

    </div>
    <form method="post" action="../controller/crearPDF.php">
        <input type="hidden" name="idComanda" value="1">
        <button class="btn btn-success" type="submit">REPUTO</button>
    </form>
<?php ?>