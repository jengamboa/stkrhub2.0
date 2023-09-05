<?php
include "connection.php";

$data = array();

$sql = "SELECT * FROM published_built_games";
$result = $conn->query($sql);

while ($published_built_games = $result->fetch_assoc()) {

    $published_game_id = $published_built_games['published_game_id'];
    $game_name = $published_built_games['game_name'];
    $image = $published_built_games['logo_path'];
    $marketplace_price = $published_built_games['marketplace_price'];

    $data[] = array(
        "published_game_id" => $published_game_id,
        "game_name" => $game_name,
        "image" => $image,
        "marketplace_price" => $marketplace_price,
    );

}
echo json_encode($data);
?>

