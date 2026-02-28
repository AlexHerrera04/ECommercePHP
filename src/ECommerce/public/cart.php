<?php
session_start();
include 'db.php';
include 'header.php';

$cart = $_SESSION["cart"] ?? [];

if (empty($cart)) {
    echo '<div style="text-align:center; padding:80px 20px;">
            <h1>El carret està buit</h1>
            <a href="index.php" class="btn" style="margin-top:20px; display:inline-block;">Tornar a la botiga</a>
          </div>';
    exit;
}

$ids = array_keys($cart);
$placeholders = implode(',', array_fill(0, count($ids), '?'));

$stmt = $pdo->prepare("SELECT * FROM productes WHERE id IN ($placeholders)");
$stmt->execute($ids);
$products = $stmt->fetchAll();

$productsById = [];
foreach ($products as $p) {
    $productsById[$p['id']] = $p;
}

$subtotal = 0;
?>

<h1>Carret de la compra</h1>

<table>
    <tr>
        <th>Producte</th>
        <th>Quantitat</th>
        <th>Preu</th>
        <th>Total</th>
        <th>Eliminar</th>
    </tr>

    <?php foreach ($cart as $id => $qty):
        $p = $productsById[$id];
        $total = $p["preu"] * $qty * 1.21;
        $subtotal += $p["preu"] * $qty;
    ?>
    <tr>
        <td><?= $p["nom"] ?></td>
        <td>
            <form action="update_cart.php" method="POST" style="display:flex; align-items:center; justify-content:center; gap:8px;">
                <input type="hidden" name="id" value="<?= $id ?>">
                <input type="number" name="qty" value="<?= $qty ?>" min="1" max="99">
                <button type="submit" style="padding:6px 12px; font-size:0.78rem;">✓</button>
            </form>
        </td>
        <td><?= number_format($p["preu"], 2) ?> €</td>
        <td><?= number_format($total, 2) ?> €</td>
        <td>
            <a href="remove_from_cart.php?id=<?= $id ?>" class="btn-remove btn">✕</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
$iva = $subtotal * 0.21;
$total_final = $subtotal + $iva;
?>

<h3 style="text-align:center;">Subtotal: <?= number_format($subtotal, 2) ?> €</h3>
<h3 style="text-align:center;">IVA (21%): <?= number_format($iva, 2) ?> €</h3>
<h2 style="text-align:center;">Total: <?= number_format($total_final, 2) ?> €</h2>

<div style="text-align:center; margin:20px;">
    <a href="checkout.php" class="btn">Pagar amb Stripe</a>
</div>