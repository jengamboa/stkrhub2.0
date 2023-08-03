<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_id']) && isset($_POST['added_component_id'])) {
    $game_id = $_POST['game_id'];
    $added_component_id = $_POST['added_component_id'];

    // Delete the component from the "added_game_components" table
    $delete_query = "DELETE FROM added_game_components WHERE game_id = '$game_id' AND added_component_id = '$added_component_id'";

    if (mysqli_query($conn, $delete_query)) {
        echo "Component deleted successfully";
    } else {
        echo "Error deleting component: " . mysqli_error($conn);
    }
}
?>