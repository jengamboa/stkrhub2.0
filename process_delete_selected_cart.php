<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cartIds = $_POST['cartIds'];

    if (!empty($cartIds)) {
        $cartIds = array_map('intval', $cartIds);

        // First, update the games with is_pending = 0 for the corresponding cart_id's ticket_id
        $updateSql = "UPDATE games 
                      JOIN cart ON games.game_id = cart.game_id 
                      SET games.is_pending = 0 
                      WHERE cart.cart_id IN (" . implode(',', $cartIds) . ") 
                      AND cart.ticket_id IS NOT NULL";

        if ($conn->query($updateSql)) {
            // Next, delete the cart items
            $deleteSql = "DELETE FROM cart WHERE cart_id IN (" . implode(',', $cartIds) . ")";

            if ($conn->query($deleteSql)) {
                $response = ["success" => true, "message" => "Items marked as invisible successfully"];
            } else {
                $response = ["success" => false, "message" => "Error deleting items: " . $conn->error];
            }
        } else {
            $response = ["success" => false, "message" => "Error updating games: " . $conn->error];
        }
    } else {
        $response = ["success" => false, "message" => "No items selected for update"];
    }
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
}

echo json_encode($response);
