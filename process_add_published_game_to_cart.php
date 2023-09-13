<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if (isset($_GET['published_game_id'])) {
    $published_game_id = $_GET['published_game_id'];
}

$getPrice = "SELECT marketplace_price FROM published_built_games WHERE published_game_id = $published_game_id";
$sqlGetPrice = $conn->query($getPrice);

while ($fetchedPrice = $sqlGetPrice->fetch_assoc()) {
    $price = $fetchedPrice['marketplace_price'];
}

$quantity = 1;

$sql = "INSERT INTO cart (user_id, published_game_id, quantity, price) VALUES ($user_id, $published_game_id, $quantity, $price)";
mysqli_query($conn, $sql);

$sqlCart = "SELECT * FROM cart WHERE user_id = $user_id";
$resultCart = $conn->query($sqlCart);

$count = 0;

while ($fetchedCart = $resultCart->fetch_assoc()) {
    $cart_id = $fetchedCart['cart_id'];
    $count++;
}

$newcount = $count;

echo $newcount;