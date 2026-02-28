<?php
session_start();

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET["id"];

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

if (!isset($_SESSION["cart"])) {
    $_SESSION["cart"] = [];
}

if (!isset($_SESSION["cart"][$id])) {
    $_SESSION["cart"][$id] = 1;
} else {
    $_SESSION["cart"][$id]++;
}

header("Location: cart.php");
exit;

