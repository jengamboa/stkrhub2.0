<?php
include "connection.php";

$user_id = $_GET['user_id'];

$sqlCanceledBuiltGames = "SELECT * FROM built_games WHERE creator_id = $user_id AND is_approved = 1";
$resultCanceledBuiltGames = $conn->query($sqlCanceledBuiltGames);

$data = array();

while ($fetchedCanceledBuiltGames = $resultCanceledBuiltGames->fetch_assoc()) {
    $built_game_id = $fetchedCanceledBuiltGames['built_game_id'];
    $game_id = $fetchedCanceledBuiltGames['game_id'];
    $name = $fetchedCanceledBuiltGames['name'];
    $description = $fetchedCanceledBuiltGames['description'];
    $build_date = $fetchedCanceledBuiltGames['build_date'];
    $is_pending = $fetchedCanceledBuiltGames['is_pending'];
    $is_canceled = $fetchedCanceledBuiltGames['is_canceled'];
    $is_approved = $fetchedCanceledBuiltGames['is_approved'];
    $is_purchased = $fetchedCanceledBuiltGames['is_purchased'];
    $is_published = $fetchedCanceledBuiltGames['is_published'];
    $price = $fetchedCanceledBuiltGames['price'];

    $built_game_link = '
        <a href="game_dashboard.php?game_id=' . $game_id . '">' . $name . '</a>
    ';


    $sqlGetGameName = "SELECT * FROM games WHERE game_id = $game_id";
    $queryGetGameName = $conn->query($sqlGetGameName);
    while ($fetchedGameName = $queryGetGameName->fetch_assoc()) {
        $game_name = $fetchedGameName['name'];
    }


    if ($game_id == 0) {
        $from_what_game_value = '
            <small>deleted</small>
        ';
    } else {
        $from_what_game_value = '
            ' . $game_name . ' <br>
            <small>Game ID: ' . $game_id . '</small>
        ';
    }

    $from_what_game = $from_what_game_value;

    $total_price = $price;

    $formatted_date = date('F j, Y', strtotime($build_date));


    if ($is_pending == 1) {
        $status_value = 'Wait until the admin approves this';
    } elseif ($is_canceled == 1) {
        $status_value = 'CANCELED';
    } elseif ($is_approved == 1) {
        $status_value = 'APPROVED';
    } elseif ($is_purchased == 1) {
        $status_value = 'PURCHASED';
    } elseif ($is_published == 1) {
        $status_value = 'PUBLISHED';
    } else {
        $status_value = '';
    }

    $status = $status_value;


    $actions = '
    <a href="">
        Add to Cart
    </a>
    ';

    $data[] = array(
        "built_game_link" => $built_game_link,
        "description" => $description,
        "from_what_game" => $from_what_game,
        "total_price" => $total_price,
        "formatted_date" => $formatted_date,
        "status" => $status,
        "actions" => $actions,

    );
}

echo json_encode($data);
