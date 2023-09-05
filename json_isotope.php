<?php
// Simulate generating JSON data dynamically
$data = array(
    "items" => array(
        array(
            "name" => "Item 1",
            "category" => "filter-class1"
        ),
        array(
            "name" => "Item 2",
            "category" => "filter-class2"
        ),
        array(
            "name" => "Item 3",
            "category" => "filter-class1"
        ),
        // Add more items as needed
    ),
    "buttons" => array(
        array(
            "text" => "All",
            "filter" => "*"
        ),
        array(
            "text" => "Category 1",
            "filter" => ".filter-class1"
        ),
        array(
            "text" => "Category 2",
            "filter" => ".filter-class2"
        )
        // Add more buttons as needed
    )
);

// Set the response content type to JSON
header("Content-Type: application/json");

// Encode the data as JSON and send it as the response
echo json_encode($data);
?>
