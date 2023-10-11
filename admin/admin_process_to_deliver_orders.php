<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unique_order_group_id = $_POST['unique_order_group_id'];
    $textValue = $_POST["text"];
    $selectValue = $_POST["select"];


    $conn->begin_transaction();

    try {

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


            if ($ticket_id) {
                // Update the orders table
                $sqlUpdateOrders = "UPDATE orders SET is_received = 1 WHERE order_id = $order_id";
                $conn->query($sqlUpdateOrders);
            } else {
                // Update the orders table
                $sqlUpdateOrders = "UPDATE orders SET to_ship = 0, to_deliver = 1 WHERE order_id = $order_id";
                $conn->query($sqlUpdateOrders);
            }
        }

        $sql2 = "INSERT INTO to_deliver (unique_order_group_id, tracking_number, courier)
             VALUES ($unique_order_group_id, '$textValue', '$selectValue')";

        if ($conn->query($sql2) === TRUE) {
            $response = array("status" => "success", "message" => "Order created successfully");
        }


        $conn->commit();

        $response = ["success" => true, "message" => "Game and related records deleted successfully"];
    } catch (mysqli_sql_exception $e) {
        $conn->rollback();

        $response = ["success" => false, "message" => "Database error: " . $e->getMessage()];
    }

    echo json_encode($response);
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}



