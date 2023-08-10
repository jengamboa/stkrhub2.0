<?php
// show_games.php
include 'connection.php';
include 'html/header.html.php';

// Check if the user is logged in. If not, redirect to the login page.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Define the calculateTotalPrice() function
function calculateTotalPrice($game_id)
{
    global $conn;

    $total_price = 0;

    // Retrieve the added game components for this game from the "added_game_components" table
    $query_components = "SELECT gc.price FROM added_game_components agc
                        INNER JOIN game_components gc ON agc.component_id = gc.component_id
                        WHERE agc.game_id = '$game_id'";
    $result_components = mysqli_query($conn, $query_components);

    // Calculate the total price by summing up the prices of all added components
    while ($component = mysqli_fetch_assoc($result_components)) {
        $total_price += $component['price'];
    }

    return $total_price;
}

// Retrieve all games created by the current user from the "games" table
$query = "SELECT * FROM games WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>

<head>
    <title>My Games</title>
</head>

<body>
    <div>
        <a href="create_game.php">create game</a>
        <a href="created_games_page.php">created games </a>
        <a href="built_games_page.php">built_games_</a>
        <a href="pending_built_games_page.php">pending</a>
        <a href="canceled_built_games_page.php">canceled</a>
        <a href="approved_built_games_page.php">approved</a>
        <a href="purchased_built_games_page.php">purchased</a>
        <a href="published_built_games_page.php">published</a>
    </div>


    <div class="panel">
        <h2>All Created Games</h2>
        <ul>
            <?php
            while ($game = mysqli_fetch_assoc($result)) {
                echo '<li>';
                echo '<a href="game_dashboard.php?game_id=' . $game['game_id'] . '">' . $game['name'] . '</a>';
                echo '<br> Total Price: $' . calculateTotalPrice($game['game_id']); // Call the function here
            
                echo '<form method="post" action="process_build_game.php">';
                echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
                echo '<input type="hidden" name="game_id" value="' . $game['game_id'] . '">';
                echo '<input type="hidden" name="game_name" value="' . $game['name'] . '">';
                echo '<input type="hidden" name="game_price" value="' . calculateTotalPrice($game['game_id']) . '">'; // Add this line
            
                // Additional hidden fields
                echo '<input type="hidden" name="description" value="' . $game['description'] . '">';
                echo '<input type="hidden" name="category" value="' . $game['category'] . '">';

                echo 'Is Built: ' . ($game['is_built'] == 1 ? 'Yes' : 'No'); // Display is_built here
            
                echo '<br><button type="submit" name="build_game">Build Game</button>';
                echo '</form>';

                echo '</li>';
            }
            ?>
        </ul>
    </div>





</body>

</html>