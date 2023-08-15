<?php
// Include your header and other necessary files

include 'connection.php'; // Make sure to include your database connection\
include 'html/header.html.php'; // Make sure to include your database connection\

echo '<h2>Marketplace</h2>';

$query = "SELECT * FROM published_built_games";
$result = mysqli_query($conn, $query);

echo '<ul>';
while ($game = mysqli_fetch_assoc($result)) {
    echo '<li>';
    echo '<h3><a href="built_game_page.php?built_game_id=' . $game['built_game_id'] . '">' . $game['game_name'] . '</a></h3>';
    echo 'published_id ID: ' . $game['published_id'] . '<br>';
    echo 'Built Game ID: ' . $game['built_game_id'] . '<br>';
    echo 'Edition: ' . $game['edition'] . '<br>';
    echo 'Publish Date: ' . $game['publish_date'] . '<br>';
    echo 'Creator ID: ' . $game['user_id'] . '<br>';
    echo 'Price: ' . $game['price'] . '<br>';

    // Add a "Add to Cart" button for each game
    echo '<form method="post" action="process_add_game_to_cart.php">';
    echo '<input type="hidden" name="built_game_id" value="' . $game['built_game_id'] . '">';
    echo '<input type="hidden" name="user_id" value="' . $game['user_id'] . '">';
    echo '<input type="hidden" name="game_id" value="' . $game['game_id'] . '">';
    echo '<input type="hidden" name="game_name" value="' . $game['game_name'] . '">';
    echo '<input type="hidden" name="price" value="' . $game['price'] . '">';
    echo '<button type="submit" name="add_to_cart">Add to Cart</button>'; // Change name attribute here
    echo '</form>';

    echo '</li>';
}
echo '</ul>';

// Include your footer and other necessary files
?>