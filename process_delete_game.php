<?php
include 'connection.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game_id = $_POST['game_id'];

    try {
        // Start a database transaction
        $conn->begin_transaction();

        // Update related records in 'built_games_added_game_components' table
        $sqlUpdateComponents = "UPDATE built_games_added_game_components SET game_id = 0 WHERE built_game_id IN (SELECT built_game_id FROM built_games WHERE game_id = $game_id)";
        $conn->query($sqlUpdateComponents);

        // Update related records in 'built_games' table
        $sqlUpdateBuiltGames = "UPDATE built_games SET game_id = 0 WHERE game_id = $game_id";
        $conn->query($sqlUpdateBuiltGames);

        $sqlUpdateCart = "DELETE FROM cart WHERE game_id = $game_id";
        $conn->query($sqlUpdateCart);

        $sqlDeleteRelatedComponentsB = "DELETE FROM tickets WHERE game_id = $game_id";
        $conn->query($sqlDeleteRelatedComponentsB);

        // Delete related records in 'added_game_components' table
        $sqlDeleteRelatedComponents = "DELETE FROM added_game_components WHERE game_id = $game_id";
        $conn->query($sqlDeleteRelatedComponents);

        // Delete related records in 'games' table
        // $sqlDeleteRelatedGames = "DELETE FROM games WHERE game_id = $game_id";
        // $conn->query($sqlDeleteRelatedGames);
        $sqlDeleteRelatedGames = "UPDATE games SET is_visible = 0 WHERE game_id = $game_id";
        $conn->query($sqlDeleteRelatedGames);

        // Commit the transaction if all queries succeed
        $conn->commit();

        $response = ["success" => true, "message" => "Game and related records deleted successfully"];
        echo json_encode($response);
    } catch (Exception $e) {
        // If any query fails, roll back the transaction and handle the error
        $conn->rollback();

        $response = ["success" => false, "message" => "Error deleting game and related records: " . $e->getMessage()];
        echo json_encode($response);
    }
}
