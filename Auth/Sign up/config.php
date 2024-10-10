<?php
$servername = "sql209.infinityfree.com"; 
$username = "if0_37485959"; 
$password = "iZ41YQh6kxjkRsB"; 
$dbname = "if0_37485959_Main"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Uncomment the line below for debugging purposes
// echo "Connected successfully";
?>
