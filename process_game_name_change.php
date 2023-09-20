<?php
header('Content-Type: application/json');

include 'connection.php';

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_id']) && isset($_POST['game_name'])) {
    $gameId = $_POST['game_id'];
    $updatedGameName = $_POST['game_name'];

    // Update the game name in the database (replace with your database code)
    $sql = "UPDATE games SET name = ? WHERE game_id = ?"; // Adjust the table and column names as needed
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $updatedGameName, $gameId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
        
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating game name: ' . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
}
?>

