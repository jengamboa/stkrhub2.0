<?php
session_start();
include 'connection.php'; // Include your database connection

// Fetch all records from the published_built_games table
$query = "SELECT * FROM published_built_games";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marketplace Page</title>
</head>

<body>
    <h1>Marketplace Page</h1>

    <?php
    // Display the records if there are any
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div>';
            echo '<form action="process_add_published_game_to_cart.php" method="post">';

            echo '<h2>' . $row['published_game_id'] . '</h2>';
            echo '<h2>' . $row['game_name'] . '</h2>';
            echo '<p>Price: $' . $row['marketplace_price'] . '</p>';

            // View Details button linking to a detailed game page
            echo '<a href="game_details.php?game_id=' . $row['published_game_id'] . '">View Details</a>';

            // Check if user is logged in
            if (isset($_SESSION['user_id'])) {

                echo '<input type="hidden" name="user_id" value="' . $_SESSION['user_id'] . '">';

                echo '<input type="hidden" name="published_game_id" value="' . $row['published_game_id'] . '">';

                echo '<input type="hidden" name="game_id" value="NULL">';
                echo '<input type="hidden" name="built_game_id" value="NULL">';
                echo '<input type="hidden" name="game_name" value="NULL">';

                echo '<input type="hidden" name="price" value="' . $row['marketplace_price'] . '">';

                echo '<button type="submit" name="add_to_cart">Add to Cart</button>';
            } else {
                // Redirect to login_page.php
                echo '<a href="login_page.php">Login to Add to Cart</a>';
            }


            echo '</form>';
            echo '</div>';
        }
    } else {
        echo '<p>No games available in the marketplace.</p>';
    }
    ?>

</body>

</html>