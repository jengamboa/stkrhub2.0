process publish built game .php

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

    // Handle file upload for logo
    $targetDirectory = 'uploads/published_built_games/logos/';
    $originalFilename = $_FILES['logo']['name'];
    $extension = pathinfo($originalFilename, PATHINFO_EXTENSION);
    $uniqueFilename = uniqid() . '_' . time() . '.' . $extension;
    $logoPath = $targetDirectory . $uniqueFilename;

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
            // Get the ID of the last inserted row in the published_built_games table
            $published_game_id = mysqli_insert_id($conn);

            // Update the is_published column in the built_games table
            $updateBuiltGamesQuery = "UPDATE built_games SET is_published = 1 WHERE built_game_id = '$built_game_id'";
            if (mysqli_query($conn, $updateBuiltGamesQuery)) {
                echo "Game published successfully!";
            } else {
                echo "Error updating built_games table: " . mysqli_error($conn);
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Logo file upload failed.";
    }

    // Insert multiple files into the "published_multiple_files" table
    $uploadDirectory = "uploads/";
    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    if (!empty($_FILES['multiple_files']['name'][0])) {
        foreach ($_FILES['multiple_files']['name'] as $key => $filename) {
            $tempFilePath = $_FILES['multiple_files']['tmp_name'][$key];
            $newFilename = uniqid() . '_' . basename($filename);
            $newFilePath = $uploadDirectory . $newFilename;

            if (move_uploaded_file($tempFilePath, $newFilePath)) {
                // Insert the file data along with published_game_id and built_game_id
                // Insert the file data along with published_game_id and built_game_id
                $insertFileQuery = "INSERT INTO published_multiple_files (file_name, file_path, creator_id, published_game_id, built_game_id)
                VALUES ('$newFilename', '$newFilePath', '$creator_id', '$published_game_id', '$built_game_id')";
                if (mysqli_query($conn, $insertFileQuery)) {
                    echo "File '$filename' uploaded and inserted successfully.<br>";
                } else {
                    echo "Error inserting file '$filename': " . mysqli_error($conn) . "<br>";
                }
            } else {
                echo "Error uploading file '$filename'.<br>";
            }
        }
    } else {
        echo "No files were uploaded.";
    }
}
?>