<?php
session_start();
include 'config.php';  // Include your existing database connection script

// Check if product ID is passed
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $user_id = 1; // Replace with your actual user ID or session ID

    // Check if the product is already in the cart
    $checkCart = $conn->prepare("SELECT * FROM cart WHERE user_id = ? AND product_id = ?");
    $checkCart->execute([$user_id, $product_id]);
    
    if ($checkCart->rowCount() > 0) {
        // If product is already in the cart, update the quantity
        $conn->prepare("UPDATE cart SET quantity = quantity + 1 WHERE user_id = ? AND product_id = ?")
             ->execute([$user_id, $product_id]);
    } else {
        // If product is not in the cart, insert it
        $conn->prepare("INSERT INTO cart (user_id, product_id) VALUES (?, ?)")
             ->execute([$user_id, $product_id]);
    }
    
    // Redirect to cart page or display success message
    header('Location: cart.php');
    exit();
}
?>
