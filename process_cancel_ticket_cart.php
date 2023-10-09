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


        $sqlTicket = "SELECT MAX(ticket_id) AS latest_ticket_id FROM tickets WHERE game_id = $game_id";
        $resultTicket = mysqli_query($conn, $sqlTicket);
        if ($resultTicket) {
            $rowTicket = mysqli_fetch_assoc($resultTicket);
            $latestTicketId = $rowTicket['latest_ticket_id'];
        }

        $sqlDeleteCart = "DELETE FROM cart WHERE ticket_id = $latestTicketId";
        $conn->query($sqlDeleteCart);

        $sqlDeleteTicket = "DELETE FROM tickets WHERE ticket_id = $latestTicketId";
        $conn->query($sqlDeleteTicket);

        $sqlUpdatePending = "UPDATE games
                SET is_pending = 0
                WHERE game_id = $game_id";
        $conn->query($sqlUpdatePending);


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
