<?php
session_start();
include 'connection.php';

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data sent via POST
    $game_id = $_POST['gameId'];
    $ticket_id = $_POST['ticket_id'];
    $reason = $_POST['reason'];
    $file = $_FILES['file'];

    echo "Game ID: " . $game_id . "<br>";
    echo "Reason: " . $reason . "<br>";

    $uploadDirectory = 'uploads/denied_publish_requests/';

    if (isset($_FILES['file'])) {
        $uniqueFilename = time() . '_' . $file['name'];
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
    $insertQuery = "INSERT INTO games_reasons (game_id, reason, file_path) VALUES ('$game_id', '$reason', '$uploadPath')";
    mysqli_query($conn, $insertQuery);

    // Update the built_games table
    $updateQuery = "UPDATE games SET is_pending = 0, to_approve = 0, is_denied = 1 WHERE game_id = $game_id";
    if (mysqli_query($conn, $updateQuery)) {


        // Update the built_games table
        $updateQueryB = "DELETE FROM tickets WHERE game_id = $game_id;
        ";
        if (mysqli_query($conn, $updateQueryB)) {

            echo $uploadPath;
            echo 'success';
        }
    } else {
        echo 'Error updating built_games.';
    }
} else {
    echo "Invalid request";
}
