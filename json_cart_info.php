<?php
include "connection.php";
$json = array();

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM cart WHERE user_id = $user_id AND is_active = 1";
$result = $conn->query($sql);

$sub_total = 0; // Move the subtotal calculation outside the loop

while ($fetched = $result->fetch_assoc()) {
    $cart_id = $fetched['cart_id'];
    $published_game_id = $fetched['published_game_id'];
    $built_game_id = $fetched['built_game_id'];
    $added_component_id = $fetched['added_component_id'];
    $quantity = $fetched['quantity'];
    $price = $fetched['price'];
    $is_active = $fetched['is_active'];

    // Calculate the subtotal for each item and accumulate it
    $sub_total += $price * $quantity;
}

$sub_total = '<h6>' . $sub_total . '</h6>';


$json[] = array(
    "item" => $sub_total,
);

echo json_encode($json);
