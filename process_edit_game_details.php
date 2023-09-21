<?php
include 'connection.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $game_id = $_POST['game_id'];
    $newName = $_POST['name'];
    $newDescription = $_POST['description'];

    // Validate and sanitize input data as needed

    // Perform database update
    $sqlUpdateGame = "UPDATE games SET name = '$newName', description = '$newDescription' WHERE game_id = $game_id";
    
    if ($conn->query($sqlUpdateGame)) {
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
