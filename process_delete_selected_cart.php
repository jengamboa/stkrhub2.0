<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the 'cartIds' array from the POST data
    $cartIds = $_POST['cartIds'];

    if (!empty($cartIds)) {
        $cartIds = array_map('intval', $cartIds); // Sanitize input

        // Use a prepared statement to update the 'is_visible' column
        $sql = "DELETE FROM cart WHERE cart_id IN (" . implode(',', $cartIds) . ")";


        if ($conn->query($sql)) {
            $response = ["success" => true, "message" => "Items marked as invisible successfully"];
        } else {
            $response = ["success" => false, "message" => "Error updating items: " . $conn->error];
        }
    } else {
        $response = ["success" => false, "message" => "No items selected for update"];
    }
} else {
    $response = ["success" => false, "message" => "Invalid request method"];
}

echo json_encode($response);
?>
