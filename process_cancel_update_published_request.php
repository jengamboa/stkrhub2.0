<?php
require 'connection.php';

if (isset($_POST['published_game_id'])) {
    $published_game_id = $_POST['published_game_id'];

    // First, delete from pending_published_built_games table
    $sql1 = "DELETE FROM pending_update_published_multiple_files WHERE published_built_game_id = $published_game_id";
    $query1 = $conn->query($sql1);

    if ($query1) {
        // Second, delete from pending_published_multiple_files table
        $sql2 = "DELETE FROM pending_update_published_built_games WHERE published_built_game_id = $published_game_id";
        $query2 = $conn->query($sql2);

        if ($query2) {
            echo 'Deletion successful';

            $sql3 = "UPDATE published_built_games SET has_pending_update = 0 WHERE published_game_id = $published_game_id";
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