<?php
session_start();
unset($_SESSION["user_loged"]);
header("Location: ../view/index.php");
?>
