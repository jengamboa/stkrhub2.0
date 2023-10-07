<?php
include "connection.php";
$json = array();

$game_id = $_GET['game_id'];
$user_id = $_GET['user_id'];

$sql = "SELECT * FROM games WHERE game_id = $game_id";
$result = $conn->query($sql);

while ($fetched = $result->fetch_assoc()) {
    $name = $fetched['name'];
    $description = $fetched['description'];
    $created_at = $fetched['created_at'];
    $is_built = $fetched['is_built'];


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


    $item = '
        <div class="container">

            <div class="row">
                <div class="col-lg-2">
                    <h6>Game ID: </h6>
                </div>
                <div class="col-md-auto">
                    <h6>' . $game_id . '</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2">
                    <h6>Game Name: </h6>
                </div>
                <div class="col-md-auto">
                    <h6>' . $name . '</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2">
                    <h6>Description: </h6>
                </div>
                <div class="col-md-auto">
                    <h6>' . $description . '</h6>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-2">
                    <h6>Price: </h6>
                </div>
                <div class="col-md-auto">
                    <h6>' . $total_price . '</h6>
                </div>
            </div>

            <div class="row">
                <button class="edit-game" data-game_id="' . $game_id . '">
                    <i class="fa-solid fa-pen-to-square"></i>
                </button>
            
                <button class="delete-game" data-game_id="' . $game_id . '">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </div>

        </div>
    ';

    $total_price = 'asd';


    $json[] = array(
        "item" => $item,
    );
}
echo json_encode($json);
