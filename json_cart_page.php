<?php
include "connection.php";

$data = array();

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM cart WHERE user_id = $user_id AND is_active = 1";
$result = $conn->query($sql);

while ($cart = $result->fetch_assoc()) {

    $cart_id = $cart['cart_id'];
    $user_id = $cart['user_id'];
    $published_game_id = $cart['published_game_id'];
    $built_game_id = $cart['built_game_id'];
    $added_component_id = $cart['added_component_id'];
    $quantity = $cart['quantity'];
    $price = $cart['price'];
    $is_active = $cart['is_active'];


    $checkbox = '
        <input type="checkbox" name="selectedItems[]" value="' . $cart_id . '">
    ';

    $item = "";
    if ($published_game_id) {
        $item = $published_game_id;
    } elseif ($built_game_id) {
        $item = $built_game_id;
    } elseif ($added_component_id){
        $item = $added_component_id;
    } else {
        $item = "N/A";
    }

    $item_price = $price;

    $item_quantity = '
        <input 
            type="hidden" 
            name="' . $cart_id . '"
            >

        <input 
            type="number" 
            class= "item-quantity"

            data-cartid="' . $cart_id . '"
            data-quantity= "' . $quantity . '"

            value="' . $quantity . '" 
        >
    ';
    
    $total_price = $price * $quantity;
    $item_total_price = $total_price;


    $data[] = array(
        "checkbox" => $checkbox,
        "item" => $item,
        "item_price" => $item_price,
        "item_quantity" => $item_quantity,
        "item_total_price" => $item_total_price,
    );

}
echo json_encode($data);
?>