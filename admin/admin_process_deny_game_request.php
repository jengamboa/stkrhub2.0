<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $game_id = $_POST['game_id'];
    $creator_id = $_POST['creator_id'];
    $reason = $_POST['reason'];


    $uploadDirectory = '../uploads/denied_approve_game_requests/';

    if (isset($_FILES['fileupload'])) {
        $file = $_FILES['fileupload'];

        $uniqueFilename = uniqid() . '_' . $file['name'];
        $uploadPath = $uploadDirectory . $uniqueFilename;
        if (move_uploaded_file($file['tmp_name'], $uploadPath)) {
        } else {
            echo "File upload failed.";
            exit;
        }
    } else {
        $uploadPath = 0;
    }

    echo "reason" . $reason . "<br>";
    echo "game_id" . $game_id . "<br>";
    echo "creator_id" . $creator_id . "<br>";
    echo "uploadPath" . $uploadPath . "<br>";


    // Insert data into the database
    $insertQuery = "INSERT INTO denied_approve_game_requests (game_id, reason, file_path) VALUES ('$game_id', '$reason', '$uploadPath')";
    mysqli_query($conn, $insertQuery);
    $denied_approve_game_request_id = mysqli_insert_id($conn);


    // Update the games table
    $updateQuery = "UPDATE games SET is_pending = 0, is_purchased = 0, to_approve = 0, is_denied = 1, is_approved = 0 WHERE game_id = $game_id";
    if (mysqli_query($conn, $updateQuery)) {
        echo 'success';

        $sqlTicket = "SELECT MAX(ticket_id) AS latest_ticket_id FROM tickets WHERE game_id = $game_id";
        $resultTicket = mysqli_query($conn, $sqlTicket);
        if ($resultTicket) {
            $rowTicket = mysqli_fetch_assoc($resultTicket);
            $latestTicketId = $rowTicket['latest_ticket_id'];
        }

        $sqlUpdateTicket = "UPDATE tickets SET is_denied = 1 WHERE ticket_id = $latestTicketId";
        $conn->query($sqlUpdateTicket);

        $insertQueryTickets = "UPDATE tickets SET denied_approve_game_request_id = $denied_approve_game_request_id WHERE ticket_id = $latestTicketId";
        mysqli_query($conn, $insertQueryTickets);

    } else {
        echo 'Error updating built_games.';
    }
}
