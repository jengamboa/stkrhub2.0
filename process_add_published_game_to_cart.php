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


// Check if the item already exists in the cart
$checkCart = "SELECT cart_id, quantity FROM cart WHERE user_id = $user_id AND published_game_id = $published_game_id";
$resultCheckCart = $conn->query($checkCart);


if ($resultCheckCart->num_rows > 0) {
    $cartData = $resultCheckCart->fetch_assoc();
    $existingCartId = $cartData['cart_id'];
    $existingQuantity = $cartData['quantity'] + $quantity;

    $updateCart = "UPDATE cart SET quantity = $existingQuantity WHERE cart_id = $existingCartId";
    mysqli_query($conn, $updateCart);
} else {
    $sql = "INSERT INTO cart (user_id, published_game_id, quantity, price) VALUES ($user_id, $published_game_id, $quantity, $price)";
    mysqli_query($conn, $sql);
}