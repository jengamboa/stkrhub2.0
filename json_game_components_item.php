<?php
include "connection.php";

$json = array();

// $built_game_id = $_GET['built_game_id'];
$built_game_id = 33;

$sql = "SELECT * FROM built_games_added_game_components WHERE built_game_id = $built_game_id";
$result = $conn->query($sql);

while ($game_components = $result->fetch_assoc()) {
    $added_component_id = $game_components['added_component_id'];
    $component_built_game_id = $game_components['built_game_id'];
    $game_id = $game_components['game_id'];
    $component_id = $game_components['component_id'];
    $is_custom_design = $game_components['is_custom_design'];
    $custom_design_file_path = $game_components['custom_design_file_path'];
    $component_quantity = $game_components['quantity'];
    $color_id = $game_components['color_id'];
    $component_size = $game_components['size'];
    
    $sqlName = "SELECT * FROM game_components WHERE component_id = $component_id";
    $resultName = $conn->query($sqlName);
    while ($fetchedName = $resultName->fetch_assoc()){
        $name = $fetchedName['component_name'];
        $description = $fetchedName['description'];
        $price = $fetchedName['price'];
        $category = $fetchedName['category'];
        $assets = $fetchedName['assets'];
        $has_colors = $fetchedName['has_colors'];
    }

    $component_name = $name;
    $component_category = $category;
    $quantity = $component_quantity;
    $size = $component_size;

    $json[] = array(
        "component_name" => $component_name,
        "component_category" => $component_category,
        "quantity" => $quantity,
        "size" => $size,

    );
}



echo json_encode($json);