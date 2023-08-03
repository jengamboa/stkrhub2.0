<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_id']) && isset($_POST['added_component_id']) && isset($_POST['quantity'])) {
    $game_id = $_POST['game_id'];
    $added_component_id = $_POST['added_component_id'];
    $quantity = $_POST['quantity'];

    // Update the quantity in the "added_game_components" table
    $update_query = "UPDATE added_game_components SET quantity = '$quantity' WHERE game_id = '$game_id' AND added_component_id = '$added_component_id'";

    if (mysqli_query($conn, $update_query)) {
        echo "Quantity updated successfully";
    } else {
        echo "Error updating quantity: " . mysqli_error($conn);
    }
}
?>
