<?php
include "connection.php";


$sqlGames = "SELECT * FROM pending_published_built_games";
$resultGames = $conn->query($sqlGames);

$data = array();

while ($fetchedGames = $resultGames->fetch_assoc()) {
    $pending_published_built_game_id = $fetchedGames['pending_published_built_game_id'];
    $built_game_id = $fetchedGames['built_game_id'];
    $game_name = $fetchedGames['game_name'];
    $category = $fetchedGames['category'];
    $edition = $fetchedGames['edition'];
    $published_date = $fetchedGames['published_date'];
    $creator_id = $fetchedGames['creator_id'];
    $age_id = $fetchedGames['age_id'];
    $short_description = $fetchedGames['short_description'];
    $long_description = $fetchedGames['long_description'];
    $website = $fetchedGames['website'];
    $logo_path = $fetchedGames['logo_path'];
    $min_players = $fetchedGames['min_players'];
    $max_players = $fetchedGames['max_players'];
    $min_playtime = $fetchedGames['min_playtime'];
    $max_playtime = $fetchedGames['max_playtime'];
    $has_pending_update = $fetchedGames['has_pending_update'];
    $desired_markup = $fetchedGames['desired_markup'];
    $manufacturer_profit = $fetchedGames['manufacturer_profit'];
    $creator_profit = $fetchedGames['creator_profit'];
    $marketplace_price = $fetchedGames['marketplace_price'];




    $data[] = array(
        "game_link" => $game_link,
        "description" => $description,
        "total_price" => $total_price,
        "formatted_date" => $formatted_date,
        "build" => $build,
        "edit" => $edit,

    );
}

echo json_encode($data);
