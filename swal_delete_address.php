<?php
include "connection.php"; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $addressId = $_POST['addressId'];

    // Prepare and execute an SQL query to delete the address
    $sql = "DELETE FROM addresses WHERE address_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $addressId);

    if ($stmt->execute()) {
        // Address deleted successfully
        echo "Address deleted successfully.";
    } else {
        // Error occurred during deletion
        echo "Error deleting address: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Invalid request method
    echo "Invalid request method.";
}
