<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_game'])) {
    $user_id = $_POST['user_id'];
    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
    $game_price = $_POST['game_price'];

    // Get the current date and time
    $purchase_date = date("Y-m-d H:i:s");
    $is_published = 0; // Set is_published to 0

    // Insert the purchase details into the purchased_games table
    $insert_query = "INSERT INTO purchased_games (purchase_id, user_id, game_id, purchase_date, is_published, price) VALUES (NULL, '$user_id', '$game_id', '$purchase_date', '$is_published', '$game_price')";
    
    if (mysqli_query($conn, $insert_query)) {
        // Update the is_published value in the games table
        $update_query = "UPDATE games SET is_purchased = 1 WHERE game_id = '$game_id'";
        mysqli_query($conn, $update_query);

        echo "Purchase successful!<br>";
        echo "User ID: $user_id<br>";
        echo "Game ID: $game_id<br>";
        echo "Game Name: $game_name<br>";
        echo "Game Price: $game_price<br>";
    } else {
        echo "Error adding purchase: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
