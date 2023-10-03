<?php
include 'connection.php';
$order_id = $_POST['order_id'];

$sql = "UPDATE orders
        SET to_ship = 1, in_production = 0
        WHERE order_id = $order_id";

if ($conn->query($sql) === TRUE) {
    $response = array("status" => "success", "message" => "Order created successfully");
} else {
    $response = array("status" => "error", "message" => "Error creating order: " . $conn->error);
}
echo json_encode($response);
?>