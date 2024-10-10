<?php
session_start();
include 'config.php'; // Include the database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usernameOrEmail = $_POST['username']; // Change this to match your input name
    $password = $_POST['password'];

    // Check if the user exists by either username or email
    $query = "SELECT * FROM users WHERE username = ? OR email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $usernameOrEmail, $usernameOrEmail); // Bind both parameters
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id']; // Store user ID in session
            // Redirect or display success message
            header("Location: welcome.php"); // Change this to your desired page
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "No user found with that username or email!";
    }
}
?>
