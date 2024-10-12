<?php
$host = "bfp2yc5kz9yhcwjpz4km-mysql.services.clever-cloud.com";
$user = "u5z0l9iahtbtlqp7";
$password = "iayHl1FIVgK1QAAExAFJ";
$dbname = "bfp2yc5kz9yhcwjpz4km";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
