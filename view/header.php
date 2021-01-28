<?php
session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estil.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script type="application/javascript" src="../js/bootstrap.min.js"></script>
    <title>Botiga Carles</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand ml-3" href="index.php">MACACO</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex" id="navbarNav">
        <ul class="navbar-nav w-100">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="productes.php">Productes</a>
            </li>
            <?php
            if (isset($_SESSION["user_loged"])) {
                ?>
                <div class="d-flex flex-row-reverse w-100">
                    <li class="nav-item">
                        <a class="btn btn-dark mr-3" href="../controller/logout.php">Sortir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                           href="userAdministration.php"><?php echo $_SESSION["user_loged"]["Nom"]; ?></a>
                    </li>
                    <?php
                    if ($_SESSION["user_loged"]["activation"] >= 2) {
                        ?>
                        <a class="nav-link" href="adminPanel.php">Admin Panel</a>
                        <a class="nav-link" href="newProduct.php">Afegir Producte</a>
                        <a class="nav-link" href="productPanel.php">Editar Producte</a>
                        <?php
                    }
                    ?>
                    <?php
                    if ($_SESSION["user_loged"]["activation"] >= 1) {
                        ?>
                        <a class="nav-link" href="carrito.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                 class="bi bi-cart" viewBox="0 0 16 16">
                                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                            </svg>
                        </a>
                        <?php
                    }
                    ?>
                </div>
                <?php
            } else {
                ?>
                <div class="d-flex flex-row-reverse w-100">
                    <li class="nav-item">
                        <a class="btn btn-outline-dark mr-3" href="register.php">Registra't</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-dark mr-3" href="login.php">Inicia Sessió</a>
                    </li>
                </div>
                <?php
            }
            ?>

        </ul>
    </div>
</nav>
