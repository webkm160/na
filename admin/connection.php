<?php
$host = 'localhost';
$username = 'root';  // Use your database username
$password = '';      // Use your database password
$dbname = 'na_db';  // Use your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
