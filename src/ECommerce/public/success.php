<?php
session_start();
$_SESSION["cart"] = [];
include 'header.php';
?>

<div class="message-box">
    <h1>Pagament completat!</h1>
    <p>Gràcies per la teva compra.</p>
    <a class="btn" href="index.php">Tornar a la botiga</a>
</div>
