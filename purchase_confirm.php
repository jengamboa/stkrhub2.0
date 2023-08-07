<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_game'])) {
    $user_id = $_POST['user_id'];
    $game_id = $_POST['game_id'];

    // Get the current date and time
    $purchase_date = date("Y-m-d H:i:s");

    // Insert the purchase details into the purchased_games table
    $insert_query = "INSERT INTO purchased_games (user_id, game_id, purchase_date) VALUES ('$user_id', '$game_id', '$purchase_date')";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        // Purchase successfully added, you can redirect or display a success message
        echo "Purchase successful!";
    } else {
        // Handle the error if the insert fails
        echo "Error adding purchase: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
