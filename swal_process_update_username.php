<?php
include "connection.php"; // Include your database connection script

// Check if the user_id and new_username are provided
if (isset($_POST['user_id']) && isset($_POST['new_username'])) {
    $user_id = $_POST['user_id'];
    $new_username = $_POST['new_username'];

    // Sanitize and escape the variables (basic protection against SQL injection)
    $user_id = intval($user_id);
    $new_username = $conn->real_escape_string($new_username);

    // Update the username using a simple query
    $sql = "UPDATE users SET username = '$new_username' WHERE user_id = $user_id";

    if ($conn->query($sql) === TRUE) {
        // Username updated successfully
        echo json_encode(["success" => true]);
    } else {
        // Error updating username
        echo json_encode(["error" => "Error updating username: " . $conn->error]);
    }
} else {
    // Invalid parameters
    echo json_encode(["error" => "Invalid parameters"]);
}

// Close the database connection
$conn->close();
?>
