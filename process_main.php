<?php

require_once 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted name and sanitize it
    $name = isset($_POST["name"]) ? htmlspecialchars($_POST["name"]) : "";

    // Set temporary user and built game IDs
    $userId = 123; // Replace with the actual user ID
    $builtGameId = 456; // Replace with the actual built game ID

    // Include the existing connection.php to get the database connection
    

    // Insert game information into the database
    $insertSql = "INSERT INTO published_games (user_id, built_game_id, name)
                  VALUES ($userId, $builtGameId, '$name')";

    if ($_SESSION['db_connection']->query($insertSql) === TRUE) {
        echo "Game information inserted into the database successfully.<br>";
    } else {
        echo "Error inserting game information: " . $_SESSION['db_connection']->error . "<br>";
    }
    
}
?>
