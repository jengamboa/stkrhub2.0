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

    // Handle file upload for game logo
    $targetDirectory = 'uploads/';
    $logoPath = $targetDirectory . basename($_FILES['logo']['name']);

    if (move_uploaded_file($_FILES['logo']['tmp_name'], $logoPath)) {
        // Get player counts and playtimes
        $min_players = $_POST['min_players'];
        $max_players = $_POST['max_players'];
        $min_playtime = $_POST['min_playtime'];
        $max_playtime = $_POST['max_playtime'];

        // Insert data into the published_built_games table
        $insertQuery = "INSERT INTO published_built_games (built_game_id, game_name, edition, published_date, creator_id, age_id, short_description, long_description, website, logo_path, min_players, max_players, min_playtime, max_playtime) 
                        VALUES ('$built_game_id', '$game_name', '$edition', '$published_date', '$creator_id', '$age_id', '$short_description', '$long_description', '$website', '$logoPath', '$min_players', '$max_players', '$min_playtime', '$max_playtime')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "Game published successfully!";
        } else {
            echo "Error: " . mysqli_error($conn);
        }

        // Handle multiple file upload for graphics
        if (isset($_FILES['graphics']) && count($_FILES['graphics']['tmp_name']) > 0) {
            // Array to store uploaded graphics paths
            $graphicsPaths = [];

            foreach ($_FILES['graphics']['tmp_name'] as $key => $tmp_name) {
                $graphicsName = $_FILES['graphics']['name'][$key];
                $graphicsPath = $targetDirectory . basename($graphicsName);

                if (move_uploaded_file($tmp_name, $graphicsPath)) {
                    $graphicsPaths[] = $graphicsPath;
                } else {
                    echo "File upload for graphics failed.";
                }
            }

            // Insert graphics paths into the published_graphics table
            foreach ($graphicsPaths as $graphicsPath) {
                $insertGraphicsQuery = "INSERT INTO published_graphics (built_game_id, graphics_path) 
                                        VALUES ('$built_game_id', '$graphicsPath')";

                if (mysqli_query($conn, $insertGraphicsQuery)) {
                    echo "Graphics uploaded and inserted successfully!";
                } else {
                    echo "Error inserting graphics: " . mysqli_error($conn);
                }
            }
        }

    } else {
        echo "File upload failed.";
    }
}
?>