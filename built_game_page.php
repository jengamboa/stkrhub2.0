<?php
include 'connection.php';
include 'html/header.html.php';

if (isset($_GET['built_game_id'])) {
    $built_game_id = $_GET['built_game_id'];

    $query = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
    $result = mysqli_query($conn, $query);

    if ($game = mysqli_fetch_assoc($result)) {
        echo '<h2>Built Game Details</h2>';
        echo 'Built Game ID: ' . $game['built_game_id'] . '<br>';
        echo 'Game ID: ' . $game['game_id'] . '<br>';
        echo 'Name: ' . $game['name'] . '<br>';
        echo 'Description: ' . $game['description'] . '<br>';
        echo 'Creator ID: ' . $game['creator_id'] . '<br>';
        echo 'Build Date: ' . $game['build_date'] . '<br>';
        echo 'Is Pending: ' . ($game['is_pending'] == 1 ? 'Yes' : 'No') . '<br>';
        echo 'Is Canceled: ' . ($game['is_canceled'] == 1 ? 'Yes' : 'No') . '<br>';
        echo 'Is Approved: ' . ($game['is_approved'] == 1 ? 'Yes' : 'No') . '<br>';
        echo 'Is Purchased: ' . ($game['is_purchased'] == 1 ? 'Yes' : 'No') . '<br>';
        echo 'Is Published: ' . ($game['is_published'] == 1 ? 'Yes' : 'No') . '<br>';
        echo 'Price: $' . $game['price'] . '<br>';

        // You can display more details or information about the built game here

    } else {
        echo '<p>No built game found with the provided ID.</p>';
    }
} else {
    echo '<p>No built game ID was provided.</p>';
}

?>
