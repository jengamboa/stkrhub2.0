<?php
session_start();
include 'connection.php'; // Include your database connection script

// Ensure the session's database connection is available
if (!isset($_SESSION['db_connection'])) {
    die("Database connection not established.");
}

$conn = $_SESSION['db_connection'];

// Define the directory to store uploaded files
$uploadDir = 'uploads/';

// Prepare the insert statement
$insertQuery = "INSERT INTO uploads (filename, filepath) VALUES (?, ?)";

// Check if files were uploaded
if (!empty($_FILES['file']['name'])) {
    $files = $_FILES['file'];

    // Loop through uploaded files
    foreach ($files['tmp_name'] as $index => $tmpName) {
        $filename = basename($files['name'][$index]);
        $filePath = $uploadDir . $filename;

        // Move uploaded file to the desired directory
        move_uploaded_file($tmpName, $filePath);

        // Insert file information into the database
        $stmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($stmt, "ss", $filename, $filePath);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    echo "Files uploaded and inserted into the database.";
} else {
    echo "No files uploaded.";
}
?>
