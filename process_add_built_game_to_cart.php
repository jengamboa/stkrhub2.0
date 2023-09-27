<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if (isset($_GET['built_game_id'])) {
    $built_game_id = $_GET['built_game_id'];
}

$sql = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
$query = $conn->query($sql);
while ($fetched = $query->fetch_assoc()) {
    $game_id = $fetched['game_id'];
    $name = $fetched['name'];
    $creator_id = $fetched['creator_id'];
    $price = $fetched['price'];
}


// Insert data into the cart table
$insert_query = "INSERT INTO cart (user_id, game_id, built_game_id, added_component_id, quantity, price) 
    VALUES ('$user_id', '$game_id', '$built_game_id', NULL, 1, '$price')";

if (mysqli_query($conn, $insert_query)) {
    $cart_id = mysqli_insert_id($conn);
}


$sqlCart = "SELECT * FROM cart WHERE user_id = $user_id";
$resultCart = $conn->query($sqlCart);

$count = 0;

while ($fetchedCart = $resultCart->fetch_assoc()) {
    $cart_id = $fetchedCart['cart_id'];
    $count++;
}

$newcount = $count;

echo $newcount;