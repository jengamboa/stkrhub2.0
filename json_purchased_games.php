<?php
include "connection.php";

$user_id = $_GET['user_id'];

$sqlCanceledBuiltGames = "SELECT * FROM built_games WHERE creator_id = $user_id AND is_purchased = 1";
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
    $is_pending_published = $fetchedCanceledBuiltGames['is_pending_published'];
    $is_request_denied = $fetchedCanceledBuiltGames['is_request_denied'];
    $is_published = $fetchedCanceledBuiltGames['is_published'];
    $price = $fetchedCanceledBuiltGames['price'];

    $sqlReason = "SELECT * FROM denied_publish_requests WHERE built_game_id = $built_game_id";
    $queryReason = $conn->query($sqlReason);
    while ($fetchedReason = $queryReason->fetch_assoc()) {
        $denied_publish_request_id = $fetchedReason['denied_publish_request_id'];
        $reason = $fetchedReason['reason'];
        $file_path = $fetchedReason['file_path'];
    }

    $built_game_link = '
        <a href="built_game_dashboard.php?built_game_id=' . $built_game_id . '">' . $name . '</a>
    ';


    $sqlGetGameName = "SELECT * FROM games WHERE game_id = $game_id";
    $queryGetGameName = $conn->query($sqlGetGameName);
    while ($fetchedGameName = $queryGetGameName->fetch_assoc()) {
        $game_name = $fetchedGameName['name'];
    }

    $from_what_game = '
        ' . $game_name . ' <br>
        <small>Game ID: ' . $game_id . '</small>
    ';

    $total_price = $price;

    $formatted_date = date('F j, Y', strtotime($build_date));


    if ($is_pending == 1) {
        $status_value = 'Wait until the admin approves this';
    } elseif ($is_request_denied == 1) {
        $status_value = '
            <p>PURCHASED</p>
            <p>Your Request Denied</p>
            <button class="view-reason" data-built_game_id="' . $built_game_id . '" data-reason="' . $reason . '" data-file_path="' . $file_path . '">
                View
            </button>
        ';
    } elseif ($is_canceled == 1) {
        $status_value = 'CANCELED';
    } elseif ($is_approved == 1) {
        $status_value = 'APPROVED';
    } elseif ($is_pending_published == 1) {
        $status_value = '
            <p>PURCHASED</p>
            <p>Reviewing publish request</p>
            <a href="pending_publish_request_page.php?built_game_id=' . $built_game_id . '">View Publish Request</a>
        ';
    } elseif ($is_purchased == 1) {
        $status_value = 'PURCHASED';
    } elseif ($is_published == 1) {
        $status_value = 'PUBLISHED';
    } else {
        $status_value = '';
    }

    $status = $status_value;





    if ($is_pending_published == 1) {
        $actions = '
            <a href="">
                Buy Again
            </a>
        ';
    } else {
        $actions = '
        <a href="">
            Buy Again
        </a>
        <a href="edit_game_page.php?built_game_id=' . $built_game_id . '">Publish</a>
        ';
    }

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
