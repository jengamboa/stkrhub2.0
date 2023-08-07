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
    <div class="panel">
        <h2>All Created Games</h2>
        <ul>
            <?php
            while ($game = mysqli_fetch_assoc($result)) {
                echo '<li>';
                echo '<a href="game_dashboard.php?game_id=' . $game['game_id'] . '">' . $game['name'] . '</a>';
                echo 'Total Price: $' . calculateTotalPrice($game['game_id']); // Call the function here
                echo '<form method="post" action="purchase.php">';
                echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
                echo '<input type="hidden" name="game_id" value="' . $game['game_id'] . '">';
                echo '<input type="hidden" name="game_name" value="' . $game['name'] . '">';
                echo '<input type="hidden" name="game_price" value="' . calculateTotalPrice($game['game_id']) . '">'; // Add the hidden price field
                echo '<button type="submit" name="purchase_game">Purchase to Add in Marketplace</button>';
                echo '</form>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>

</body>

</html>