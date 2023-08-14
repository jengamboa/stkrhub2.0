<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['built_game_id'])) {
    $built_game_id = $_POST['built_game_id'];
    $user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';

    // You can include your header or any necessary files here

    echo '<h2>Edit Game Page</h2>';
    echo '<p>Built Game ID: ' . $built_game_id . '</p>';
    echo '<p>User ID: ' . $user_id . '</p>';

    // Display the form for editing
    echo '<form method="post" action="process_publish_built_game.php">';
    echo '<input type="hidden" name="built_game_id" value="' . $built_game_id . '">';
    echo '<input type="hidden" name="user_id" value="' . $user_id . '">'; // Pass the user ID in a hidden field
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
