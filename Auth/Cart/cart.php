<?php
session_start();
include '../config.php';  // Include your existing config.php

$user_id = 1;  // Replace with the actual user ID

$query = $conn->prepare("SELECT products.*, cart.quantity FROM products
                         JOIN cart ON products.id = cart.product_id
                         WHERE cart.user_id = ?");
$query->execute([$user_id]);

$cartItems = $query->fetchAll();
?>

<h2>Your Cart</h2>
<?php foreach ($cartItems as $item): ?>
    <p><?= $item['name'] ?> - Quantity: <?= $item['quantity'] ?> - Price: $<?= $item['price'] ?></p>
<?php endforeach; ?>
