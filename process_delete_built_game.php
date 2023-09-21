<?php
include 'connection.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $built_game_id = $_POST['built_game_id'];

    $conn->begin_transaction();

    try {
        // Delete related records in 'built_games' table
        $sqlDeleteRelatedGames = "DELETE FROM built_games WHERE built_game_id = $built_game_id";
        $conn->query($sqlDeleteRelatedGames);

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
