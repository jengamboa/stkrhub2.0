<?php
include 'connection.php';

if (isset($_POST['update'])) {
    $published_game_id = $_POST['published_game_id'];
    $built_game_id = $_POST['built_game_id'];
    $game_name = $_POST['game_name'];
    $edition = $_POST['edition'];
    $min_players = $_POST['min_players'];
    $max_players = $_POST['max_players'];
    $min_playtime = $_POST['min_playtime'];
    $max_playtime = $_POST['max_playtime'];
    $age_id = $_POST['age'];
    $short_description = $_POST['short_description'];
    $long_description = $_POST['long_description'];
    $website = $_POST['website'];

    // Update the data in the published_built_games table
    $updateQuery = "UPDATE published_built_games SET
                    game_name = '$game_name',
                    edition = '$edition',
                    min_players = '$min_players',
                    max_players = '$max_players',
                    min_playtime = '$min_playtime',
                    max_playtime = '$max_playtime',
                    age_id = '$age_id',
                    short_description = '$short_description',
                    long_description = '$long_description',
                    website = '$website'
                    WHERE published_game_id = '$published_game_id'";

    if (mysqli_query($conn, $updateQuery)) {
        echo 'Game updated successfully';
    } else {
        echo 'Error updating game: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>