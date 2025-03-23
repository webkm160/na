<?php
$host = 'localhost';
$username = 'u939280429_na_db';  // Use your database username
$password = 'Admin@311083';      // Use your database password
$dbname = 'u939280429_na_db';  // Use your database name

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
