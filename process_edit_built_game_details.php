<?php
include 'connection.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $built_game_id = $_POST['built_game_id'];
    $newName = $_POST['name'];
    $newDescription = $_POST['description'];

    // Validate and sanitize input data as needed

    // Perform database update
    $sqlUpdateBuiltGame = "UPDATE built_games SET name = '$newName', description = '$newDescription' WHERE built_game_id = $built_game_id";
    
    if ($conn->query($sqlUpdateBuiltGame)) {
        $response = ["success" => true, "message" => "Game updated successfully"];
    } else {
        $response = ["success" => false, "message" => "Database error: " . $conn->error];
    }
    
    echo json_encode($response);
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}
?>
