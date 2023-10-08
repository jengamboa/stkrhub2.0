<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if (isset($_GET['published_game_id'])) {
    echo $published_game_id = $_GET['published_game_id'];
}

$getPrice = "SELECT marketplace_price FROM published_built_games WHERE published_game_id = $published_game_id";
$sqlGetPrice = $conn->query($getPrice);

while ($fetchedPrice = $sqlGetPrice->fetch_assoc()) {
    $price = $fetchedPrice['marketplace_price'];
}

$quantity = 1;



$sqlCheckCart = "SELECT cart_id, user_id, is_visible, quantity FROM cart WHERE user_id = $user_id AND published_game_id = $published_game_id AND is_visible = 1";
$resultCheckCart = mysqli_query($conn, $sqlCheckCart);

if ($resultCheckCart->num_rows > 0) {
    $cartData = $resultCheckCart->fetch_assoc();
    $existingCartId = $cartData['cart_id'];

    if ($cartData['is_visible'] == 0) {
        // If is_visible is 0, update quantity
        $sql = "INSERT INTO cart (user_id, published_game_id, quantity, price) VALUES ($user_id, $published_game_id, $quantity, $price)";
        mysqli_query($conn, $sql);

        echo 'Inserting new cart entry for user ID ' . $user_id;
    } else {
        // If is_visible is not 0, insert a new row
        echo 'cart ID' . $existingCartId;

        $existingQuantity = $cartData['quantity'] + $quantity;

        $updateCart = "UPDATE cart SET quantity = $existingQuantity WHERE cart_id = $existingCartId";
        mysqli_query($conn, $updateCart);
    }
} else {
    $sql = "INSERT INTO cart (user_id, published_game_id, quantity, price) VALUES ($user_id, $published_game_id, $quantity, $price)";
    mysqli_query($conn, $sql);
}
