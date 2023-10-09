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

    $is_pending = $fetched['is_pending'];
    $to_approve = $fetched['to_approve'];
    $is_denied = $fetched['is_denied'];
    $is_approved = $fetched['is_approved'];


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
                    <h6>Total Price: <span>&#8369;' . number_format($total_price, 2) . '</span></h6>
                </div>


                <div class="row">

                    <button class="approve-game"
                    data-game_id="' . $game_id . '"
                    data-creator_id="' . $user_id . '"
                    >
                        <i class="fa-regular fa-circle-check"></i> Approve
                    </button>

                    <button class="deny-game"
                    data-game_id="' . $game_id . '"
                    data-creator_id="' . $user_id . '"
                    >
                        <i class="fa-solid fa-ban"></i> Deny
                    </button>

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
