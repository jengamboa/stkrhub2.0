<?php
include 'connection.php';
include 'html/header.html.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or handle the unauthorized access as needed
    header("Location: login_page.php"); // Change to your login page URL
    exit();
}

?>

<div>
    <a href="create_game.php">Create Game</a>
    <a href="created_games_page.php">Created Games</a>
    <a href="built_games_page.php">Built Games</a>
    <a href="pending_built_games_page.php">Pending</a>
    <a href="canceled_built_games_page.php">Canceled</a>
    <a href="approved_built_games_page.php">Approved</a>
    <a href="purchased_built_games_page.php">Purchased</a>
    <a href="published_built_games_page.php">Published</a>
</div>

<?php
// Retrieve canceled built games
$query_canceled_games = "SELECT * FROM built_games WHERE is_canceled = 1";
$result_canceled_games = mysqli_query($conn, $query_canceled_games);
?>

<div class="panel">
    <h2>Canceled Built Games</h2>
    <ul>
        <?php
        while ($game = mysqli_fetch_assoc($result_canceled_games)) {
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

            echo '<form method="post" action="review_built_games_page.php">';
            echo '<input type="hidden" name="built_game_id" value="' . $game['built_game_id'] . '">';
            echo '<button type="submit">View Here</button>';
            echo '</form>';

            echo '</li>';
        }
        ?>
    </ul>
</div>