<?php
include 'connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $published_built_game_id = $_POST['published_built_game_id'];

    $built_game_id = $_POST['built_game_id'];
    $creator_id = $_POST['creator_id'];
    $game_name = $_POST['game_name'];
    $category = $_POST['category'];
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

    // Retrieve the calculated values from the $_POST array
    $desired_markup = $_POST['desired_markup'];
    $manufacturer_profit = $_POST['manufacturer_profit'];
    $creator_profit = $_POST['creator_profit'];
    $marketplace_price = $_POST['marketplace_price'];

    // Handle uploaded logo file
    $logo_path = 'uploads/';
    $logo_file = $_FILES['logo'];
    $logo_filename = uniqid() . '_' . $logo_file['name']; // Add unique ID to the filename
    $logo_path .= $logo_filename;

    if (move_uploaded_file($logo_file['tmp_name'], $logo_path)) {
        // Logo upload successful
        // Insert data into the published_built_games table
        $insertQuery = "INSERT INTO pending_update_published_built_games (published_built_game_id, built_game_id, game_name, category, edition, published_date, creator_id, age_id, short_description, long_description, logo_path, website, min_players, max_players, min_playtime, max_playtime, desired_markup, manufacturer_profit, creator_profit, marketplace_price) VALUES ('$published_built_game_id', '$built_game_id', '$game_name', '$category', '$edition', '$published_date', '$creator_id', '$age_id', '$short_description', '$long_description', '$logo_path', '$website', '$min_players', '$max_players', '$min_playtime', '$max_playtime', '$desired_markup', '$manufacturer_profit', '$creator_profit', '$marketplace_price')";

        if (mysqli_query($conn, $insertQuery)) {
            // Retrieve the generated published_built_game_id
            // $published_built_game_id = mysqli_insert_id($conn);
            $pending_update_published_built_game_id = mysqli_insert_id($conn);

            // Insert game images into the published_multiple_files table
            $image_paths = []; // To store uploaded image paths
            $image_files = $_FILES['game_images'];
            $num_images = count($image_files['name']);

            for ($i = 0; $i < $num_images; $i++) {
                $image_filename = uniqid() . '_' . $image_files['name'][$i]; // Generate unique filename
                $image_path = 'uploads/' . $image_filename;

                if (move_uploaded_file($image_files['tmp_name'][$i], $image_path)) {
                    // Image upload successful
                    $image_paths[] = $image_path;
                } else {
                    // Image upload failed
                    echo "Image upload failed.";
                }
            }

            foreach ($image_paths as $image_path) {
                $insertImageQuery = "INSERT INTO pending_update_published_multiple_files (pending_update_published_built_game_id, published_built_game_id, built_game_id, creator_id, file_path) VALUES ('$pending_update_published_built_game_id', '$published_built_game_id', '$built_game_id', '$creator_id', '$image_path')";

                if (mysqli_query($conn, $insertImageQuery)) {
                    echo 'Image inserted successfully.';
                } else {
                    echo "Error inserting image: " . mysqli_error($conn);
                }
            }
            echo 'success';

            // Update the has_pending_update column in published_built_games table
            $updateHasPendingQuery = "UPDATE published_built_games SET has_pending_update = 1 WHERE published_game_id = '$published_built_game_id'";

            if (mysqli_query($conn, $updateHasPendingQuery)) {
                echo 'has_pending_update updated successfully.';
            } else {
                echo "Error updating has_pending_update: " . mysqli_error($conn);
            }
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