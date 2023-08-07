<?php
include 'connection.php';
include 'html/header.html.php';

// Check if the user is logged in. If not, redirect to the login page.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch games from purchased_games with is_published = 0
$query_purchased = "SELECT * FROM purchased_games WHERE user_id = '$user_id' AND is_published = 0";
$result_purchased = mysqli_query($conn, $query_purchased);

?>

<!DOCTYPE html>
<html>

<head>
    <title>Ready to Publish Games</title>
</head>

<body>
    <div class="panel">
        <h2>Ready to Publish Games</h2>
        <ul>
            <?php while ($purchase = mysqli_fetch_assoc($result_purchased)) { ?>
                <li>
                    <?php
                    $game_id = $purchase['game_id'];
                    $query_game = "SELECT * FROM games WHERE game_id = '$game_id'";
                    $result_game = mysqli_query($conn, $query_game);
                    $game = mysqli_fetch_assoc($result_game);

                    $purchase_id = $purchase['purchase_id'];
                    $query_price = "SELECT price FROM purchased_games WHERE purchase_id = '$purchase_id'";
                    $result_price = mysqli_query($conn, $query_price);
                    $price_data = mysqli_fetch_assoc($result_price);
                    $game_price = $price_data['price'];
                    ?>
                    <form method="post" action="edit_game_page.php">
                        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
                        <input type="hidden" name="game_name" value="<?php echo $game['name']; ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                        <input type="hidden" name="purchase_id" value="<?php echo $purchase['purchase_id']; ?>">
                        <button type="submit" name="add_to_marketplace">Add to Marketplace</button>
                    </form>
                    <p>Game ID: <?php echo $game['game_id']; ?></p>
                    <p>Game Name: <?php echo $game['name']; ?></p>
                    <p>Purchase ID: <?php echo $purchase['purchase_id']; ?></p>
                    <p>Price: $<?php echo $game_price; ?></p>
                    <!-- Display more details as needed -->
                </li>
            <?php } ?>
        </ul>
    </div>

</body>

</html>