<?php
require 'connection.php'; // Include your connection.php file

if (isset($_POST['built_game_id'])) {
    $built_game_id = $_POST['built_game_id'];

    // First, delete from pending_published_built_games table
    $sql1 = "DELETE FROM pending_published_multiple_files WHERE built_game_id = $built_game_id";
    $query1 = $conn->query($sql1);

    if ($query1) {
        // Second, delete from pending_published_multiple_files table
        $sql2 = "DELETE FROM pending_published_built_games WHERE built_game_id = $built_game_id";
        $query2 = $conn->query($sql2);

        if ($query2) {
            echo 'Deletion successful';

            $sql3 = "UPDATE built_games SET is_pending_published = 0 WHERE built_game_id = $built_game_id";
            $query3 = $conn->query($sql3);
            if ($query3) {
                echo 'Deletion and update successful';
            }

        } else {
            echo 'Error deleting from pending_published_multiple_files: ' . $conn->error;
        }
    } else {
        echo 'Error deleting from pending_published_built_games: ' . $conn->error;
    }

} else {
    // Handle the case where built_game_id is not set
    echo 'Error: built_game_id not received';
}
?>