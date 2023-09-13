<?php


// Replace 'your_username', 'your_password', and 'your_database_name' with your actual database credentials
$hostname = 'localhost';      // If your database is on a different server, change this to the server's hostname or IP address
$username = 'root';
$password = '';
$database_name = 'stkrhub_db';

// Create a connection
$conn = mysqli_connect($hostname, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// Store the database connection in the session
$_SESSION['db_connection'] = $conn;
?>
