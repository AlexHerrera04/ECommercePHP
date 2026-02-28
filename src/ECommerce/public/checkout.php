<?php
session_start();
require 'vendor/autoload.php';
include 'db.php';

\Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));

$cart = $_SESSION["cart"] ?? [];

if (empty($cart)) {
    header("Location: cart.php");
    exit;
}

$ids = array_keys($cart);
$placeholders = implode(',', array_fill(0, count($ids), '?'));

$stmt = $pdo->prepare("SELECT * FROM productes WHERE id IN ($placeholders)");
$stmt->execute($ids);
$products = $stmt->fetchAll();

$line_items = [];

foreach ($products as $p) {
    $qty = $cart[$p["id"]];

    $line_items[] = [
        'price_data' => [
            'currency' => 'eur',
            'product_data' => [
                'name' => $p["nom"],
            ],
            'unit_amount' => intval($p["preu"] * 100),
        ],
        'quantity' => $qty,
    ];
}

$session = \Stripe\Checkout\Session::create([
    'payment_method_types' => ['card'],
    'line_items' => $line_items,
    'mode' => 'payment',
    'success_url' => 'http://localhost:8080/success.php',
    'cancel_url' => 'http://localhost:8080/cancel.php',
]);

header("Location: " . $session->url);
exit;