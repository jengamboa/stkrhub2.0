<?php
include "connection.php";

$json = array();

$game_id = $_GET['game_id'];
// Now you can use $game_id in your PHP script


$sql = "SELECT * FROM game_components";
$result = $conn->query($sql);

while ($fetched = $result->fetch_assoc()) {
    $component_id = $fetched['component_id'];
    $component_name = $fetched['component_name'];
    $description = $fetched['description'];
    $price = $fetched['price'];

    $real_category = $fetched['category'];
    $category = str_replace(' ', '', $real_category);

    $assets = $fetched['assets'];
    $has_colors = $fetched['has_colors'];
    $size = $fetched['size'];

    $getThumbnail = "SELECT * FROM component_assets WHERE component_id = $component_id AND is_thumbnail = 1";
    $queryThumbnail = $conn->query($getThumbnail);
    while ($fetchedThumbnail = $queryThumbnail->fetch_assoc()) {
        $asset_id = $fetchedThumbnail['asset_id'];
        $asset_path = $fetchedThumbnail['asset_path'];
        $is_thumbnail = $fetchedThumbnail['is_thumbnail'];
    }

    $thumbnail = $asset_path;




    $json[] = array(
        "component_id" => $component_id,
        "category" => $category,
        "real_category" => $real_category,
        "title" => $component_name,
        "size" => $size,
        "description" => $description,
        "price" => $price,
        "thumbnail" => $thumbnail,
    );
}

// Encode the data as JSON and send it to the client
header('Content-Type: application/json');
echo json_encode($json);
