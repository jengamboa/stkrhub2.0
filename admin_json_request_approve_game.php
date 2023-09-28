<?php
include "connection.php";


$sqlGames = "SELECT * FROM games WHERE to_approve = 1";
$resultGames = $conn->query($sqlGames);

$data = array();

while ($fetchedGames = $resultGames->fetch_assoc()) {
    $game_id = $fetchedGames['game_id'];
    $name = $fetchedGames['name'];
    $description = $fetchedGames['description'];
    $user_id = $fetchedGames['user_id'];
    $created_at = $fetchedGames['created_at'];
    $is_built = $fetchedGames['is_built'];
    $is_pending = $fetchedGames['is_pending'];
    $to_approve = $fetchedGames['to_approve'];
    $is_denied = $fetchedGames['is_denied'];
    $is_approved = $fetchedGames['is_approved'];



    $game_link = '
        <a href="admin_view_has_pending_approve_games.php?game_id=' . $game_id . '">' . $name . '</a>
    ';

    $status = 'Has Approve Request';

    $actions = '
        <a href="admin_view_has_pending_approve_games.php?game_id=' . $game_id . '">View</a>
    ';

    $data[] = array(
        "game_link" => $game_link,
        "creator_id" => $user_id,
        "status" => $status,
        "actions" => $actions,
    );
}

echo json_encode($data);
