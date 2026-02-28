<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include 'header.php';
include 'db.php';
?>

<div class="hero">
    <h1>EL RACÓ DELS LLIBRES</h1>
    <p>
        Benvingut a la nostra botiga digital. Estem en fase beta i de moment només tenim 6 exemplars disponibles,
        però molt aviat n’arribaran molts més!
    </p>
</div>

<?php
$stmt = $pdo->query("SELECT * FROM productes");
$products = $stmt->fetchAll();
?>

<div class="productes">
    <?php foreach ($products as $p): ?>
        <div class="producte">
            <img src="<?= $p['imatge'] ?>" alt="<?= $p['nom'] ?>">
            <h3><?= $p["nom"] ?></h3>
            <p><?= number_format($p["preu"], 2) ?> €</p>
            <a href="add_to_cart.php?id=<?= $p['id'] ?>">Afegir al carret</a>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>
