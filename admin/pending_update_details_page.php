<?php
include '../connection.php'; // Include your database connection
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="process_pending_update.php">
        <?php
        if (isset($_GET['published_game_id'])) {
            $published_game_id = $_GET['published_game_id'];
            echo '<input type="hidden" name="published_game_id" value="' . $published_game_id . '">';
            echo 'Published Game ID: ' . $published_game_id;
        }
        ?>

        <!-- panel 1 -->
        <div>
            <?php
            // Query to retrieve current game information from published_built_games table
            $currentInfoQuery = "SELECT * FROM published_built_games WHERE published_game_id = '$published_game_id'";
            $currentInfoResult = mysqli_query($conn, $currentInfoQuery);

            if (mysqli_num_rows($currentInfoResult) > 0) {
                $currentGameInfo = mysqli_fetch_assoc($currentInfoResult);

                echo '<h2>Current Information</h2>';
                echo '<p>Published Game ID: ' . $currentGameInfo['published_game_id'] . '</p>';
                echo '<p>Built Game ID: ' . $currentGameInfo['built_game_id'] . '</p>';
                echo '<p>Game Name: ' . $currentGameInfo['game_name'] . '</p>';
                echo '<p>category: ' . $currentGameInfo['category'] . '</p>';
                echo '<p>Edition: ' . $currentGameInfo['edition'] . '</p>';
                echo '<p>Published Date: ' . $currentGameInfo['published_date'] . '</p>';
                echo '<p>Creator ID: ' . $currentGameInfo['creator_id'] . '</p>';
                echo '<p>Age ID: ' . $currentGameInfo['age_id'] . '</p>';
                echo '<p>Short Description: ' . $currentGameInfo['short_description'] . '</p>';
                echo '<p>Long Description: ' . $currentGameInfo['long_description'] . '</p>';
                echo '<p>Website: ' . $currentGameInfo['website'] . '</p>';
                echo '<p>Logo Path: ' . $currentGameInfo['logo_path'] . '</p>';
                echo '<p>Minimum Players: ' . $currentGameInfo['min_players'] . '</p>';
                echo '<p>Maximum Players: ' . $currentGameInfo['max_players'] . '</p>';
                echo '<p>Minimum Playtime: ' . $currentGameInfo['min_playtime'] . '</p>';
                echo '<p>Maximum Playtime: ' . $currentGameInfo['max_playtime'] . '</p>';

                echo '<p>desired_markup: ' . $currentGameInfo['desired_markup'] . '</p>';
                echo '<p>manufacturer_profit: ' . $currentGameInfo['manufacturer_profit'] . '</p>';
                echo '<p>creator_profit: ' . $currentGameInfo['creator_profit'] . '</p>';
                echo '<p>marketplace_price: ' . $currentGameInfo['marketplace_price'] . '</p>';
            } else {
                echo '<p>No information found for the provided published game ID.</p>';
            }
            ?>

            <!-- Display game images associated with the published game ID -->
            <?php
            $imageQuery = "SELECT * FROM published_multiple_files WHERE published_built_game_id = '$published_game_id'";
            $imageResult = mysqli_query($conn, $imageQuery);

            echo '<h2>Game Images</h2>';
            while ($imageRow = mysqli_fetch_assoc($imageResult)) {
                $imagePath = '../' . $imageRow['file_path']; // Navigate up one level to access the uploads/ directory
            
                // Check if the image path is not empty and the file exists
                if (!empty($imagePath) && file_exists($imagePath)) {
                    echo '<img src="' . $imagePath . '" alt="Game Image">';
                } else {
                    echo 'Image not found or path is incorrect.';
                }
            }
            ?>
        </div>

        <!-- panel 2 -->
        <div>
            <?php

            // Query to retrieve pending_update_published_built_games_id based on published_game_id
            $query = "SELECT pending_update_published_built_games_id FROM pending_update_published_built_games WHERE published_built_game_id = '$published_game_id'";
            $result = mysqli_query($conn, $query);
            mysqli_num_rows($result);

            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $pending_update_built_game_id = $row['pending_update_published_built_games_id']; // Store in a variable
                    echo '<br>';
                    echo 'Pending Update Built Game ID: ' . $pending_update_built_game_id;
                }
            }
            ?>

            <?php
            // Query to retrieve potential game information from published_built_games table
            $potentialInfoQuery = "SELECT * FROM pending_update_published_built_games WHERE pending_update_published_built_games_id = '$pending_update_built_game_id'";
            $potentialInfoResult = mysqli_query($conn, $potentialInfoQuery);

            if (mysqli_num_rows($potentialInfoResult) > 0) {
                $potentialGameInfo = mysqli_fetch_assoc($potentialInfoResult);

                echo '<h2>Potential Information</h2>';
                echo '<p>Built Game ID: ' . $potentialGameInfo['built_game_id'] . '</p>';
                echo '<p>Game Name: ' . $potentialGameInfo['game_name'] . '</p>';
                echo '<p>category: ' . $potentialGameInfo['category'] . '</p>';
                echo '<p>Edition: ' . $potentialGameInfo['edition'] . '</p>';
                echo '<p>Published Date: ' . $potentialGameInfo['published_date'] . '</p>';
                echo '<p>Creator ID: ' . $potentialGameInfo['creator_id'] . '</p>';
                echo '<p>Age ID: ' . $potentialGameInfo['age_id'] . '</p>';
                echo '<p>Short Description: ' . $potentialGameInfo['short_description'] . '</p>';
                echo '<p>Long Description: ' . $potentialGameInfo['long_description'] . '</p>';
                echo '<p>Website: ' . $potentialGameInfo['website'] . '</p>';
                echo '<p>Logo Path: ' . $potentialGameInfo['logo_path'] . '</p>';
                echo '<p>Minimum Players: ' . $potentialGameInfo['min_players'] . '</p>';
                echo '<p>Maximum Players: ' . $potentialGameInfo['max_players'] . '</p>';
                echo '<p>Minimum Playtime: ' . $potentialGameInfo['min_playtime'] . '</p>';
                echo '<p>Maximum Playtime: ' . $potentialGameInfo['max_playtime'] . '</p>';

                echo '<p>desired_markup: ' . $potentialGameInfo['desired_markup'] . '</p>';
                echo '<p>manufacturer_profit: ' . $potentialGameInfo['manufacturer_profit'] . '</p>';
                echo '<p>creator_profit: ' . $potentialGameInfo['creator_profit'] . '</p>';
                echo '<p>marketplace_price: ' . $potentialGameInfo['marketplace_price'] . '</p>';
            } else {
                echo '<p>No information found for the provided published game ID.</p>';
            }
            ?>

            <!-- Display game images associated with the published game ID -->


            <?php
            $imagePotentialQuery = "SELECT * FROM pending_update_published_multiple_files WHERE pending_update_published_built_game_id = '$pending_update_built_game_id'";
            $imagePotentialResult = mysqli_query($conn, $imagePotentialQuery);

            echo '<h2>Game imagePotentials</h2>';
            while ($imagePotentialRow = mysqli_fetch_assoc($imagePotentialResult)) {
                $imagePotentialPath = '../' . $imagePotentialRow['file_path']; // Navigate up one level to access the uploads/ directory
            
                // Check if the imagePotential path is not empty and the file exists
                if (!empty($imagePotentialPath) && file_exists($imagePotentialPath)) {
                    echo '<img src="' . $imagePotentialPath . '" alt="Game imagePotential">';
                } else {
                    echo 'imagePotential not found or path is incorrect.';
                }
            }
            ?>
        </div>


        <!-- Submit Button -->
        <div>
            <button type="submit" name="confirm_update">CONFIRM UPDATE</button>
        </div>
    </form>
</body>

</html>