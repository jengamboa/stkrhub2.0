<?php
session_start();
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $addressId = $_POST['addressId'];
    $user_id = $_SESSION['user_id'];

    $clearIsDefaultQuery = "UPDATE addresses SET is_default = 0 WHERE user_id = $user_id";
    if ($conn->query($clearIsDefaultQuery)) {

        $setDefault = "UPDATE addresses SET is_default = 1 WHERE address_id = $addressId";
        if ($conn->query($setDefault)) {
            echo json_encode(["success" => true, "message" => "Default address updated."]);
        }
    }

} else {
    // Invalid request method
    echo json_encode(["success" => false, "message" => "Invalid request method."]);
}

$conn->close();
