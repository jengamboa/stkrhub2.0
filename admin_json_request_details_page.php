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

    $sqlBuiltGames = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
    $resultBuiltGames = $conn->query($sqlBuiltGames);
    while ($fetchedBuiltGames = $resultBuiltGames->fetch_assoc()) {
        $game_id = $fetchedBuiltGames['game_id'];
        $name = $fetchedBuiltGames['name'];
        $description = $fetchedBuiltGames['description'];
        $build_date = $fetchedBuiltGames['build_date'];
        $price = $fetchedBuiltGames['price'];
    }


    $game_link = '
        <a href="admin_view_has_pending_details_request_page.php?built_game_id=' . $built_game_id . '">' . $name . '</a>
    ';

    $status = 'Has Publishing Request';

    $actions = '
    <a href="admin_view_has_pending_details_request_page.php?built_game_id=' . $built_game_id . '">View</a>
    ';

    $data[] = array(
        "game_link" => $game_link,
        "category" => $category,
        "edition" => $edition,
        "creator_id" => $creator_id,
        "status" => $status,
        "actions" => $actions,
    );
}

echo json_encode($data);
