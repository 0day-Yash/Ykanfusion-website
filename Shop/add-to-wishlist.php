<?php
session_start();
include 'config.php';  // Use your existing config file for DB connection

// Check if product ID is passed
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $user_id = 1; // Replace with your actual user ID or session ID

    // Check if the product is already in the wishlist
    $checkWishlist = $conn->prepare("SELECT * FROM wishlist WHERE user_id = ? AND product_id = ?");
    $checkWishlist->execute([$user_id, $product_id]);

    if ($checkWishlist->rowCount() == 0) {
        // If product is not in the wishlist, insert it
        $conn->prepare("INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)")
             ->execute([$user_id, $product_id]);
    }

    // Redirect to wishlist page or display success message
    header('Location: wishlist.php');
    exit();
}
?>
