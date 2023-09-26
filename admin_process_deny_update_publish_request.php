<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $publishedGameId = $_POST['gameId'];
    $reason = $_POST['reason'];
    $file = $_FILES['file'];

    echo "Published Game ID: " . $publishedGameId . "<br>";
    echo "Reason: " . $reason . "<br>";

    $uploadDirectory = 'uploads/denied_update_publish_requests/';

    if (isset($_FILES['file'])) {
        $uniqueFilename = uniqid() . '_' . $file['name'];
        $uploadPath = $uploadDirectory . $uniqueFilename;

        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        } else {
            echo "File upload failed.";
            exit;
        }
    } else {
        $uploadPath = 0;
    }


    // Insert data into the database
    $insertQuery = "INSERT INTO denied_update_publish_requests (published_built_game_id, reason, file_path) VALUES ('$publishedGameId', '$reason', '$uploadPath')";
    mysqli_query($conn, $insertQuery);

    // Update the published_built_games table
    $updateQuery = "UPDATE published_built_games SET has_pending_update = 0, is_update_request_denied = 1 WHERE published_game_id = $publishedGameId";
    if (mysqli_query($conn, $updateQuery)) {
        // Delete related records
        $deleteQuery1 = "DELETE FROM pending_update_published_multiple_files WHERE published_built_game_id = $publishedGameId";
        mysqli_query($conn, $deleteQuery1);

        $deleteQuery2 = "DELETE FROM pending_update_published_built_games WHERE published_built_game_id = $publishedGameId";
        mysqli_query($conn, $deleteQuery2);

        echo $uploadPath;

        echo 'success';
    } else {
        echo 'Error updating built_games.';
    }
} else {
    echo "Invalid request";
}
