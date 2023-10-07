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

    $sqlTicket = "SELECT * FROM constants WHERE constant_id = 2";
    $resultTicket = $conn->query($sqlTicket);
    while ($fetchedTicket = $resultTicket->fetch_assoc()) {
        $ticket_percentage = $fetchedTicket['percentage'];
    }

    $ticket_price = $total_price / $ticket_percentage;






    $item = '
        <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                        <h6>Game ID: <span>' . $game_id . '</span></h6>
                </div>

                <div class="row">
                    <h6>Game Name: <span>' . $name . '</span></h6>
                </div>

                <div class="row">
                    <h6>Description: <span class="text-break text-truncate" style="max-width: 570px" title="' . $description . '">' . $description . '</span></h6>
                </div>

                <div class="row">
                    <h6>Total Price: <span>' . $total_price . '</span></h6>
                </div>


                <div class="row">

                    <button class="edit-game" data-game_id="' . $game_id . '">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </button>

                    <button class="delete-game" data-game_id="' . $game_id . '">
                        <i class="fa-solid fa-trash"></i> Delete
                    </button>

                    <button class="approve-game" 
                    data-gameid="' . $game_id . '" 
                    data-total_price="' . $total_price . '" 
                    data-ticket_price="' . $ticket_price . '" 
                    data-name="' . htmlspecialchars($name) . '" 
                    data-description="' . htmlspecialchars($description) . '"
                    >
                        <i class="fa-solid fa-ticket"></i> Get Approved
                    </button>

                </div>

                <br>
                <div class="row">
                    <a href="add_custom_component.php?game_id=' . $game_id . '" class="btn" style="color: white; border: none; background: #1f2243">+ Add Custom Game Component</a>
                </div>

            </div>

        </div>
        </div>
    ';

    $total_price = 'asd';


    $json[] = array(
        "item" => $item,
    );
}
echo json_encode($json);
