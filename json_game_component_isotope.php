<?php
include "connection.php";

$json = array();

$sql = "SELECT * FROM game_components";
$result = $conn->query($sql);

while ($fetched = $result->fetch_assoc()) {
    $component_id = $fetched['component_id'];
    $component_name = $fetched['component_name'];
    $description = $fetched['description'];
    $price = $fetched['price'];

    $category = $fetched['category'];
    $category = str_replace(' ', '', $category);

    $assets = $fetched['assets'];
    $has_colors = $fetched['has_colors'];
    $size = $fetched['size'];

    



    $json[] = array(
        "category" => $category, 
        "title" => $component_name, 
        "size" => $size, 
        "price" => $price, 
    );
}

// Encode the data as JSON and send it to the client
header('Content-Type: application/json');
echo json_encode($json);
