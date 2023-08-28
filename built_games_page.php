<?php
include 'connection.php';
include 'html/header.html.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or handle the unauthorized access as needed
    header("Location: login_page.php"); // Change to your login page URL
    exit();
}

$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html>

<head>
    <title>Built Games</title>
</head>

<body>
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

    <h2>Built Games</h2>
    <ul>
        <?php
        // Select built games based on the logged-in user
        $query = "SELECT * FROM built_games WHERE creator_id = '$user_id'";
        $result = mysqli_query($conn, $query);

        while ($game = mysqli_fetch_assoc($result)) {
            echo '<div class="game-details">';
            echo '<a href="game_components.php?built_game_id=' . $game['built_game_id'] . '">';

            echo '<h3>Built Game ID: ' . $game['built_game_id'] . '</h3>';
            echo '<p>Name: ' . $game['name'] . '</p>';
            echo 'Description: ' . $game['description'] . '<br>';
            // ... Display other details ...
            echo 'Creator ID: ' . $game['creator_id'] . '<br>';
            echo 'Build Date: ' . $game['build_date'] . '<br>';
            echo 'Is Pending: ' . ($game['is_pending'] == 1 ? 'Yes' : 'No') . '<br>';
            echo 'Is Canceled: ' . ($game['is_canceled'] == 1 ? 'Yes' : 'No') . '<br>';
            echo 'Is Approved: ' . ($game['is_approved'] == 1 ? 'Yes' : 'No') . '<br>';
            echo 'Is Purchased: ' . ($game['is_purchased'] == 1 ? 'Yes' : 'No') . '<br>';
            echo 'Is Published: ' . ($game['is_published'] == 1 ? 'Yes' : 'No') . '<br>';
            echo 'Price: $' . $game['price'] . '<br>';

            if ($game['is_pending'] != 1 && $game['is_approved'] != 1) {
                echo '<form method="post" action="process_get_approved.php">';
                echo '<input type="hidden" name="built_game_id" value="' . $game['built_game_id'] . '">';
                echo '<input type="hidden" name="game_id" value="' . $game['game_id'] . '">';
                echo '<input type="hidden" name="name" value="' . $game['name'] . '">';
                echo '<input type="hidden" name="description" value="' . $game['description'] . '">';
                echo '<input type="hidden" name="creator_id" value="' . $game['creator_id'] . '">';
                echo '<input type="hidden" name="build_date" value="' . $game['build_date'] . '">';
                echo '<input type="hidden" name="is_pending" value="' . $game['is_pending'] . '">';
                echo '<input type="hidden" name="is_canceled" value="' . $game['is_canceled'] . '">';
                echo '<input type="hidden" name="is_approved" value="' . $game['is_approved'] . '">';
                echo '<input type="hidden" name="is_purchased" value="' . $game['is_purchased'] . '">';
                echo '<input type="hidden" name="is_published" value="' . $game['is_published'] . '">';
                echo '<input type="hidden" name="price" value="' . $game['price'] . '">';

                echo '<button type="submit">Get Approved</button>';
                echo '</form>';
            }

            echo '</a>'; // Close the anchor tag
            echo '</div>';
        }
        ?>
    </ul>

</body>

</html>