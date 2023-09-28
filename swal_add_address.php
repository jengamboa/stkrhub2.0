<?php
session_start();

include "connection.php"; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_SESSION['user_id']))
        $user_id = $_SESSION['user_id'];


    // Get the data sent via POST request
    $fullname = $_POST['fullname'];
    $number = $_POST['number'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $zip = $_POST['zip'];
    $street = $_POST['street'];


    // Check if there is no address associated with the user
    $checkAddressQuery = "SELECT address_id FROM addresses WHERE user_id = $user_id LIMIT 1";
    $checkResult = $conn->query($checkAddressQuery);
    if ($checkResult->num_rows === 0) {

        // Prepare and execute an SQL query to insert the new address
        $sql = "INSERT INTO addresses (user_id, fullname, number, region, province, city, barangay, zip, street, is_default, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1, NOW())";

    } else {
        // Prepare and execute an SQL query to insert the new address
        $sql = "INSERT INTO addresses (user_id, fullname, number, region, province, city, barangay, zip, street, is_default, created_at)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 0, NOW())";
    }






    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "issssssss",
        $user_id, // You'll need to provide the user_id
        $fullname,
        $number,
        $region,
        $province,
        $city,
        $barangay,
        $zip,
        $street
    );

    if ($stmt->execute()) {
        // Address added successfully
        echo "success";
    } else {
        // Error occurred while adding the address
        echo "error";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    // Invalid request method
    echo "Invalid request method.";
}
