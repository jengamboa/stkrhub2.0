<?php
// Include your header and other necessary files

include 'connection.php'; // Make sure to include your database connection

echo '<h2>Marketplace</h2>';

$query = "SELECT * FROM published_built_games";
$result = mysqli_query($conn, $query);

echo '<ul>';
while ($game = mysqli_fetch_assoc($result)) {
    echo '<li>';
    echo 'published_id ID: ' . $game['published_id'] . '<br>';
    echo 'Built Game ID: ' . $game['built_game_id'] . '<br>';
    echo 'Game Name: ' . $game['game_name'] . '<br>';
    echo 'Edition: ' . $game['edition'] . '<br>';
    echo 'Publish Date: ' . $game['publish_date'] . '<br>';
    echo 'Creator ID: ' . $game['user_id'] . '<br>';

    // Add a "View" button for each game
    echo '<a href="built_game_page.php?built_game_id=' . $game['built_game_id'] . '">View</a>';

    echo '</li>';
}
echo '</ul>';

// Include your footer and other necessary files
?>
