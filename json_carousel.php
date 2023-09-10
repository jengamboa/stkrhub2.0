<?php
// json_carousel.php

// Replace this with your actual data retrieval logic
$data = [
  ["image_url" => "img/16x9.jpg"],
  ["image_url" => "img/16x9.jpg"],
  // Add more data as needed
];

// Send the data as a JSON response
header("Content-Type: application/json");
echo json_encode($data);
?>
