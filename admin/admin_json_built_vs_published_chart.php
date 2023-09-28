<?php
include 'connection.php';

$sqlBuiltGames = "SELECT COUNT(built_game_id) AS total_built_games FROM built_games";
$sqlPublishedGames = "SELECT COUNT(published_game_id) AS total_published_games FROM published_built_games";
$resultBuiltGames = $conn->query($sqlBuiltGames);
$resultPublishedGames = $conn->query($sqlPublishedGames);

if ($resultBuiltGames && $resultPublishedGames) {
    $rowBuiltGames = $resultBuiltGames->fetch_assoc();
    $rowPublishedGames = $resultPublishedGames->fetch_assoc();

    $totalBuiltGames = $rowBuiltGames['total_built_games'];
    $totalPublishedGames = $rowPublishedGames['total_published_games'];
}


$data = array(
    array(
        "label" => "totalBuiltGames",
        "value" => $totalBuiltGames
    ),
    array(
        "label" => "totalPublishedGames",
        "value" => $totalPublishedGames
    ),

);

echo json_encode($data);
