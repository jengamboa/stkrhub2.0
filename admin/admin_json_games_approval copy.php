<?php
include "connection.php";

// Query to find game pieces
$sql = "SELECT * FROM orders WHERE is_received = 1 AND ticket_id IS NOT NULL";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $order_id = $row['order_id'];
    $cart_id = $row['cart_id'];
    $user_id = $row['user_id'];
    $published_game_id = $row['published_game_id'];
    $built_game_id = $row['built_game_id'];
    $added_component_id = $row['added_component_id'];
    $ticket_id = $row['ticket_id'];
    $price = $row['price'];
    $is_pending = $row['is_pending'];
    $in_production = $row['in_production'];
    $to_deliver = $row['to_deliver'];
    $is_received = $row['is_received'];
    $is_canceled = $row['is_canceled'];
    $is_completely_canceled = $row['is_completely_canceled'];

    $order_date = $row['order_date'];
    $order_datetime = new DateTime($order_date);
    $formatted_order_date = $order_datetime->format('M. d, Y g:ia');

    $total_payment = $row['total_payment'];
    $payment_id = $row['payment_id'];
    $paypal_transaction_id = $row['paypal_transaction_id'];
    $payer_id = $row['payer_id'];


    // get game info
    $sqlGetGame = "SELECT * from cart WHERE cart_id = $cart_id";
    $resultGame = $conn->query($sqlGetGame);
    $rowGame = $resultGame->fetch_assoc();
    $game_id = $rowGame['game_id'];

    $sqlGetGame2 = "SELECT * from games WHERE game_id = $game_id";
    $resultGame2 = $conn->query($sqlGetGame2);
    $rowGame2 = $resultGame2->fetch_assoc();
    $name = $rowGame2['name'];
    $description = $rowGame2['description'];

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

    $action_value = '
    <a href="admin_game_dashboard.php?creator_id='.$user_id.'&game_id='.$game_id.'">View</a>
    ';



    $id = $game_id;
    $title = $name;
    $price = $total_price;
    $user = $user_id;
    $actions = $action_value;

    $data[] = array(
        "id" => $id,
        "title" => $title,
        "price" => $price,
        "user" => $user,
        "actions" => $actions,
    );
}

echo json_encode($data);
