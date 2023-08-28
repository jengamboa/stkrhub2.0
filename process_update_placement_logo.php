<?php
// process_update_placement_logo.php

// Check if the "Pending Published Built Game ID" is present in the query parameters
if (isset($_GET['pending_published_game_id'])) {
    // Retrieve the "Pending Published Built Game ID" from the query parameters
    $pendingPublishedBuiltGameID = $_GET['pending_published_game_id'];

    // Echo the value
    echo "Pending Published Built Game ID: " . $pendingPublishedBuiltGameID;



    // Define the target directory for file uploads
    $targetDir = "uploads/";

    // Create the target directory if it doesn't exist
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    // Get the uploaded file information
    $fileName = basename($_FILES["logo"]["name"]);
    $targetPath = $targetDir . $fileName;

    // Check if the file already exists
    if (file_exists($targetPath)) {
        echo "File already exists.";
    } else {
        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
        }
    }
} else {
    echo "Pending Published Built Game ID not found in the URL.";
}
?>