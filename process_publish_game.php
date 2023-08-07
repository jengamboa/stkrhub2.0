<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_publish'])) {
    $user_id = $_POST['user_id'];
    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
    $purchase_id = $_POST['purchase_id'];
    $complete_game_name = $_POST['complete_game_name'];
    $edition = $_POST['edition'];
    $marketplace_price = $_POST['marketplace_price'];

    // Rest of your code here...

    // Insert the published game into the published_games table
    $publish_date = date("Y-m-d H:i:s");
    $insert_published_query = "INSERT INTO published_games (user_id, game_id, purchase_id, complete_game_name, edition, marketplace_price, publish_date) VALUES ('$user_id', '$game_id', '$purchase_id', '$complete_game_name', '$edition', '$marketplace_price', '$publish_date')";

    if (mysqli_query($conn, $insert_published_query)) {
        // Mark the game as published in the purchased_games table
        $update_published_status_query = "UPDATE purchased_games SET is_published = 1 WHERE purchase_id = '$purchase_id'";
        if (mysqli_query($conn, $update_published_status_query)) {
            echo "Game published successfully!";
            // You can redirect the user to a success page or perform any other actions here.
        } else {
            echo "Error updating game status: " . mysqli_error($conn);
        }
    } else {
        echo "Error publishing game: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
