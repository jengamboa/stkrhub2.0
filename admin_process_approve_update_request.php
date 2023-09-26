<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $published_game_id = $_POST['published_game_id'];


    $sqlGetRequestDetails = "SELECT * FROM pending_update_published_built_games WHERE published_built_game_id = $published_game_id";
    $queryGetRequestDetails = $conn->query($sqlGetRequestDetails);
    while ($fetchedRequest = $queryGetRequestDetails->fetch_assoc()) {

        $pending_update_published_built_games_id = $fetchedRequest['pending_update_published_built_games_id'];

        $new_built_game_id = $fetchedRequest['built_game_id'];
        $new_game_name = $fetchedRequest['game_name'];
        $new_category = $fetchedRequest['category'];
        $new_edition = $fetchedRequest['edition'];
        $new_published_date = $fetchedRequest['published_date'];
        $new_creator_id = $fetchedRequest['creator_id'];
        $new_age_id = $fetchedRequest['age_id'];
        $new_short_description = $fetchedRequest['short_description'];
        $new_long_description = $fetchedRequest['long_description'];
        $new_website = $fetchedRequest['website'];
        $new_logo_path = $fetchedRequest['logo_path'];
        $new_min_players = $fetchedRequest['min_players'];
        $new_max_players = $fetchedRequest['max_players'];
        $new_min_playtime = $fetchedRequest['min_playtime'];
        $new_max_playtime = $fetchedRequest['max_playtime'];
        $new_desired_markup = $fetchedRequest['desired_markup'];
        $new_manufacturer_profit = $fetchedRequest['manufacturer_profit'];
        $new_creator_profit = $fetchedRequest['creator_profit'];
        $new_marketplace_price = $fetchedRequest['marketplace_price'];
    }

    $updateQuery = " UPDATE published_built_games
        SET built_game_id = '$new_built_game_id', 
            game_name = '$new_game_name',
            category = '$new_category',
            edition = '$new_edition',
            published_date = '$new_published_date',
            creator_id = '$new_creator_id',
            short_description = '$new_short_description',
            long_description = '$new_long_description',
            website = '$new_website',
            logo_path = '$new_logo_path',
            min_players = '$new_min_players',
            max_players = '$new_max_players',
            min_playtime = '$new_min_playtime',
            max_playtime = '$new_max_playtime',
            desired_markup = '$new_desired_markup',
            manufacturer_profit = '$new_manufacturer_profit',
            creator_profit = '$new_creator_profit',
            marketplace_price = '$new_marketplace_price'
        WHERE published_game_id = $published_game_id;
    ";

    mysqli_query($conn, $updateQuery);




    // Delete the rows from published_multiple_files files table
    $deleteFilesQuery = "DELETE FROM published_multiple_files WHERE published_built_game_id = $published_game_id";
    mysqli_query($conn, $deleteFilesQuery);

    // Query to retrieve pending update files information
    $pendingFilesQuery = "SELECT * FROM pending_update_published_multiple_files WHERE published_built_game_id = '$published_game_id'";
    $pendingFilesResult = mysqli_query($conn, $pendingFilesQuery);

    // Loop through the pending files and insert into published_multiple_files table
    while ($pendingFileRow = mysqli_fetch_assoc($pendingFilesResult)) {
        $insertFileQuery = " INSERT INTO 
        
        published_multiple_files (published_built_game_id, built_game_id, creator_id, file_path)
            VALUES (
                $published_game_id,
                '{$pendingFileRow['built_game_id']}',
                $new_creator_id,
                '{$pendingFileRow['file_path']}'
            )
        ";
        mysqli_query($conn, $insertFileQuery);
    }


    // Delete the rows from pending_update_published_multiple_files table
    $deleteQuery = "DELETE FROM pending_update_published_multiple_files WHERE published_built_game_id = '$published_game_id'";
    mysqli_query($conn, $deleteQuery);

    // Delete the rows from pending_update_published_built_games table
    $deleteQuery2 = "DELETE FROM pending_update_published_built_games WHERE published_built_game_id = '$published_game_id'";
    mysqli_query($conn, $deleteQuery2);

    $updateQuery1 = "UPDATE published_built_games SET has_pending_update = 0 WHERE published_game_id = $published_game_id";
    mysqli_query($conn, $updateQuery1);
}
