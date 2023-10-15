<?php
include 'connection.php';
$order_id = $_POST['order_id'];
$textValue = $_POST["text"];
$selectValue = $_POST["select"];

$response = array();

// Update the 'to_deliver' and 'to_ship' columns
$sql = "UPDATE orders
        SET to_deliver = 1, to_ship = 0
        WHERE order_id = $order_id";

if ($conn->query($sql) === TRUE) {
    // Insert data into the 'to_deliver' table
    $sql2 = "INSERT INTO to_deliver (order_id, tracking_number, courier)
             VALUES ($order_id, '$textValue', '$selectValue')";

    if ($conn->query($sql2) === TRUE) {
        $response = array("status" => "success", "message" => "Order created successfully");
    } 
} else {
    $response = array("status" => "error", "message" => "Error creating order: " . $conn->error);
}

echo json_encode($response);
?>
