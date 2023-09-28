<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }

    $game_id = $_POST['game_id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $total_price = $_POST['total_price'];
    $ticket_price = $_POST['ticket_price'];

    $conn->begin_transaction();

    try {

        // Insert the ticket into the 'cart' table with the 'ticket_id'
        $sqlUpdatePending = "UPDATE games
                SET is_pending = 1
                WHERE game_id = $game_id";
        $conn->query($sqlUpdatePending);




        // Insert a new ticket record into the 'tickets' table
        $sqlInsertTicket = "INSERT INTO tickets (game_id, user_id, total_price, ticket_price, is_at_cart) 
                            VALUES ($game_id, $user_id, $total_price, $ticket_price, 1)";
        $conn->query($sqlInsertTicket);

        // Get the ticket_id of the newly inserted ticket
        $ticket_id = mysqli_insert_id($conn);

        // Insert the ticket into the 'cart' table with the 'ticket_id'
        $sqlInsertIntoCart = "INSERT INTO cart (user_id, game_id, ticket_id, quantity, price, is_active) 
                              VALUES ($user_id, $game_id, $ticket_id, 1, $ticket_price, 1)";
        $conn->query($sqlInsertIntoCart);






        // Commit the transaction
        $conn->commit();

        $response = ["success" => true, "message" => "Ticket and cart entry added successfully"];
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
