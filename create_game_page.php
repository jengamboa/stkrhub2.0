<?php
// create_game.php
include 'connection.php';
include 'html/page_header2.php';

// Check if the user is logged in. If not, redirect to the login page.
if (!isset($_SESSION['user_id'])) {
    header("Location: login_page.php");
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Create Game</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>
    <br><br>
    <div>
        <a href="create_game.php">create game</a>
        <a href="created_games_page.php">created games </a>
        <a href="built_games_page.php">built_games_</a>
        <a href="pending_built_games_page.php">pending</a>
        <a href="canceled_built_games_page.php">canceled</a>
        <a href="approved_built_games_page.php">approved</a>
        <a href="purchased_built_games_page.php">purchased</a>
        <a href="published_built_games_page.php">published</a>
    </div>

    <h2>Create Game</h2>
    <form method="post" action="process_create_game.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="5" required></textarea>
        <br>

        <input type="submit" value="Create Game">
    </form>
</body>

</html>