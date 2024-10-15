<?php
session_start();  // Start the session
include('config.php');  // Include the database connection

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Retrieve the user from the database
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify the hashed password
        if (password_verify($password, $user['password'])) {
            // Password is correct, log the user in
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            echo "Login successful! Welcome, " . $user['username'];
            // Redirect to a dashboard or home page
            header('Location: dashboard.php');
            exit;
        } else {
            // Invalid password
            echo "Invalid email or password!";
        }
    } else {
        // No user found with that email
        echo "Invalid email or password!";
    }
}
?>
