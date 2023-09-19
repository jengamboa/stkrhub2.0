<?php
session_start();
include "connection.php"; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $addressId = $_POST['addressId'];
    $user_id = $_SESSION['user_id']; // Replace with your user authentication logic

    // First, set is_default to 0 for all addresses of the user
    $sqlResetDefault = "UPDATE addresses SET is_default = 0 WHERE user_id = $user_id";
    $conn->query($sqlResetDefault);

    // Then, set is_default to 1 for the selected address
    $sqlSetDefault = "UPDATE addresses SET is_default = 1 WHERE address_id = $addressId";
    if ($conn->query($sqlSetDefault) === TRUE) {
        // Successfully updated the default address
        echo json_encode(["success" => true, "message" => "Default address updated."]);
    } else {
        // Error while updating
        echo json_encode(["success" => false, "message" => "Error updating default address."]);
    }
} else {
    // Invalid request method
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}

$conn->close();
