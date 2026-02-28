<?php
session_start();

if (!isset($_POST["id"])) {
    header("Location: cart.php");
    exit;
}

$id = (int) $_POST["id"];
$qty = max(1, (int) $_POST["qty"]);

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

$_SESSION["cart"][$id] = $qty;

header("Location: cart.php");
exit;
