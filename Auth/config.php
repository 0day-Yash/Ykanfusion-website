<?php
// Database credentials from InfinityFree
$servername = "sql209.infinityfree.com";  // MySQL Hostname
$username = "if0_37485959";               // MySQL Username
$password = "iZ41YQh6kxjkRsB";            // MySQL Password
$dbname = "if0_37485959_XXX";             // MySQL Database Name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
