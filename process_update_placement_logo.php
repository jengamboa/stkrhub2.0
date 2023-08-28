<?php
// process_update_placement_logo.php

// Check if the "Pending Published Built Game ID" is present in the query parameters
if (isset($_GET['pending_published_game_id'])) {
    // Retrieve the "Pending Published Built Game ID" from the query parameters
    $pendingPublishedBuiltGameID = $_GET['pending_published_game_id'];

    // Define the target directory for uploads
    $uploadsDirectory = 'uploads/';

    // Ensure the directory exists
    if (!is_dir($uploadsDirectory)) {
        mkdir($uploadsDirectory, 0777, true);
    }

    // Handle logo file upload
    if (isset($_FILES['logo'])) {
        $logoFileName = basename($_FILES['logo']['name']);
        $logoFilePath = $uploadsDirectory . $logoFileName;

        // Move uploaded logo to the uploads directory
        if (move_uploaded_file($_FILES['logo']['tmp_name'], $logoFilePath)) {
            echo "Logo uploaded successfully.<br>";

            // Link the logo with the "Pending Published Built Game ID"
            // ... Perform database update or processing here ...
            echo "Logo linked to Pending Published Built Game ID: " . $pendingPublishedBuiltGameID;
        } else {
            echo "Error uploading logo.";
        }
    } else {
        echo "Logo upload failed.";
    }
} else {
    echo "Pending Published Built Game ID not found in the URL.";
}
?>
