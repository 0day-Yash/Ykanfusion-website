<?php
session_start();
include 'config.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match!";
        exit; // Stop further execution if passwords do not match
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

    // Check if the email already exists
    $check_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Email is already registered!";
    } else {
        // Insert new user into the database
        $insert_query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("sss", $username, $email, $hashed_password);
        
        if ($insert_stmt->execute()) {
            // Redirect or display success message
            echo "Signup successful! You can now log in.";
            // Optionally, redirect to the login page
            // header("Location: login.php");
            // exit();
        } else {
            echo "Error: " . $insert_stmt->error;
        }
    }
}
?>
