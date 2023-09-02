<?php
// Include your database connection
include 'connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login_page.php");
    exit;
}

// Get the user ID from the session
$user_id = $_SESSION['user_id'];

// Query to retrieve pending orders for the user where is_pending = 1
$query = "SELECT order_id, published_game_id, built_game_id, added_component_id FROM orders WHERE user_id = '$user_id' AND is_received = 1";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Received Orders</title>
</head>

<body>
    <h1>Received Orders</h1>

    <!-- Display pending orders if any -->
    <form method="post" action="process_cancel_order.php">
    <?php if (mysqli_num_rows($result) > 0): ?>
        <ul>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <li>
                    Order ID:
                    <?php echo $row['order_id']; ?>,

                    <?php if (!empty($row['published_game_id'])): ?>
                        Published Game ID:
                        <?php echo $row['published_game_id']; ?>,
                    <?php endif; ?>

                    <?php if (!empty($row['built_game_id'])): ?>
                        Built Game ID:
                        <?php echo $row['built_game_id']; ?>,
                    <?php endif; ?>

                    <?php if (!empty($row['added_component_id'])): ?>
                        Added component ID:
                        <?php echo $row['added_component_id']; ?>
                    <?php endif; ?>
                    
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <p>No pending orders found.</p>
    <?php endif; ?>
    </form>


    <a href="orders_page.php">Back to Orders Page</a>
</body>

</html>