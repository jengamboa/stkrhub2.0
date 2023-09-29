<?php
include "connection.php";

// Query to find game pieces
$sql = "SELECT * FROM game_components WHERE category = 'game piece'";
$result = $conn->query($sql);

$data = array();
while ($row = $result->fetch_assoc()) {
    $component_id = $row['component_id'];
    $name = $row['component_name'];
    $description = $row['description'];
    $price = $row['price'];
    $size = $row['size'];

    $actions = '
    <a href="edit_game_components.php" data-component_id="'.$component_id.'">Edit</a>
    ';

    $data[] = array(
        "name" => $name,
        "description" => $description,
        "price" => $price,
        "size" => $size,
        "actions" => $actions,
    );
}

echo json_encode($data);
