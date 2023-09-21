<?php
include 'connection.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $built_game_id = $_POST['built_game_id'];

    // Fetch the current game details from the database
    $sqlGetBuiltGameDetails = "SELECT name, description FROM built_games WHERE built_game_id = $built_game_id";
    $result = $conn->query($sqlGetBuiltGameDetails);

    if ($result) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $description = $row['description'];

        // Return the current game details as a JSON response
        $response = [
            'success' => true,
            'name' => $name,
            'description' => $description
        ];
        echo json_encode($response);
    } else {
        // Handle database error
        $response = [
            'success' => false,
            'message' => 'Database error: ' . $conn->error
        ];
        echo json_encode($response);
    }
} else {
    // Handle invalid request method
    $response = [
        'success' => false,
        'message' => 'Invalid request method'
    ];
    echo json_encode($response);
}
?>
