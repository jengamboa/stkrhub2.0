<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $published_game_id = $_POST['published_game_id'];
    $quantity = $_POST['quantity'];
    $marketplace_price = $_POST['marketplace_price'];

    echo $user_id . "<br>";
    echo $published_game_id . "<br>";
    echo $quantity . "<br>";
    echo $marketplace_price . "<br>";

    $sql = "INSERT INTO cart (user_id, published_game_id, quantity, price) VALUES ($user_id, $published_game_id, $quantity, $marketplace_price)";
    
    if (mysqli_query($conn, $sql)) {
        echo "insert successfully";
    } else {
        echo "insert failed";
    }
}

header("Location: cart_page.php");