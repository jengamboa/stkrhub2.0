<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_publish'])) {
    $user_id = $_POST['user_id'];
    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
    $complete_game_name = $_POST['complete_game_name'];
    $edition = $_POST['edition'];
    $marketplace_price = $_POST['marketplace_price'];
    $purchase_id = $_POST['purchase_id']; // Retrieve the purchase_id from the form

    echo "User ID: " . $user_id . "<br>";
    echo "Game ID: " . $game_id . "<br>";
    echo "Game Name: " . $game_name . "<br>";
    echo "Complete Game Name: " . $complete_game_name . "<br>";
    echo "Edition: " . $edition . "<br>";
    echo "Marketplace Price: $" . $marketplace_price . "<br>";

    echo "Purchase ID: " . $purchase_id . "<br>";


    // Insert the published game into the published_games table
    $insert_query = "INSERT INTO published_games (user_id, game_id, purchase_id, complete_game_name, edition, marketplace_price, publish_date)
                     VALUES ('$user_id', '$game_id', '$purchase_id', '$complete_game_name', '$edition', '$marketplace_price', NOW())";


    if (mysqli_query($conn, $insert_query)) {
        echo "Game published successfully!";
        // You can redirect the user to a success page or perform any other actions here.
    } else {
        echo "Error publishing game: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
