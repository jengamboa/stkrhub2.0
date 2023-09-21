<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }


    $game_id = $_POST['game_id'];
    $game_name = $_POST['name'];
    $game_description = $_POST['description'];
    $total_price = $_POST['total_price'];

    // Begin a transaction
    $conn->begin_transaction();

    try {
        // Update the 'is_built' flag in the 'games' table
        $sqlUpdateIsBuilt = "UPDATE games SET is_built = 1 WHERE game_id = $game_id";
        $conn->query($sqlUpdateIsBuilt);

        // Insert a record into the 'built_games' table
        $sqlInsertBuiltGame = "INSERT INTO built_games (game_id, name, description, creator_id, build_date, is_pending, is_canceled, is_approved, is_purchased, is_published, price)
            VALUES ($game_id, '$game_name', '$game_description', $user_id, NOW(), 0, 0, 0, 0, 0, $total_price)";
        $conn->query($sqlInsertBuiltGame);

        // Commit the transaction
        $conn->commit();

        $response = ["success" => true, "message" => "Game built successfully"];
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
