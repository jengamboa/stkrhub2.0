<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy_game'])) {
    $user_id = $_POST['user_id'];
    $game_id = $_POST['game_id'];

    // Get the current date and time
    $purchase_date = date("Y-m-d H:i:s");

    // Insert the purchase details into the purchased_games table
    $insert_query = "INSERT INTO purchased_games (user_id, game_id, purchase_date, is_published) VALUES ('$user_id', '$game_id', '$purchase_date', 1)";
    $insert_result = mysqli_query($conn, $insert_query);

    if ($insert_result) {
        // Purchase successfully added, you can redirect or display a success message

        // Update the is_published of the purchased game to 0 (added to marketplace)
        $update_is_published_query = "UPDATE purchased_games SET is_published = 0 WHERE user_id = '$user_id' AND game_id = '$game_id'";
        $update_is_published_result = mysqli_query($conn, $update_is_published_query);

        if ($update_is_published_result) {
            echo "Purchase successful and game is_published updated!";
        } else {
            echo "Error updating game is_published: " . mysqli_error($conn);
        }
    } else {
        // Handle the error if the insert fails
        echo "Error adding purchase: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}
?>
