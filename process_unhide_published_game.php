<?php
include "connection.php"; // Include your database connection script

// Check if the published_game_id is set in the POST request
if (isset($_POST['published_game_id'])) {
    // Sanitize the input to prevent SQL injection
    $published_game_id = mysqli_real_escape_string($conn, $_POST['published_game_id']);

    // SQL query to update the is_hidden value to 1
    $sql = "UPDATE published_built_games SET is_hidden = 0 WHERE published_game_id = $published_game_id";

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        echo 'success'; // Send a success response
    } else {
        echo 'error'; // Send an error response if the query fails
    }
} else {
    echo 'invalid'; // Send an invalid request response if published_game_id is not provided
}
