<?php
include "connection.php"; // Include your database connection script

$user_id = $_GET['user_id'];

$sqlGames = "SELECT * FROM games WHERE user_id = $user_id";
$resultGames = $conn->query($sqlGames);
$data = array();
while ($fetchedGames = $resultGames->fetch_assoc()) {
    $game_id  = $fetchedGames['game_id'];

    $cart_count = $game_id;

    $data[] = array(
        "cart_count" => $cart_count,


    );
}

echo json_encode($data);
