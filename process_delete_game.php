<?php
include 'connection.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game_id = $_POST['game_id'];

    // Begin a transaction
    $conn->begin_transaction();

    try {
        // Delete related records in 'built_games_added_game_components' table
        $sqlDeleteRelatedComponents = "DELETE FROM built_games_added_game_components WHERE game_id = $game_id";
        $conn->query($sqlDeleteRelatedComponents);

        // Delete related records in 'built_games' table
        $sqlDeleteRelatedGames = "DELETE FROM built_games WHERE game_id = $game_id";
        $conn->query($sqlDeleteRelatedGames);

        // Delete the game from the 'games' table
        $sqlDeleteGame = "DELETE FROM games WHERE game_id = $game_id";
        $conn->query($sqlDeleteGame);

        // Commit the transaction
        $conn->commit();

        $response = ["success" => true, "message" => "Game and related records deleted successfully"];
    } catch (mysqli_sql_exception $e) {
        // Rollback the transaction on error
        $conn->rollback();

        $response = ["success" => false, "message" => "Database error: " . $e->getMessage()];
    }

    echo json_encode($response);
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}
?>
