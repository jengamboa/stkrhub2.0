<?php
include "connection.php"; // Include your database connection script

$user_id = $_GET['user_id'];

$sqlGames = "SELECT * FROM games WHERE user_id = $user_id AND is_visible = 1 ORDER BY created_at DESC";
$resultGames = $conn->query($sqlGames);

$data = array();

while ($fetchedGames = $resultGames->fetch_assoc()) {
    $game_id  = $fetchedGames['game_id'];
    $name  = $fetchedGames['name'];
    $description  = $fetchedGames['description'];

    $created_at = $fetchedGames['created_at'];
    $dateTime = new DateTime($created_at);
    $formattedDateTime = $dateTime->format('M. d, Y h:i A');

    $date = $dateTime->format('M. d, Y');
    $time = $dateTime->format('h:i A');

    $date_modified = $fetchedGames['date_modified'];
    $timestamp = strtotime($date_modified);
    $dateFormatted = date("M. d, Y", $timestamp);
    $timeFormatted = date("h:i a", $timestamp);

    $date_modified_value = $dateFormatted . '<br>' . $timeFormatted;

    $is_pending = $fetchedGames['is_pending'];
    $is_purchased = $fetchedGames['is_purchased'];
    $to_approve = $fetchedGames['to_approve'];
    $is_denied = $fetchedGames['is_denied'];
    $is_approved = $fetchedGames['is_approved'];



    $game_link = '
    
        <a href="game_dashboard.php?game_id=' . $game_id . '" style="color: #26d3e0;">
            <p class="d-inline-block text-truncate" style="max-width: 190px;" data-toggle="tooltip" title="' . $name . '" >
                ' . $name . '
            </p>
        </a>
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

    $formatted_date = $date . '<br>' . $time;



    $sqlReason = "SELECT * FROM denied_approve_game_requests WHERE game_id = $game_id";
    $queryReason = $conn->query($sqlReason);
    while ($fetchedReason = $queryReason->fetch_assoc()) {

        $denied_approve_game_request_id = $fetchedReason['denied_approve_game_request_id'];
        $reason = $fetchedReason['reason'];

        if ($fetchedReason['file_path'] === null) {
            $file_path = 'null';
        } else {
            $file_path = $fetchedReason['file_path'];
        }
    }


    if ($is_pending) {
        $status = 'Your Ticket is in the Cart, please purchase it for the admin to proceed';
        $status_icon = '<i class="fa-regular fa-circle-dot" style="color: #3dc1e1"></i>';
    } elseif ($is_purchased) {
        $status = 'You already Purchased. Wait for the Admin\'s Response';
        $status_icon = '<i class="fa-regular fa-circle-dot" style="color: #f7f799"></i>';
    } elseif ($to_approve) {
        $status = 'Admin is ready to review your game. Wait for the Admin\'s Response';
        $status_icon = '<i class="fa-regular fa-circle-dot" style="color: orange"></i>';
    } elseif ($is_approved) {
        $status = 'Approved';
        $status_icon = '<i class="fa-regular fa-circle-dot" style="color: #90ee90"></i>';
    } elseif ($is_denied) {
        $status = '
        Denied
        ';
        $status_icon = '<i class="fa-regular fa-circle-dot" style="color: #dc3545"></i>';
    } else {
        $status = 'Get Approve this Game so that you can proceed.';
        $status_icon = '<i class="fa-regular fa-circle-dot"></i>';
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

    if ($total_price == '0') {
        $extra_action = '
        <button class="approve-game" 
        data-gameid="' . $game_id . '" 
        data-total_price="' . $total_price . '" 
        data-ticket_price="' . $ticket_price . '" 
        data-name="' . htmlspecialchars($name) . '" 
        data-description="' . htmlspecialchars($description) . '"
        disabled
        style="font-size:px";

        data-toggle="tooltip" title="You can not request to approve a game if it is empty"
        >
            <i class="fa-solid fa-ticket"></i> Get Approved
        </button>

        <p class="small text-muted" style="padding: 0px; margin:0px">game ID: ' . $game_id . '</p>
        ';
    } elseif ($is_pending) {
        $extra_action = '
        <button class="approve-game" 
        data-gameid="' . $game_id . '" 
        data-total_price="' . $total_price . '" 
        data-ticket_price="' . $ticket_price . '" 
        data-name="' . htmlspecialchars($name) . '" 
        data-description="' . htmlspecialchars($description) . '"
        disabled

        style="margin: 5px;"

        data-toggle="tooltip" title="Please purhase your ticket at cart so that the admin can now proceed reviewing your game"
        >
            <i class="fa-solid fa-ticket"></i> Get Approved
        </button>

        <button class="cancel-ticket" 
        data-gameid="' . $game_id . '" 
        data-total_price="' . $total_price . '" 
        data-ticket_price="' . $ticket_price . '" 
        data-name="' . htmlspecialchars($name) . '" 
        data-description="' . htmlspecialchars($description) . '"

        style="margin: 5px;"

        data-toggle="tooltip" title="Please purhase your ticket at cart so that the admin can now proceed reviewing your game"
        >
            <i class="fa-solid fa-ban"></i> Cancel Ticket
        </button>

        <p class="small text-muted" style="padding: 0px; margin:0px">game ID: ' . $game_id . '</p>
        ';
    } elseif ($is_purchased) {
        $extra_action = '
        <button class="approve-game" 
        data-gameid="' . $game_id . '" 
        data-total_price="' . $total_price . '" 
        data-ticket_price="' . $ticket_price . '" 
        data-name="' . htmlspecialchars($name) . '" 
        data-description="' . htmlspecialchars($description) . '"
        disabled

        style="margin: 5px;"

        data-toggle="tooltip" title="Wait for the admin"
        >
            <i class="fa-solid fa-ticket"></i> Get Approved
        </button>

        <p class="small text-muted" style="padding: 0px; margin:0px">game ID: ' . $game_id . '</p>
        ';
    } elseif ($to_approve) {
        $extra_action = '
        <button class="approve-game" 
        data-gameid="' . $game_id . '" 
        data-total_price="' . $total_price . '" 
        data-ticket_price="' . $ticket_price . '" 
        data-name="' . htmlspecialchars($name) . '" 
        data-description="' . htmlspecialchars($description) . '"
        disabled

        data-toggle="tooltip" title="Admin is evaluating your created game\'s components"
        >
            <i class="fa-solid fa-ticket"></i> Get Approved
        </button>
        ';
    } elseif ($is_approved) {
        $extra_action = '
        <button class="approve-game" 
        data-gameid="' . $game_id . '" 
        data-total_price="' . $total_price . '" 
        data-ticket_price="' . $ticket_price . '" 
        data-name="' . htmlspecialchars($name) . '" 
        data-description="' . htmlspecialchars($description) . '"

        data-toggle="tooltip" title="Admin will check the game components you\'ve added as well as the assets you uploaded, if there is any plagiarism..."
        >
            <i class="fa-solid fa-ticket"></i> Get Approved Again
        </button>
        ';
    } elseif ($is_denied) {
        $extra_action = '
        <button class="approve-game" 
        data-gameid="' . $game_id . '" 
        data-total_price="' . $total_price . '" 
        data-ticket_price="' . $ticket_price . '" 
        data-name="' . htmlspecialchars($name) . '" 
        data-description="' . htmlspecialchars($description) . '"

        data-toggle="tooltip" title="Don\'t lose hope, get approved again"
        >
            <i class="fa-solid fa-ticket"></i> Get Approved Again
        </button>

        <p class="small text-muted" style="padding: 0px; margin:0px">game ID: ' . $game_id . '</p>
        ';
    } else {
        $extra_action = '
        <button class="approve-game" 
        data-gameid="' . $game_id . '" 
        data-total_price="' . $total_price . '" 
        data-ticket_price="' . $ticket_price . '" 
        data-name="' . htmlspecialchars($name) . '" 
        data-description="' . htmlspecialchars($description) . '"

        data-toggle="tooltip" title="Buy a ticket so that admin can review your game and proceed on your journey as publisher"
        >
            <i class="fa-solid fa-ticket"></i> Get Approved
        </button>

        <p class="small text-muted" style="padding: 0px; margin:0px">game ID: ' . $game_id . '</p>
        ';
    }

    $actions = '
    <button class="edit-game" data-gameid="' . $game_id . '">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <button class="delete-game" data-gameid="' . $game_id . '">
        <i class="fa-solid fa-trash"></i>
    </button>
    
    ' . $extra_action;

    $total_price_value = '<p class="text-truncate" style="color: #26d3e0; max-width: 100px;" data-toggle="tooltip" title="' . $total_price . '">&#8369;' . number_format($total_price, 2) . '</p>';

    $description_value = '<p class="text-truncate" style="max-width: 140px;" data-toggle="tooltip" title="' . $description . '">' . $description . '</p>';


    
    if ($to_approve) {
        $status_value = '
        <span class="small" 
        data-toggle="tooltip" title="' . $status . '"
        > 
        ' . $status_icon . ' ' . $status . '
        </span>
        ';
    } elseif ($is_denied) {
        $cleaned_path = str_replace("../", "", $file_path);

        $status_value = '
        <span class="small" 
        data-toggle="tooltip" title="Your request was denied"
        > 
        ' . $status_icon . ' ' . $status . '
        </span>

        
        <button class="view-reason" data-built_game_id="' . $game_id . '" data-reason="' . $reason . '" data-file_path="' . $cleaned_path . '">
            View Reason
        </button>
        ';
    } else {
        $status_value = '
        <span class="small" 
        data-toggle="tooltip" title="' . $status . '"
        > 
        ' . $status_icon . ' ' . $status . '
        </span>
        ';
    }


    $data[] = array(
        "game_link" => $game_link,
        "description" => $description,
        "total_price" => $total_price_value,
        "formatted_date" => $date_modified_value,
        "status" => $status_value,
        "actions" => $actions,
    );
}

echo json_encode($data);
