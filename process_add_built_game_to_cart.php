<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $built_game_id = $_POST['built_game_id'];
    $user_id = $_POST['user_id'];

    echo $user_id.'<br>';
    echo $built_game_id .'<br>';


    $sql = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
    $query = $conn->query($sql);
    while ($fetched = $query->fetch_assoc()) {
        $game_id = $fetched['game_id'];
        $name = $fetched['name'];
        $creator_id = $fetched['creator_id'];
        $price = $fetched['price'];
    }

    echo $game_id .'<br>';
    echo $name .'<br>';
    echo $creator_id .'<br>';
    echo $price .'<br>';


    // Insert data into the cart table
    $insert_query = "INSERT INTO cart (user_id, game_id, built_game_id, quantity, price) 
    VALUES ('$user_id', '$game_id', '$built_game_id', 1, '$price')";

    if (mysqli_query($conn, $insert_query)) {
        echo 'sucessfully inserted';

        $sqlUpdateBuilt = "UPDATE built_games SET is_at_cart = 1 WHERE built_game_id = $built_game_id";
        $conn->query($sqlUpdateBuilt);
    }
}
