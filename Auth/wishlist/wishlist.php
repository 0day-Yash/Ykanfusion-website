<?php
session_start();
include 'config.php';  // Include your existing config.php

$user_id = 1;  // Replace with the actual user ID

$query = $conn->prepare("SELECT products.* FROM products
                         JOIN wishlist ON products.id = wishlist.product_id
                         WHERE wishlist.user_id = ?");
$query->execute([$user_id]);

$wishlistItems = $query->fetchAll();
?>

<h2>Your Wishlist</h2>
<?php foreach ($wishlistItems as $item): ?>
    <p><?= $item['name'] ?> - Price: $<?= $item['price'] ?></p>
<?php endforeach; ?>
