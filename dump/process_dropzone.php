<?php
// Include the existing connection.php to get the database connection
require_once 'connection.php';

// Define the target directory where uploaded files will be stored
$targetDir = "uploads/";

// Ensure that the target directory exists, if not, create it
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// Get the user ID and built game ID from the form
$userId = isset($_POST["user_id"]) ? intval($_POST["user_id"]) : 0;
$builtGameId = isset($_POST["built_game_id"]) ? intval($_POST["built_game_id"]) : 0;

// Get the original file name
$originalFileName = $_FILES["file"]["name"];

// Generate a unique filename to avoid overwriting files with the same name
$newFileName = uniqid() . "_" . $originalFileName;

// Define the target path for the uploaded file
$targetPath = $targetDir . $newFileName;

// Move the temporary file to the target path
if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
    // Insert uploaded file information into the database

    $uniqueFileName = $newFileName; // Store the unique filename

    $insertSql = "INSERT INTO dropzone_published_uploads (user_id, built_game_id, file_name, file_path, unique_file_name, date_added)
                  VALUES ($userId, $builtGameId, '$originalFileName', '$targetPath', '$uniqueFileName', NOW())";

    if ($_SESSION['db_connection']->query($insertSql) === TRUE) {
        echo "File information inserted into the database successfully.<br>";
    } else {
        echo "Error inserting file information: " . $_SESSION['db_connection']->error . "<br>";
    }
} else {
    echo "Error uploading $originalFileName.<br>";
}

header("Location: process_main.php");
?>
