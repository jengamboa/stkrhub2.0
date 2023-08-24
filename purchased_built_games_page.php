<?php
include 'connection.php';
include 'html/header.html.php';

echo '<div>';
echo '<a href="create_game.php">Create Game</a>';
echo '<a href="created_games_page.php">Created Games</a>';
echo '<a href="built_games_page.php">Built Games</a>';
echo '<a href="pending_built_games_page.php">Pending</a>';
echo '<a href="canceled_built_games_page.php">Canceled</a>';
echo '<a href="approved_built_games_page.php">Approved</a>';
echo '<a href="purchased_built_games_page.php">Purchased</a>';
echo '<a href="published_built_games_page.php">Published</a>';
echo '</div>';

$query = "SELECT * FROM built_games WHERE is_purchased = 1";
$result = mysqli_query($conn, $query);

echo '<h2>Purchased Built Games</h2>';
echo '<ul>';
while ($game = mysqli_fetch_assoc($result)) {
    echo '<li>';
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

    if ($game['is_published'] == 0) {
<<<<<<< HEAD
        echo '<a href="dump_html.php?built_game_id=' . $game['built_game_id'] . '">Publish</a>';
        // echo '<a href="edit_game_page.php?built_game_id=' . $game['built_game_id'] . '">Publish</a>';
=======
        // echo '<a href="dump_html.php?built_game_id=' . $game['built_game_id'] . '">Publish</a>';
        // echo '<a href="edit_game_page.php?built_game_id=' . $game['built_game_id'] . '">Publish</a>';
        echo '<a href="dump_html.php?built_game_id=' . $game['built_game_id'] . '">Publish</a>';
>>>>>>> bf1c23e601a3ea6e431c94a3a71dc2f602e44277
    } else {
        echo 'Already Published';
    }

    echo '</li>';
}
echo '</ul>';
?>