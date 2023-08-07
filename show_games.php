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

// Retrieve all games created by the current user from the "games" table
$query = "SELECT * FROM games WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $query);

// Retrieve the list of purchased games for the current user from the purchased_games table
$query_purchased = "SELECT * FROM purchased_games WHERE user_id = '$user_id'";
$result_purchased = mysqli_query($conn, $query_purchased);
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
            $query = "SELECT * FROM games WHERE user_id = '$user_id'";
            $result = mysqli_query($conn, $query);

            while ($game = mysqli_fetch_assoc($result)) {
                echo '<li>';
                echo '<a href="game_dashboard.php?game_id=' . $game['game_id'] . '">' . $game['name'] . '</a>';
                echo '<form method="post" action="purchase.php">';
                echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
                echo '<input type="hidden" name="game_id" value="' . $game['game_id'] . '">';
                echo '<input type="hidden" name="game_name" value="' . $game['name'] . '">';
                echo '<button type="submit" name="purchase_game">Purchase to Add in Marketplace</button>';
                echo '</form>';
                echo '</li>';
            }
            ?>
        </ul>
    </div>

    <div class="panel">
        <h2>Ready to Publish Games</h2>
        <ul>
            <?php
            while ($purchase = mysqli_fetch_assoc($result_purchased)) {
                if ($purchase['is_published'] == 0) {
                    $game_id = $purchase['game_id'];
                    $purchase_id = $purchase['purchase_id']; // Added line to get purchase ID
                    $query_game = "SELECT * FROM games WHERE game_id = '$game_id'";
                    $result_game = mysqli_query($conn, $query_game);
                    $game = mysqli_fetch_assoc($result_game);
            ?>
                    <li>
                        <form method="get" action="edit_game_page.php">
                            <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
                            <input type="hidden" name="game_name" value="<?php echo $game['name']; ?>">
                            <button type="submit" name="edit_game_page">Edit Game Page</button>
                        </form>
                        <p>Game ID: <?php echo $game['game_id']; ?></p>
                        <p>Game Name: <?php echo $game['name']; ?></p>
                        <p>Purchase ID: <?php echo $purchase_id; ?></p> <!-- Added line to display purchase ID -->
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>






</body>

</html>