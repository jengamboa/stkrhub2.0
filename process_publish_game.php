<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_publish'])) {
    $user_id = $_POST['user_id'];
    $game_id = $_POST['game_id'];
    $purchase_id = $_POST['purchase_id']; // Retrieve the purchase_id from the form

    // Check if the game is already published for the given purchase_id
    $check_published_query = "SELECT * FROM purchased_games WHERE purchase_id = '$purchase_id' AND is_published = 1";
    $check_published_result = mysqli_query($conn, $check_published_query);

    if (mysqli_num_rows($check_published_result) > 0) {
        echo "Game is already published for this purchase.";
    } else {
        // Update the is_published status to 1 for the specific purchase_id
        $update_published_query = "UPDATE purchased_games SET is_published = 1 WHERE user_id = '$user_id' AND game_id = '$game_id' AND purchase_id = '$purchase_id'";
        
        if (mysqli_query($conn, $update_published_query)) {
            echo "Game published successfully!";
            // Insert the published game into the published_games table
            $complete_game_name = $_POST['complete_game_name'];
            $edition = $_POST['edition'];
            $marketplace_price = $_POST['marketplace_price'];
            $publish_date = date("Y-m-d H:i:s");
            $insert_published_query = "INSERT INTO published_games (user_id, game_id, purchase_id, complete_game_name, edition, marketplace_price, publish_date) VALUES ('$user_id', '$game_id', '$purchase_id', '$complete_game_name', '$edition', '$marketplace_price', '$publish_date')";

            if (mysqli_query($conn, $insert_published_query)) {
                echo " Published game inserted successfully!";
                // You can redirect the user to a success page or perform any other actions here.
            } else {
                echo "Error inserting published game: " . mysqli_error($conn);
            }
        } else {
            echo "Error updating is_published status: " . mysqli_error($conn);
        }
    }
} else {
    echo "Invalid request";
}
?>
