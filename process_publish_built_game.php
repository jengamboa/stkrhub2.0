<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['built_game_id'])) {
    // Retrieve form data
    $built_game_id = $_POST['built_game_id'];
    $game_name = isset($_POST['game_name']) ? $_POST['game_name'] : '';
    $edition = isset($_POST['edition']) ? $_POST['edition'] : '';
    $min_players = isset($_POST['min_players']) ? $_POST['min_players'] : '';
    $max_players = isset($_POST['max_players']) ? $_POST['max_players'] : '';
    $min_playtime = isset($_POST['min_playtime']) ? $_POST['min_playtime'] : '';
    $max_playtime = isset($_POST['max_playtime']) ? $_POST['max_playtime'] : '';
    $creator_id = isset($_POST['creator_id']) ? $_POST['creator_id'] : ''; // Added creator ID
    $age = isset($_POST['age']) ? $_POST['age'] : ''; // Retrieve selected age value
    $short_description = isset($_POST['short_description']) ? $_POST['short_description'] : '';
    $long_description = isset($_POST['long_description']) ? $_POST['long_description'] : '';
    $website = isset($_POST['website']) ? $_POST['website'] : '';

    // Handle logo upload
    $logoPath = ''; // Initialize logo path
    if (isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $logoName = $_FILES['logo']['name'];
        $logoTmpName = $_FILES['logo']['tmp_name'];
        $logoPath = 'notes/' . $logoName; // Update the directory path as needed
        move_uploaded_file($logoTmpName, $logoPath);
    }

    // Insert data into published_built_games table
    $insertQuery = "INSERT INTO published_built_games (built_game_id, game_name, edition, creator_id, age_id, short_description, long_description, website, logo_path) VALUES ('$built_game_id', '$game_name', '$edition', '$creator_id', '$age', '$short_description', '$long_description', '$website', '$logoPath')";

    if (mysqli_query($conn, $insertQuery)) {
        // Get the ID of the inserted published game
        $published_game_id = mysqli_insert_id($conn);

        // Insert "Number of Players" data into published_game_players table
        $playersInsertQuery = "INSERT INTO published_game_players (published_game_id, min_players, max_players) VALUES ('$published_game_id', '$min_players', '$max_players')";
        mysqli_query($conn, $playersInsertQuery);

        // Insert "Play Time" data into published_game_playtime table
        $playtimeInsertQuery = "INSERT INTO published_game_playtime (published_game_id, min_playtime, max_playtime) VALUES ('$published_game_id', '$min_playtime', '$max_playtime')";

        if (mysqli_query($conn, $playtimeInsertQuery)) {
            echo 'Game published successfully.';
        } else {
            echo 'Error publishing game: ' . mysqli_error($conn);
        }
    } else {
        echo 'Error publishing game: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid request.';
}

mysqli_close($conn);
?>
