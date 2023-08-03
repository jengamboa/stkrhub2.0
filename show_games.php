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
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Games</title>
</head>
<body>
    <h2>My Games</h2>
    <ul>
        <?php while ($game = mysqli_fetch_assoc($result)) { ?>
            <li>
                <a href="game_dashboard.php?game_id=<?php echo $game['game_id']; ?>">
                    <?php echo $game['name']; ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</body>
</html>
