<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if built_game_id and user_id are set in the POST request
    if (isset($_POST['built_game_id']) && isset($_POST['user_id'])) {
        $built_game_id = $_POST['built_game_id'];
        $user_id = $_POST['user_id'];

        // Echo the values of built_game_id and user_id
        echo "Built Game ID: " . $built_game_id . "<br>";
        echo "User ID: " . $user_id;
    } else {
        echo "Error: Required parameters not found.";
    }
} else {
    echo "Error: This script should be accessed via a POST request.";
}
?>
