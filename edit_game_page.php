<?php
include 'connection.php';
include 'html/header.html.php';

if (isset($_POST['add_to_marketplace'])) {
    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
    $user_id = $_POST['user_id'];
    $purchase_id = $_POST['purchase_id'];

    // Fetch the price based on the purchase_id
    $query_price = "SELECT price FROM purchased_games WHERE purchase_id = '$purchase_id'";
    $result_price = mysqli_query($conn, $query_price);
    $price_data = mysqli_fetch_assoc($result_price);
    $game_price = $price_data['price'];
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
    <p>Price: $<?php echo $game_price; ?></p>

    <!-- Add your form inputs and other editing options here -->
    <form method="post" action="process_publish_game.php">
        <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
        <input type="hidden" name="game_name" value="<?php echo $game_name; ?>">
        <input type="hidden" name="purchase_id" value="<?php echo $purchase_id; ?>">

        <!-- Add new fields for published_games -->
        <label for="complete_game_name">Complete Game Name:</label>
        <input type="text" id="complete_game_name" name="complete_game_name" required>
        <br>

        <label for="edition">Edition:</label>
        <input type="text" id="edition" name="edition" required>
        <br>

        <label for="marketplace_price">Marketplace Price:</label>
        <input type="number" id="marketplace_price" name="marketplace_price" step="1" required>
        <br>

        <!-- Add other form fields as needed -->

        <button type="submit" name="save_publish">Save and Publish</button>
    </form>

</body>

</html>
