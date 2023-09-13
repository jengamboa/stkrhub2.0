<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if (isset($_GET['id'])) {
    $published_game_id = $_GET['id'];
}

$getPrice = "SELECT marketplace_price FROM published_built_games WHERE published_game_id = $published_game_id";
$sqlGetPrice = $conn->query($getPrice);

while ($fetchedPrice = $sqlGetPrice->fetch_assoc()){
    $price = $fetchedPrice['marketplace_price'];
}

$quantity = 1;

echo $user_id;
echo $published_game_id;
echo $price;
echo $quantity;


$sql = "INSERT INTO cart (user_id, published_game_id, quantity, price) VALUES ($user_id, $published_game_id, $quantity, $price)";
mysqli_query($conn, $sql);