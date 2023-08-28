<?php
include 'connection.php';
include 'html/header.html.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page or handle the unauthorized access as needed
    header("Location: login_page.php"); // Change to your login page URL
    exit();
}


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


$query = "SELECT * FROM published_built_games";
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


            <p>Already Published</p>
            <a
                href="update_game_page.php?built_game_id=<?= $game['built_game_id']; ?>&published_game_id=<?= $game['published_game_id']; ?>">Edit
                and Update</a>



        </li>
    <?php endwhile; ?>
</ul>