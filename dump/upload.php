<?php
session_start();

// Include the database connection
require_once 'connection.php';

// Process form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];

    // Insert name and age into the "main" table
    $insertMainQuery = "INSERT INTO main (name, age) VALUES ('$name', '$age')";
    mysqli_query($conn, $insertMainQuery);

    // Process uploaded files
    $uploadDir = 'uploads/'; // Directory to store uploaded files

    if (!file_exists($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create the directory if it doesn't exist
    }

    $files = $_FILES['file'];

    foreach ($files['name'] as $key => $name) {
        $tmpName = $files['tmp_name'][$key];
        $newName = uniqid() . '_' . $name;
        $uploadPath = $uploadDir . $newName;

        move_uploaded_file($tmpName, $uploadPath);

        // Insert file information into the "uploads" table
        $insertUploadQuery = "INSERT INTO uploads (filename) VALUES ('$newName')";
        mysqli_query($conn, $insertUploadQuery);
    }

    // Redirect or display success message
    header("Location: index.html");
    exit();
}
?>
