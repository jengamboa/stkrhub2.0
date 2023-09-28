<?php
include "connection.php"; // Include your database connection script

$user_id = $_GET['user_id'];

$sqlGames = "SELECT * FROM games WHERE user_id = $user_id";
$resultGames = $conn->query($sqlGames);

$data = array();

while ($fetchedGames = $resultGames->fetch_assoc()) {
    $game_id  = $fetchedGames['game_id'];
    $name  = $fetchedGames['name'];
    $description  = $fetchedGames['description'];
    $created_at  = $fetchedGames['created_at'];

    $is_pending = $fetchedGames['is_pending'];
    $to_approve = $fetchedGames['to_approve'];
    $is_denied = $fetchedGames['is_denied'];
    $is_approved = $fetchedGames['is_approved'];


    $game_link = '
        <a href="game_dashboard.php?game_id=' . $game_id . '">' . $name . '</a>
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

    $formatted_date = $created_at;



    $sqlReason = "SELECT * FROM games_reasons WHERE game_id = $game_id";
    $queryReason = $conn->query($sqlReason);
    while ($fetchedReason = $queryReason->fetch_assoc()) {

        $games_reason_id = $fetchedReason['games_reason_id'];
        $reason = $fetchedReason['reason'];

        if ($fetchedReason['file_path'] === null) {
            $file_path = 'null';
        } else {
            $file_path = $fetchedReason['file_path'];
        }
    }

    if ($is_approved) {
        $status = 'Approved';
    } elseif ($is_denied) {
        $status = '
        <button class="view-reason" data-built_game_id="' . $game_id . '" data-reason="' . $reason . '" data-file_path="' . $file_path . '">
            View Reason
        </button>
        ';
    } elseif ($to_approve) {
        $status = 'Wait for the Admin\'s Response';
    } elseif ($is_pending) {
        $status = '';
    } else {
        $status = '';
    }





    // SQL query to retrieve added components and their prices for a specific game
    $sqlComponents = "SELECT 
    agc.added_component_id,
    agc.quantity,
    gc.price
    FROM added_game_components AS agc
    INNER JOIN game_components AS gc ON agc.component_id = gc.component_id
    WHERE agc.game_id = $game_id";

    $resultComponents = $conn->query($sqlComponents);

    $totalPrice = 0;

    while ($fetchedComponents = $resultComponents->fetch_assoc()) {
        $quantity = $fetchedComponents['quantity'];
        $price = $fetchedComponents['price'];

        // Calculate the total price for this added component
        $componentTotalPrice = $quantity * $price;

        // Add the component's total price to the game's total price
        $totalPrice += $componentTotalPrice;
    }



    $ticket_price = '';
    $sqlTicket = "SELECT * FROM constants WHERE constant_id = 2";
    $resultTicket = $conn->query($sqlTicket);
    while ($fetchedTicket = $resultTicket->fetch_assoc()) {
        $ticket_percentage = $fetchedTicket['percentage'];
    }

    $ticket_price = $totalPrice / $ticket_percentage;


    if ($is_approved) {
        $extra_acion = '
        <button class="approve-game" 
        data-gameid="' . $game_id . '" 
        data-total_price="' . $total_price . '" 
        data-ticket_price="' . $ticket_price . '" 
        data-name="' . htmlspecialchars($name) . '" 
        data-description="' . htmlspecialchars($description) . '"
        >
            <i class="fa-solid fa-puzzle-piece"></i> Get Approved Again
        </button>
        ';
    } elseif ($is_pending) {
        $extra_acion = 'Your Ticket is in the Cart, please purchase it for the admin to proceed';
    } elseif ($is_denied) {
        $extra_acion = '
        <button class="approve-game" 
        data-gameid="' . $game_id . '" 
        data-total_price="' . $total_price . '" 
        data-ticket_price="' . $ticket_price . '" 
        data-name="' . htmlspecialchars($name) . '" 
        data-description="' . htmlspecialchars($description) . '"
        >
            <i class="fa-solid fa-puzzle-piece"></i> Get Approved Again
        </button>

        
        ';
    } else {
        $extra_acion = '';
    }

    $actions = '
    <button class="edit-game" data-gameid="' . $game_id . '">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <button class="delete-game" data-gameid="' . $game_id . '">
        <i class="fa-solid fa-trash"></i>
    </button>
    
    ' . $extra_acion;



    $data[] = array(
        "game_link" => $game_link,
        "description" => $description,
        "total_price" => $total_price,
        "formatted_date" => $formatted_date,
        "status" => $status,
        "actions" => $actions,

    );
}

echo json_encode($data);
