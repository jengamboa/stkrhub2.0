<?php
include "connection.php";

// Query to find game pieces
$sql = "SELECT * FROM orders WHERE is_pending = 1 ORDER BY order_date DESC";
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
    // $payment_id = $row['payment_id'];
    $paypal_transaction_id = $row['paypal_transaction_id'];
    $payer_id = $row['payer_id'];

    // TODO:TODO:TODO:TODO:TODO:TODO:TODO:
    $id = $order_id;


    // TODO:TODO:TODO:TODO:TODO:TODO:TODO:
    if ($ticket_id) {
        $classification = 'Ticket';
    } elseif ($published_game_id) {
        $classification = 'Published Game';
    } elseif ($built_game_id) {
        $classification = 'Built Game';
    } elseif ($added_component_id) {
        $classification = 'Game Component';
    } else {
        $classification = 'Undefined';
    }


    // TODO:TODO:TODO:TODO:TODO:TODO:TODO:
    if ($ticket_id) {
        $sqlGetGame = "SELECT * from cart WHERE cart_id = $cart_id";
        $resultGame = $conn->query($sqlGetGame);
        $rowGame = $resultGame->fetch_assoc();
        $game_id = $rowGame['game_id'];

        $sqlGetGame2 = "SELECT * from games WHERE game_id = $game_id";
        $resultGame2 = $conn->query($sqlGetGame2);
        $rowGame2 = $resultGame2->fetch_assoc();
        $name = $rowGame2['name'];
        $description = $rowGame2['description'];

        $title = '
        Ticket from Game <br>
        game name: ' . $name . ' <br>
        game ID: ' . $game_id . '
        ';
    } elseif ($published_game_id) {
        $sqlGetGame = "SELECT * from cart WHERE cart_id = $cart_id";
        $resultGame = $conn->query($sqlGetGame);
        $rowGame = $resultGame->fetch_assoc();
        $published_game_id = $rowGame['published_game_id'];

        $sqlGetGame2 = "SELECT * from published_built_games WHERE published_game_id = $published_game_id";
        $resultGame2 = $conn->query($sqlGetGame2);
        $rowGame2 = $resultGame2->fetch_assoc();
        $game_name = $rowGame2['game_name'];

        $title = '
        Published Game Name: ' . $game_name . ' <br>
        published game id: ' . $published_game_id . '
        ';
    } elseif ($built_game_id) {
        $sqlGetGame = "SELECT * from cart WHERE cart_id = $cart_id";
        $resultGame = $conn->query($sqlGetGame);
        $rowGame = $resultGame->fetch_assoc();
        $built_game_id = $rowGame['built_game_id'];

        $sqlGetGame2 = "SELECT * from built_games WHERE built_game_id = $built_game_id";
        $resultGame2 = $conn->query($sqlGetGame2);
        $rowGame2 = $resultGame2->fetch_assoc();
        $name = $rowGame2['name'];

        $title = '
        Built Game Name: ' . $name . ' <br>
        built game id: ' . $built_game_id . '
        ';
    } elseif ($added_component_id) {
        $sqlGetGame = "SELECT * from cart WHERE cart_id = $cart_id";
        $resultGame = $conn->query($sqlGetGame);
        $rowGame = $resultGame->fetch_assoc();
        $added_component_id = $rowGame['added_component_id'];

        $sqlGetGame2 = "SELECT * from added_game_components WHERE added_component_id = $added_component_id";
        $resultGame2 = $conn->query($sqlGetGame2);
        $rowGame2 = $resultGame2->fetch_assoc();
        $component_id = $rowGame2['component_id'];
        $is_custom_design = $rowGame2['is_custom_design'];

        $sqlGetGame3 = "SELECT * from game_components WHERE component_id = $component_id";
        $resultGame3 = $conn->query($sqlGetGame3);
        $rowGame3 = $resultGame3->fetch_assoc();
        $component_name = $rowGame3['component_name'];


        if ($is_custom_design) {
            $title = '
                Built Game Name: ' . $component_name . ' <br>
                built game id: ' . $added_component_id . '<br>
                Custom Design: Yes
            ';
        } else {
            $title = '
                Built Game Name: ' . $component_name . ' <br>
                built game id: ' . $added_component_id . '<br>
                Custom Design: No
            ';
        }
    } else {
        $title = 'Undefined';
    }


    // TODO:TODO:TODO:TODO:TODO:TODO:TODO:
    // $price = $price;


    // TODO:TODO:TODO:TODO:TODO:TODO:TODO:
    $user = $user_id;


    // TODO:TODO:TODO:TODO:TODO:TODO:TODO:
    $date = $formatted_order_date;


    // TODO:TODO:TODO:TODO:TODO:TODO:TODO:
    $actions = '
    <button type="button" class="btn btn-primary" id="proceed_order" data-order_id="'.$order_id.'">Proceed</button>
    ';

    $data[] = array(
        "id" => $id,
        "classification" => $classification,
        "title" => $title,
        "price" => $price,
        "user" => $user,
        "date" => $date,
        "actions" => $actions,
    );
}

echo json_encode($data);
