<?php
include "connection.php";
$data = array();

// Query to find game pieces
$sqlUniqueOrderDates = "SELECT DISTINCT unique_order_group_id FROM orders";
$queryUniqueOrderDates = $conn->query($sqlUniqueOrderDates);
while ($row = $queryUniqueOrderDates->fetch_assoc()) {
    $unique_order_group_id = $row['unique_order_group_id'];

    $sqlAll = "SELECT * FROM orders WHERE unique_order_group_id = $unique_order_group_id";
    $queryAll = $conn->query($sqlAll);
    while ($fetched = $queryAll->fetch_assoc()) {
        $order_id = $fetched['order_id'];
        $published_game_id = $fetched['published_game_id'];
        $built_game_id = $fetched['built_game_id'];
        $added_component_id = $fetched['added_component_id'];
        $ticket_id = $fetched['ticket_id'];
        $quantity = $fetched['quantity'];
        $price = $fetched['price'];

        $is_pending = $fetched['is_pending'];
        $in_production = $fetched['in_production'];
        $to_deliver = $fetched['to_deliver'];
        $is_received = $fetched['is_received'];
        $is_canceled = $fetched['is_canceled'];
        $is_completely_canceled = $fetched['is_completely_canceled'];
    }

    $id = $unique_order_group_id;
    $number_of_items = 'number_of_items';
    $price = 'Total Price';
    $user = 'user';
    $date = 'date';
    $actions = 'View';

    $data[] = array(
        "id" => $id,
        "number_of_items" => $number_of_items,
        "price" => $price,
        "user" => $user,
        "date" => $date,
        "actions" => $actions,
    );
}

echo json_encode($data);
