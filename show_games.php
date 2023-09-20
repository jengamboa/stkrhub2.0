<?php
// show_games.php
session_start();
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

</body>

</html>