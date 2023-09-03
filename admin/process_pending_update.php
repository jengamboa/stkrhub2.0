<?php
include '../connection.php'; // Include your database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_update'])) {
    $published_game_id = $_POST['published_game_id'];

    // Query to retrieve current game information from published_built_games table
    $currentInfoQuery = "SELECT * FROM published_built_games WHERE published_game_id = '$published_game_id'";
    $currentInfoResult = mysqli_query($conn, $currentInfoQuery);

    if (mysqli_num_rows($currentInfoResult) > 0) {
        $currentGameInfo = mysqli_fetch_assoc($currentInfoResult);

        echo 'Published Game ID: ' . $currentGameInfo['published_game_id'] . '<br>';
        echo 'Built Game ID: ' . $currentGameInfo['built_game_id'] . '<br>';

        echo 'Game Name: ' . $currentGameInfo['game_name'] . '<br>';
        echo 'Category: ' . $currentGameInfo['category'] . '<br>';
        echo '<p>Edition: ' . $currentGameInfo['edition'] . '</p>';
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
    }


    // Query to retrieve pending game information from pending_published_built_games table
    $pendingInfoQuery = "SELECT * FROM pending_update_published_built_games WHERE published_built_game_id = '$published_game_id'";
    $pendingInfoResult = mysqli_query($conn, $pendingInfoQuery);

    if (mysqli_num_rows($pendingInfoResult) > 0) {
        $pendingGameInfo = mysqli_fetch_assoc($pendingInfoResult);

        // Store the published_built_game_id in a variable
        $published_built_game_id = $pendingGameInfo['published_built_game_id'];

        echo 'Pending Game ID: ' . $pendingGameInfo['pending_update_published_built_games_id'] . '<br>';
        echo 'published_built_game_id: ' . $published_built_game_id . '<br>';
        echo 'Built Game ID: ' . $pendingGameInfo['built_game_id'] . '<br>';

        echo 'Game Name: ' . $pendingGameInfo['game_name'] . '<br>';
        echo 'category: ' . $pendingGameInfo['category'] . '<br>';
        echo 'Edition: ' . $pendingGameInfo['edition'] . '<br>';
        echo 'Age ID: ' . $pendingGameInfo['age_id'] . '<br>';
        echo 'Short Description: ' . $pendingGameInfo['short_description'] . '<br>';
        echo 'Long Description: ' . $pendingGameInfo['long_description'] . '<br>';
        echo 'Website: ' . $pendingGameInfo['website'] . '<br>';
        echo 'Logo Path: ' . $pendingGameInfo['logo_path'] . '<br>';
        echo 'Minimum Players: ' . $pendingGameInfo['min_players'] . '<br>';
        echo 'Maximum Players: ' . $pendingGameInfo['max_players'] . '<br>';
        echo 'Minimum Playtime: ' . $pendingGameInfo['min_playtime'] . '<br>';
        echo 'Maximum Playtime: ' . $pendingGameInfo['max_playtime'] . '<br>';

        echo '<p>desired_markup: ' . $pendingGameInfo['desired_markup'] . '</p>';
        echo '<p>manufacturer_profit: ' . $pendingGameInfo['manufacturer_profit'] . '</p>';
        echo '<p>creator_profit: ' . $pendingGameInfo['creator_profit'] . '</p>';
        echo '<p>marketplace_price: ' . $pendingGameInfo['marketplace_price'] . '</p>';
    }

    // Update the values in the published_built_games table
    $updateQuery = "
            UPDATE published_built_games
                SET game_name = '{$pendingGameInfo['game_name']}',
                category = '{$pendingGameInfo['category']}',    
                edition = '{$pendingGameInfo['edition']}',
                age_id = '{$pendingGameInfo['age_id']}',
                short_description = '{$pendingGameInfo['short_description']}',
                long_description = '{$pendingGameInfo['long_description']}',
                website = '{$pendingGameInfo['website']}',
                logo_path = '{$pendingGameInfo['logo_path']}',
                min_players = '{$pendingGameInfo['min_players']}',
                max_players = '{$pendingGameInfo['max_players']}',
                min_playtime = '{$pendingGameInfo['min_playtime']}',
                max_playtime = '{$pendingGameInfo['max_playtime']}',

                desired_markup = '{$pendingGameInfo['desired_markup']}',
                manufacturer_profit = '{$pendingGameInfo['manufacturer_profit']}',
                creator_profit = '{$pendingGameInfo['creator_profit']}',
                marketplace_price = '{$pendingGameInfo['marketplace_price']}'
            WHERE published_game_id = '$published_game_id'
        ";

    mysqli_query($conn, $updateQuery);

    // Delete the rows from pending_update_published_built_games table
    $deleteQuery = "DELETE FROM pending_update_published_built_games WHERE published_built_game_id = '$published_built_game_id'";
    mysqli_query($conn, $deleteQuery);

    // Delete the rows from published_multiple_files table
    $deleteFilesQuery = "DELETE FROM published_multiple_files WHERE published_built_game_id = '$published_game_id'";
    mysqli_query($conn, $deleteFilesQuery);

    // Query to retrieve pending update files information
    $pendingFilesQuery = "SELECT * FROM pending_update_published_multiple_files WHERE published_built_game_id = '$published_built_game_id'";
    $pendingFilesResult = mysqli_query($conn, $pendingFilesQuery);

    // Loop through the pending files and insert into published_multiple_files table
    while ($pendingFileRow = mysqli_fetch_assoc($pendingFilesResult)) {
        $insertFileQuery = "
            INSERT INTO published_multiple_files (published_built_game_id, built_game_id, file_path)
            VALUES (
                '{$pendingFileRow['published_built_game_id']}',
                '{$pendingFileRow['built_game_id']}',
                '{$pendingFileRow['file_path']}'
            )
        ";
        mysqli_query($conn, $insertFileQuery);
    }

    // Delete the rows from pending_update_published_multiple files table
    $deleteFilesQuery = "DELETE FROM pending_update_published_multiple_files WHERE published_built_game_id = '$published_built_game_id'";
    mysqli_query($conn, $deleteFilesQuery);

    // Update the has_pending_update column in pending_built_games table to 0
    $updatePendingFlagQuery = "UPDATE published_built_games SET has_pending_update = 0 WHERE published_game_id = '$published_game_id'";
    mysqli_query($conn, $updatePendingFlagQuery);
}
?>