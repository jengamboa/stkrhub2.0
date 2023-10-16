<?php
include "connection.php"; 

$json = array();

$built_game_id = $_GET['built_game_id'];
$creator_id = $_GET['creator_id'];

$sql = "SELECT * FROM built_games_added_game_components WHERE built_game_id = $built_game_id";
$result = $conn->query($sql);

while ($added_game_components = $result->fetch_assoc()) {
    $added_component_id = $added_game_components['added_component_id'];
    $game_id = $added_game_components['game_id'];
    $component_id = $added_game_components['component_id'];
    $is_custom_design = $added_game_components['is_custom_design'];
    $custom_design_file_path = $added_game_components['custom_design_file_path'];
    $quantity = $added_game_components['quantity'];
    $color_id = $added_game_components['color_id'];
    $size = $added_game_components['size'];

    $sqlGetComponentName = "SELECT * FROM game_components WHERE component_id = $component_id";
    $queryGetComponentName = $conn->query($sqlGetComponentName);
    while ($fetched = $queryGetComponentName->fetch_assoc()) {
        $component_name = $fetched['component_name'];
        $description = $fetched['description'];
        $price = $fetched['price'];
        $category = $fetched['category'];
        $assets = $fetched['assets'];
        $has_colors = $fetched['has_colors'];
        $is_upload_only = $fetched['is_upload_only'];
        $fetched_size = $fetched['size'];
    }


    $individual_price = $price * $quantity;

    $info = "";
    if ($custom_design_file_path) {
        $info_mahaba = basename($custom_design_file_path);

        // Assuming the path is something like 'uploads/64ef3ead1c307_nicole.jpg'
        $filenameParts = explode('_', $info_mahaba);
        $originalFilename = end($filenameParts);

        // Create a link to the image file
        $imageFilePath = $custom_design_file_path;
        $info = '<a href="' . $imageFilePath . '" target="_blank">' . $originalFilename . '</a>';
    } elseif ($color_id) {
        $getColorName = "SELECT * FROM component_colors WHERE color_id = $color_id";
        $sqlGetColorName = $conn->query($getColorName);
        $fetchedColorName = $sqlGetColorName->fetch_assoc();
        $color_name = $fetchedColorName['color_name'];
        $color_code = $fetchedColorName['color_code'];

        $info = '
            <p
                style="color: ' . $color_code . ' ;"
            >
                ' . $color_name . '
            </p>
        ';
    } else {
        $info = "N/A";
    }




    $json[] = array(
        "component_name" => $component_name,
        "category" => $category,
        "price" => $price,
        "quantity" => $quantity,
        "individual_price" => $individual_price,
        "info" => $info,
    );
}



echo json_encode($json);
