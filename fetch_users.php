<?php
include "connection.php"; // Include your database connection script

$json = array();

$game_id = $_GET['game_id'];



$json[] = array(
    "component_name" => $component_name,
    "price" => $price,
    "category" => $category,
    "gameID" => $game_id,
);

echo json_encode($json);
?>