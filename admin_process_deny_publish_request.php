<?php
session_start();
include 'connection.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data sent via POST
    $builtGameId = $_POST['gameId'];
    $reason = $_POST['reason'];
    $file = $_FILES['file'];

    echo "Built Game ID: " . $builtGameId . "<br>";
    echo "Reason: " . $reason . "<br>";

    $uploadDirectory = 'uploads/denied_publish_requests/';

    // Check if a file was uploaded
    if (!empty($file['name'])) {
        $uniqueFilename = time() . '_' . $file['name'];
        $uploadPath = $uploadDirectory . $uniqueFilename;

        // Move the uploaded file to the specified directory
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
            // File uploaded successfully
        } else {
            // Handle file upload error
            echo "File upload failed.";
            exit;
        }
    } else {
        // No file was uploaded, set $uploadPath to NULL
        $uploadPath = NULL;
    }

    // Insert data into the database
    $insertQuery = "INSERT INTO denied_publish_requests (built_game_id, reason, file_path) VALUES ('$builtGameId', '$reason', '$uploadPath')";
    mysqli_query($conn, $insertQuery);

    // Update the built_games table
    $updateQuery = "UPDATE built_games SET is_pending_published = 0, is_request_denied = 1 WHERE built_game_id = $builtGameId";
    if (mysqli_query($conn, $updateQuery)) {
        // Delete related records
        $deleteQuery1 = "DELETE FROM pending_published_multiple_files WHERE built_game_id = $builtGameId";
        mysqli_query($conn, $deleteQuery1);

        $deleteQuery2 = "DELETE FROM pending_published_built_games WHERE built_game_id = $builtGameId";
        mysqli_query($conn, $deleteQuery2);

        echo 'success';
    } else {
        echo 'Error updating built_games.';
    }
} else {
    echo "Invalid request";
}
