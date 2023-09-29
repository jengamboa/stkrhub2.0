<?php
include "connection.php";

// Query to find users with the most published games
$sqlUsers = "SELECT creator_id, COUNT(DISTINCT published_game_id) AS game_count
             FROM published_built_games
             GROUP BY creator_id
             ORDER BY game_count DESC";

$resultUsers = $conn->query($sqlUsers);

$data = array();

while ($row = $resultUsers->fetch_assoc()) {
    $creator_id = $row['creator_id'];
    $gameCount = $row['game_count'];


    $sqlCreator = "SELECT * FROM users WHERE user_id = $creator_id";
    $queryCreator = $conn->query($sqlCreator);
    while ($fetchedCreator = $queryCreator->fetch_assoc()) {
        $username = $fetchedCreator['username'];
        $avatar = $fetchedCreator['avatar'];
    }


    $avatar = $creator_id;


    $data[] = array(
        "avatar" => $avatar,
        "name" => $username,
        "game_count" => $gameCount,
    );
}

echo json_encode($data);
