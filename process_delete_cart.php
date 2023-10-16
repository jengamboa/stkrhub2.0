<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cart_id = $_POST['cart_id'];

    $sqlGetGame = "SELECT * from cart WHERE cart_id = $cart_id";
    $resultGame = $conn->query($sqlGetGame);
    $rowGame = $resultGame->fetch_assoc();
    $ticket_id = $rowGame['ticket_id'];
    $built_game_id = $rowGame['built_game_id'];


    $conn->begin_transaction();

    try {

        if ($ticket_id) {
            // Retrieve game_id from cart table
            $sqlGetGameId = "SELECT game_id FROM cart WHERE cart_id = $cart_id";
            $result = $conn->query($sqlGetGameId);
            $row = $result->fetch_assoc();
            $game_id = $row['game_id'];

            // Update the games table
            $sqlUpdateGames = "UPDATE games SET is_pending = 0 WHERE game_id = $game_id";
            $conn->query($sqlUpdateGames);
        } elseif($built_game_id){
            // Update the games table
            $sqlUpdateGames = "UPDATE built_games SET is_at_cart = 0 WHERE built_game_id = $built_game_id";
            $conn->query($sqlUpdateGames);
        }

        $sqlDeleteCart = "DELETE FROM cart WHERE cart_id = $cart_id";
        $conn->query($sqlDeleteCart);


        $conn->commit();

        $response = ["success" => true, "message" => "Game and related records deleted successfully"];
    } catch (mysqli_sql_exception $e) {
        $conn->rollback();

        $response = ["success" => false, "message" => "Database error: " . $e->getMessage()];
    }

    echo json_encode($response);
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}
