<?php
include "connection.php";

$user_id = $_GET['user_id'];

$sqlBuiltGames = "SELECT * FROM built_games WHERE creator_id = $user_id";
$resultBuiltGames = $conn->query($sqlBuiltGames);

$data = array();

while ($fetchedBuiltGames = $resultBuiltGames->fetch_assoc()) {
    $built_game_id = $fetchedBuiltGames['built_game_id'];
    $game_id = $fetchedBuiltGames['game_id'];
    $name = $fetchedBuiltGames['name'];
    $description = $fetchedBuiltGames['description'];
    $build_date = $fetchedBuiltGames['build_date'];
    $is_pending = $fetchedBuiltGames['is_pending'];
    $is_canceled = $fetchedBuiltGames['is_canceled'];
    $is_approved = $fetchedBuiltGames['is_approved'];
    $is_purchased = $fetchedBuiltGames['is_purchased'];
    $is_published = $fetchedBuiltGames['is_published'];
    $price = $fetchedBuiltGames['price'];

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
        $status_value = 'PENDING';
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


    $actions = '';

    if ($is_pending == 1) {
        $actions .= '
            
        ';
    } elseif ($is_pending == 0){
        $actions .= '
            <button class="approve-built_game" data-built_game_id="' . $built_game_id . '" data-name="' . $name . '">
                Get Approved
            </button>
        ';
    }

    $actions .= '
        <button class="edit-built_game" data-built_game_id="' . $built_game_id . '">
            <i class="fa-solid fa-pen-to-square"></i>
        </button>
    
        <button class="delete-built_game" data-built_game_id="' . $built_game_id . '">
            <i class="fa-solid fa-trash"></i>
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
