<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['built_game_id'])) {
    $built_game_id = $_POST['built_game_id'];
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';
    $game_id = isset($_POST['game_id']) ? $_POST['game_id'] : ''; // Added
    $game_name = isset($_POST['game_name']) ? $_POST['game_name'] : ''; // Added
    $price = isset($_POST['price']) ? $_POST['price'] : ''; // Added

    // You can include your header or any necessary files here

    echo '<h2>Edit Game Page</h2>';
    echo '<p>Built Game ID: ' . $built_game_id . '</p>';
    echo '<p>User ID: ' . $user_id . '</p>';
    echo '<p>Game ID: ' . $game_id . '</p>';
    echo '<p>game_name: ' . $game_name . '</p>';
    echo '<p>price: ' . $price . '</p>';

    // Display the form for editing
    echo '<form method="post" action="process_publish_built_game.php">';
    echo '<input type="hidden" name="built_game_id" value="' . $built_game_id . '">';
    echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
    echo '<input type="hidden" name="game_id" value="' . $game_id . '">'; // Passed
    echo '<input type="hidden" name="game_name" value="' . $game_name . '">'; // Passed
    echo '<input type="hidden" name="price" value="' . $price . '">'; // Passed
    
    // Pass the user ID in a hidden field
    echo '<label for="game_name">Complete Game Name:</label><br>';
    echo '<input type="text" id="game_name" name="game_name"><br>';
    echo '<label for="edition">Edition:</label><br>';
    echo '<input type="text" id="edition" name="edition"><br>';

    echo '<button type="submit" name="update">Update Game</button>';
    echo '</form>';

    // You can include your footer or any necessary files here
} else {
    echo '<p>No built game ID was provided.</p>';
}
?>