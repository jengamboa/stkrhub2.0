<?php
session_start();
include 'connection.php';
include 'html/header.html.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or handle the unauthorized access as needed
    header("Location: login_page.php"); // Change to your login page URL
    exit();
}

$user_id = $_SESSION['user_id'];

echo '<div>';
echo '<a href="create_game.php">Create Game</a>';
echo '<a href="created_games_page.php">Created Games</a>';
echo '<a href="built_games_page.php">Built Games</a>';
echo '<a href="pending_built_games_page.php">Pending</a>';
echo '<a href="canceled_built_games_page.php">Canceled</a>';
echo '<a href="approved_built_games_page.php">Approved</a>';
echo '<a href="purchased_built_games_page.php">Purchased</a>';
echo '<a href="published_built_games_page.php">Published</a>';
echo '</div>';


$query = "SELECT * FROM published_built_games WHERE creator_id = $user_id";
$result = mysqli_query($conn, $query);
?>

<h2>Published Built Games</h2>
<ul>
    <?php while ($game = mysqli_fetch_assoc($result)): ?>
        <li>
        <p>Published Game ID:
                <?= $game['published_game_id'] ?>
            </p>
            <p>Built Game ID:
                <?= $game['built_game_id'] ?>
            </p>
            <p>Game Name:
                <?= $game['game_name'] ?>
            </p>
            <p>Edition:
                <?= $game['edition'] ?>
            </p>
            <p>Published Date:
                <?= $game['published_date'] ?>
            </p>
            <p>Creator ID:
                <?= $game['creator_id'] ?>
            </p>
            <p>Age ID:
                <?= $game['age_id'] ?>
            </p>
            <p>Short Description:
                <?= $game['short_description'] ?>
            </p>
            <p>Long Description:
                <?= $game['long_description'] ?>
            </p>
            <p>Website:
                <?= $game['website'] ?>
            </p>
            <p>Logo Path:
                <?= $game['logo_path'] ?>
            </p>
            <p>Min Players:
                <?= $game['min_players'] ?>
            </p>
            <p>Max Players:
                <?= $game['max_players'] ?>
            </p>
            <p>Min Playtime:
                <?= $game['min_playtime'] ?>
            </p>
            <p>Max Playtime:
                <?= $game['max_playtime'] ?>
            </p>

            <?php
            // Assuming you have fetched the game details and stored them in the $game variable
        
            if ($game['has_pending_update'] == 0) {
                echo '<a href="update_game_page.php?built_game_id=' . $game['built_game_id'] . '&published_game_id=' . $game['published_game_id'] . '">Edit and Update</a>';
            } else {
                echo 'Your update request is still under review';
            }
            ?>

            <?php
            // Count the number of occurrences in orders table
            $publishedGameId = $game['published_game_id'];
            $countQuery = "SELECT COUNT(*) as order_count FROM orders WHERE published_game_id = ?";
            $stmt = mysqli_prepare($conn, $countQuery);
            mysqli_stmt_bind_param($stmt, "i", $publishedGameId);
            mysqli_stmt_execute($stmt);
            $countResult = mysqli_stmt_get_result($stmt);
            $countRow = mysqli_fetch_assoc($countResult);
            $orderCount = $countRow['order_count'];

            echo '<p>Number of Orders: ' . $orderCount . '</p>';


            // Use prepared statements to prevent SQL injection
            $query = "SELECT orders.manufacturer_profit, orders.creator_profit FROM orders LEFT JOIN published_built_games ON orders.published_game_id = published_built_games.published_game_id WHERE orders.published_game_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "i", $publishedGameId);
            mysqli_stmt_execute($stmt);
            $result2 = mysqli_stmt_get_result($stmt);

            // Initialize variables to hold the total manufacturer_profit and creator_profit values
            $totalManufacturerProfit = 0;
            $totalCreatorProfit = 0;

            // Check if any rows were returned
            if (mysqli_num_rows($result2) > 0) {
                // Loop through each row and add up the values of manufacturer_profit and creator_profit columns
                while ($row = mysqli_fetch_assoc($result2)) {
                    $totalManufacturerProfit += $row['manufacturer_profit'];
                    $totalCreatorProfit += $row['creator_profit'];
                }

                // Print the total manufacturer_profit and creator_profit values
                echo "Total Manufacturer Profit: " . $totalManufacturerProfit . "<br>";
                echo "Total Creator Profit: " . $totalCreatorProfit . "<br>";
            } else {
                echo "No rows found";
            }
            ?>
        </li>
    <?php endwhile; ?>
</ul>
