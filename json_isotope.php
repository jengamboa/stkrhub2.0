<?php
// Your PHP logic to fetch and process data
$data = array(
    array("id" => 1, "name" => "Item 1", "category" => "category1", "image" => "image1.jpg"),
    array("id" => 2, "name" => "Item 2", "category" => "category2", "image" => "image2.jpg"),
    // Add more data here
);

header('Content-Type: application/json');
echo json_encode($data);
?>
