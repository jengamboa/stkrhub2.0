<?php
include 'connection.php';
include 'html/header.html.php';

// Check if the user is logged in. If not, redirect to the login page.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Retrieve the passed game ID from the URL parameter
$game_id = $_GET['game_id'];

// Fetch the game details based on the game ID
$query_game = "SELECT * FROM games WHERE game_id = '$game_id' AND user_id = '$user_id'";
$result_game = mysqli_query($conn, $query_game);

// Fetch the published game details based on the game ID
$query_published = "SELECT * FROM published_games WHERE game_id = '$game_id'";
$result_published = mysqli_query($conn, $query_published);

// Fetch the purchase ID associated with the game
$query_purchase_id = "SELECT purchase_id, is_published FROM purchased_games WHERE user_id = '$user_id' AND game_id = '$game_id'";
$result_purchase_id = mysqli_query($conn, $query_purchase_id);

if ($row_purchase = mysqli_fetch_assoc($result_purchase_id)) {
    $purchase_id = $row_purchase['purchase_id'];
    $is_published = $row_purchase['is_published']; // Retrieve the is_published value
} else {
    // Handle the case where purchase ID is not found (e.g., not purchased)
    $purchase_id = "Not purchased";
    $is_published = 0; // Default is_published if purchase ID is not found
}

// Check if the game exists and belongs to the logged-in user
if ($game = mysqli_fetch_assoc($result_game)) {
    $game_name = $game['name'];
} else {
    // Handle error if the game doesn't exist or doesn't belong to the user
    echo "Game not found or not accessible.";
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Edit Game Page</title>
</head>

<body>
    <h2>Edit Game Page</h2>
    <p>Game ID: <?php echo $game_id; ?></p>
    <p>Game Name: <?php echo $game_name; ?></p>
    <p>User ID: <?php echo $user_id; ?></p>
    <p>Purchase ID: <?php echo $purchase_id; ?></p>
    <p>is_published: <?php echo $is_published; ?></p>

    <!-- Add your form inputs and other editing options here -->
    <form method="post" action="process_publish_game.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
        <input type="hidden" name="game_name" value="<?php echo $game_name; ?>">
        <input type="hidden" name="purchase_id" value="<?php echo $purchase_id; ?>">
        <input type="hidden" name="is_published" value="<?php echo $is_published; ?>"> <!-- Add this line -->

        <label for="complete_game_name">Complete Game Name:</label>
        <input type="text" id="complete_game_name" name="complete_game_name" required>
        <br>

        <label for="edition">Edition:</label>
        <input type="text" id="edition" name="edition" required>
        <br>

        <label for="marketplace_price">Marketplace Price:</label>
        <input type="number" id="marketplace_price" name="marketplace_price" step="1" required>
        <br>

        <button type="submit" name="save_publish">Save and Publish</button>
    </form>
</body>

</html>
