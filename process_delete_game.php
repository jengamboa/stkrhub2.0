<?php
include 'connection.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game_id = $_POST['game_id'];

    // Begin a transaction
    $conn->begin_transaction();

    try {
        $setGameId = "UPDATE built_games SET game_id = 0 WHERE game_id = $game_id";
        $conn->query($setGameId);

        // Delete related records in 'added_game_components' table
        $sqlDeleteRelatedComponents = "DELETE FROM added_game_components WHERE game_id = $game_id";
        $conn->query($sqlDeleteRelatedComponents);

        // Delete related records in 'games' table
        $sqlDeleteRelatedGames = "DELETE FROM games WHERE game_id = $game_id";
        $conn->query($sqlDeleteRelatedGames);

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
