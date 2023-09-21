<?php
session_start();
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    }
    
    $name = $_POST["name"];
    $description = $_POST["description"];
    
    $user_id = 3;

    $sqlCreateGame = "INSERT INTO games (name, description, user_id) VALUES ('$name', '$description', '$user_id')";
    
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
