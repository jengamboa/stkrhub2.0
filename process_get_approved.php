<?php
include 'connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['built_game_id'])) {

    $built_game_id = $_POST['built_game_id'];

    // Update the is_pending column to 1 in the built_games table
    $update_query = "UPDATE built_games SET is_pending = 1 WHERE built_game_id = '$built_game_id'";

    if (mysqli_query($conn, $update_query)) {
        header("Location: pending_built_games_page.php"); // Redirect to the pending_built_games.php page
        exit; // Exit to prevent further execution
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

}
?>
