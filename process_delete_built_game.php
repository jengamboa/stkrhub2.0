<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $built_game_id = $_POST['built_game_id'];

    $conn->begin_transaction();

    try {
        // Step 1: Delete related records in 'built_games_added_game_components' table
        $sqlDeleteRelatedComponents = "DELETE FROM built_games_added_game_components WHERE built_game_id = $built_game_id";
        $conn->query($sqlDeleteRelatedComponents);

        // Step 2: Delete the record from 'built_games' table
        $sqlDeleteBuiltGame = "DELETE FROM built_games WHERE built_game_id = $built_game_id";
        $conn->query($sqlDeleteBuiltGame);

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
