<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }

    date_default_timezone_set('Asia/Manila');
    
    $name = $_POST["name"];
    $description = $_POST["description"];
    $currentTimestamp = date('Y-m-d H:i:s');

    $sqlCreateGame = "INSERT INTO games (name, description, user_id, date_modified) VALUES ('$name', '$description', '$user_id', '$currentTimestamp')";
    
    if ($conn->query($sqlCreateGame)) {
        
        $response = ["success" => true, "message" => "Game created successfully"];
        echo json_encode($response);
    } else {
        
        $response = ["success" => false, "message" => "Database error: " . $conn->error];
        echo json_encode($response);
    }
} else {
    
    $response = ["success" => false, "message" => "Invalid request method"];
    echo json_encode($response);
}
?>
