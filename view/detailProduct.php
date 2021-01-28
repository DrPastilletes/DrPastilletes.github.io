<?php include "header.php"; ?>
<?php include "../connect.php";
$con = new connect();
$con->openConnection();
$prod = $con->getProdById($_POST["id"]);
$con->closeConnection();
?>
<div class="d-flex flex-column align-items-center justify-content-center w-100 p-5">
    <img class="img-thumbnail img-fluid" width="400" height="400" src="<?php echo $prod["img"] ?>">
    <h3><?php echo $prod["nomProducte"]; ?></h3>
    <p><?php echo $prod["descripcio"]; ?></p>
    <p><?php echo $prod["preu"]; ?> €</p>

    <form method="post" action="../controller/crearLiniaComanda.php">
        <input type="text" value="<?php echo $_POST["id"]; ?>" name="id" hidden>
        <input type="number" name="quantitat" min="1" value="1">
        <input type="submit" class="btn btn-dark" value="Añadir al carrito">
    </form>
</div>



