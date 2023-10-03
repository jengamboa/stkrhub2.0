<?php
include "../connection.php";

// Query to get the most frequent published_game_id to less frequent published_game_id
$sqlGames = "SELECT published_game_id, COUNT(*) AS frequency
             FROM orders
             WHERE is_pending != 1
             GROUP BY published_game_id
             ORDER BY frequency ASC";

$resultGames = $conn->query($sqlGames);

$data = array();

while ($row = $resultGames->fetch_assoc()) {
    $published_game_id = $row['published_game_id'];
    $frequency = $row['frequency']; 

    $sqlPublished = "SELECT * FROM published_built_games WHERE published_game_id = $published_game_id";
    $queryPublished = $conn->query($sqlPublished);
    while ($fetchedPublished = $queryPublished->fetch_assoc()) {
        $built_game_id = $fetchedPublished['built_game_id'];
        $game_name = $fetchedPublished['game_name'];
        $category = $fetchedPublished['category'];
        $published_date = $fetchedPublished['published_date'];
        $creator_id = $fetchedPublished['creator_id'];
        $logo_path = $fetchedPublished['logo_path'];
        $desired_markup = $fetchedPublished['desired_markup'];
        $manufacturer_profit = $fetchedPublished['manufacturer_profit'];
        $creator_profit = $fetchedPublished['creator_profit'];
        $marketplace_price = $fetchedPublished['marketplace_price'];
        $is_hidden = $fetchedPublished['is_hidden'];
    }

    $title = $game_name;

    $sqlCreator = "SELECT * FROM users WHERE user_id = $creator_id";
    $queryCreator = $conn->query($sqlCreator);
    while ($fetchedCreator = $queryCreator->fetch_assoc()) {
        $username = $fetchedCreator['username'];
        $avatar = $fetchedCreator['avatar'];
    }
    
    $creator = $username;

    if($is_hidden){
        $status = 'hidden';
    } else {
        $status = 'visible';
    }

    $actions = '
        <button type="button" class="btn btn-primary">View</button>
    ';

    
    $data[] = array(
        "title" => $title,
        "category" => $category,
        "price" => $marketplace_price,
        "creator" => $creator,
        "status" => $status,
        "frequency" => $frequency,
    );
}

echo json_encode($data);
?>
