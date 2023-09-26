<?php
include "connection.php";


$sqlGames = "SELECT * FROM pending_update_published_built_games";
$resultGames = $conn->query($sqlGames);

$data = array();

while ($fetchedGames = $resultGames->fetch_assoc()) {

    $pending_update_published_built_games_id = $fetchedGames['pending_update_published_built_games_id'];
    $published_built_game_id = $fetchedGames['published_built_game_id'];
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

    $desired_markup = $fetchedGames['desired_markup'];
    $manufacturer_profit = $fetchedGames['manufacturer_profit'];
    $creator_profit = $fetchedGames['creator_profit'];
    $marketplace_price = $fetchedGames['marketplace_price'];

    $sqlPublishedGames = "SELECT * FROM published_built_games WHERE published_game_id = $published_built_game_id";
    $resultPublishedGames = $conn->query($sqlPublishedGames);
    while ($fetchedPublishedGames = $resultPublishedGames->fetch_assoc()) {

        $fpub_published_game_id = $fetchedPublishedGames['published_game_id'];
        $fpub_built_game_id = $fetchedPublishedGames['built_game_id'];
        $fpub_game_name = $fetchedPublishedGames['game_name'];
        $fpub_category = $fetchedPublishedGames['category'];
        $fpub_edition = $fetchedPublishedGames['edition'];
    }


    $game_link = '
        <a href="admin_view_has_pending_update_request_page.php?published_built_game_id=' . $published_built_game_id . '">' . $fpub_game_name . '</a>
    ';

    $status = 'Has Update Request';

    $actions = '
        <a href="admin_view_has_pending_update_request_page.php?published_built_game_id=' . $published_built_game_id . '">View</a>
    ';

    $data[] = array(
        "game_link" => $game_link,
        "category" => $fpub_category,
        "edition" => $fpub_edition,
        "creator_id" => $creator_id,
        "status" => $status,
        "actions" => $actions,
    );
}

echo json_encode($data);
