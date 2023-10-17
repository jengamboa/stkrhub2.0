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
    $is_purchased = $fetched['is_purchased'];
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


    // extra action and add component button
    if ($is_pending) {
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
        ';

        $add_component_button = '
        <a 
            class="btn" 
            style="color: #777; border: none; background: #1f2243; cursor: not-allowed;"
            disabled

            data-toggle="tooltip" title="You cannot update your game\'s components as of now. Please purhase your ticket at cart so that the admin can now proceed reviewing your game"
        >
            + Add Custom Game Componentasd
        </a>
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

        data-toggle="tooltip" title="Admin will evaluate your created game\'s components"
        >
            <i class="fa-solid fa-ticket"></i> Get Approved
        </button>
        ';

        $add_component_button = '
        <a 
            class="btn" 
            style="color: #777; border: none; background: #1f2243; cursor: not-allowed;"
            disabled

            data-toggle="tooltip" title="You cannot update your game\'s components as of now. Admin will evaluate your created game\'s components"
        >
            + Add Custom Game Componentasd
        </a>
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

        $add_component_button = '
        <a 
            class="btn" 
            style="color: #777; border: none; background: #1f2243; cursor: not-allowed;"
            disabled

            data-toggle="tooltip" title="You cannot update your game\'s components as of now. Admin is evaluating your created game\'s components"
        >
            + Add Custom Game Componentasd
        </a>
        ';
    } else if ($is_approved) {
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

        $add_component_button = '
        <a href="add_custom_component.php?game_id=' . $game_id . '" class="btn" style="color: white; border: none; background: #1f2243">+ Add Custom Game Component</a>
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
        ';

        $add_component_button = '
        <a href="add_custom_component.php?game_id=' . $game_id . '" class="btn" style="color: white; border: none; background: #1f2243">+ Add Custom Game Component</a>
        ';
    } elseif ($total_price == '0') {
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
        ';

        $add_component_button = '
        <a href="add_custom_component.php?game_id=' . $game_id . '" class="btn" style="color: white; border: none; background: #1f2243">+ Add Custom Game Component</a>
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
        ';

        $add_component_button = '
        <a href="add_custom_component.php?game_id=' . $game_id . '" class="btn" style="color: white; border: none; background: #1f2243">+ Add Custom Game Component</a>
        ';
    }





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
                    <h6>Description: 
                        <span class="d-block text-truncate" style="max-width: 500px" title="' . $description . '">ajsdjahdasdasdhadsahdjwkhajwdhabjsdjahwdamnwdvajkwdhjahwdajwdvajhwdajkdhwjahdwjahwdjkahwd</span>
                    </h6>
                </div>

                <div class="row">
                    <h6>Total Price: <span>&#8369;' . number_format($total_price, 2) . '</span></h6>
                </div>


                <div class="row">

                    <button class="edit-game" data-game_id="' . $game_id . '">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </button>

                    <button class="delete-game" data-game_id="' . $game_id . '">
                        <i class="fa-solid fa-trash"></i> Delete
                    </button>

                    ' . $extra_action . '

                </div>

                <br>
                <div class="row">

                    ' . $add_component_button . '
                </div>

            </div>

        </div>
        </div>
    ';


    $json[] = array(
        "item" => $item,
    );
}
echo json_encode($json);
