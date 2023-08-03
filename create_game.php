<?php
// create_game.php
include 'connection.php';
include 'html/header.html.php';

// Check if the user is logged in. If not, redirect to the login page.
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Game</title>
</head>
<body>
    <h2>Create Game</h2>
    <form method="post" action="process_create_game.php">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="5" required></textarea>
        <br>

        <label for="category">Category:</label>
        <input type="text" id="category" name="category" required>
        <br>

        <input type="submit" value="Create Game">
    </form>
</body>
</html>
