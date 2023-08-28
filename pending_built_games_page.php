<?php
include 'connection.php';
include 'html/header.html.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or handle the unauthorized access as needed
    header("Location: login_page.php"); // Change to your login page URL
    exit();
}

$user_id = $_SESSION['user_id'];

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
// Retrieve pending built games for the logged-in user
$query_pending_games = "SELECT * FROM built_games WHERE creator_id = '$user_id' AND is_pending = 1";
$result_pending_games = mysqli_query($conn, $query_pending_games);
?>

<div class="panel">
    <h2>Pending Built Games</h2>
    <ul>
        <?php
        while ($game = mysqli_fetch_assoc($result_pending_games)) {
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

            echo '</li>';
        }
        ?>
    </ul>
</div>
