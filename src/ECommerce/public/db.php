<?php
$pdo = new PDO(
    "mysql:host=db;dbname=llibres;charset=utf8mb4",
    "root",
    "root",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
);
?>