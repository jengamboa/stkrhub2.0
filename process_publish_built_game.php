<?php
include 'connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $built_game_id = $_POST['built_game_id'];
    $creator_id = $_POST['creator_id'];
    $game_name = $_POST['game_name'];
    $edition = $_POST['edition'];
    $published_date = date('Y-m-d'); // Current date
    $age_id = $_POST['age'];
    $short_description = $_POST['short_description'];
    $long_description = $_POST['long_description'];
    $website = $_POST['website'];

    // Get player counts and playtimes
    $min_players = $_POST['min_players'];
    $max_players = $_POST['max_players'];
    $min_playtime = $_POST['min_playtime'];
    $max_playtime = $_POST['max_playtime'];

    // Handle uploaded logo file
    $logo_path = 'uploads/';
    $logo_file = $_FILES['logo'];
    $logo_filename = $logo_file['name'];
    $logo_path .= $logo_filename;

    if (move_uploaded_file($logo_file['tmp_name'], $logo_path)) {
        // Logo upload successful
        // Insert data into the published_built_games table
        $insertQuery = "INSERT INTO published_built_games (built_game_id, game_name, edition, published_date, creator_id, age_id, short_description, long_description, logo_path, website, min_players, max_players, min_playtime, max_playtime) VALUES ('$built_game_id', '$game_name', '$edition', '$published_date', '$creator_id', '$age_id', '$short_description', '$long_description', '$logo_path', '$website', '$min_players', '$max_players', '$min_playtime', '$max_playtime')";

        if (mysqli_query($conn, $insertQuery)) {
            echo 'success';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Logo upload failed
        echo "Logo upload failed.";
    }
} else {
    echo "Form submission failed.";
}
?>