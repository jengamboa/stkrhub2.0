<?php
include "connection.php";

$user_id = $_GET['user_id'];

$sqlPendingBuiltGames = "SELECT * FROM built_games WHERE creator_id = $user_id AND is_pending = 1";
$resultPendingBuiltGames = $conn->query($sqlPendingBuiltGames);

$data = array();

while ($fetchedPendingBuiltGames = $resultPendingBuiltGames->fetch_assoc()) {
    $built_game_id = $fetchedPendingBuiltGames['built_game_id'];
    $game_id = $fetchedPendingBuiltGames['game_id'];
    $name = $fetchedPendingBuiltGames['name'];
    $description = $fetchedPendingBuiltGames['description'];
    $build_date = $fetchedPendingBuiltGames['build_date'];
    $is_pending = $fetchedPendingBuiltGames['is_pending'];
    $is_canceled = $fetchedPendingBuiltGames['is_canceled'];
    $is_approved = $fetchedPendingBuiltGames['is_approved'];
    $is_purchased = $fetchedPendingBuiltGames['is_purchased'];
    $is_published = $fetchedPendingBuiltGames['is_published'];
    $price = $fetchedPendingBuiltGames['price'];

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
    <button class="cancel-built_game"
    data-built_game_id="' . $built_game_id . '"
    data-name="' . $name . '"
    >
        <i class="fa-solid fa-ban"></i>
    </button>
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
