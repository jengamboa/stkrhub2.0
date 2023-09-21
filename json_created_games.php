<?php
include "connection.php"; // Include your database connection script

$user_id = $_GET['user_id'];

$sqlGames = "SELECT * FROM games WHERE user_id = $user_id";
$resultGames = $conn->query($sqlGames);

$data = array();

while ($fetchedGames = $resultGames->fetch_assoc()) {
    $game_id = $game_id = $fetchedGames['game_id'];

    $name = $fetchedGames['name'];
    $game_link = '
        <a href="game_dashboard.php?game_id=' . $game_id . '">' . $name . '</a>
    ';

    $description = $fetchedGames['description'];
    $created_at = $fetchedGames['created_at'];
    $formatted_date = date('F j, Y', strtotime($created_at));
    $is_built = $fetchedGames['is_built'];

    $edit = '
    <button class="edit-game" data-gameid="' . $game_id . '">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <button class="delete-game" data-gameid="' . $game_id . '">
        <i class="fa-solid fa-trash"></i>
    </button>
    ';


    // Get all game components for this game
    $sqlGameComponents = "SELECT gc.price, agc.quantity
        FROM added_game_components agc
        INNER JOIN game_components gc ON agc.component_id = gc.component_id
        WHERE agc.game_id = $game_id";

    $resultGameComponents = $conn->query($sqlGameComponents);

    $total_price = 0;

    while ($gameComponent = $resultGameComponents->fetch_assoc()) {
        $component_price = $gameComponent['price'];
        $component_quantity = $gameComponent['quantity'];
        $total_price += $component_price * $component_quantity;
    }



    $build = '
    <button class="build-game" 
            data-gameid="' . $game_id . '" 
            data-total_price="' . $total_price . '" 
            data-name="' . htmlspecialchars($name) . '" 
            data-description="' . htmlspecialchars($description) . '">
        <i class="fa-solid fa-puzzle-piece"></i> Build
    </button>
    ';


    $data[] = array(
        "game_link" => $game_link,
        "description" => $description,
        "total_price" => $total_price,
        "formatted_date" => $formatted_date,
        "build" => $build,
        "edit" => $edit,

    );
}

echo json_encode($data);
