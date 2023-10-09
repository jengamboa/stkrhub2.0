<?php
include "connection.php";

// Query to find game pieces
$sql = "SELECT * FROM games WHERE to_approve = 1";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $game_id = $row['game_id'];
    $name = $row['name'];
    $description = $row['description'];
    $user_id = $row['user_id'];
    $created_at = $row['created_at'];
    $date_modified = $row['date_modified'];
    $is_built = $row['is_built'];
    $is_pending = $row['is_pending'];
    $is_pending = $row['is_pending'];
    $to_approve = $row['to_approve'];
    $is_denied = $row['is_denied'];
    $is_approved = $row['is_approved'];
    $is_visible = $row['is_visible'];


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
