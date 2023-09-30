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
    $region_name_qry = "SELECT * FROM region WHERE id = $region";
    $region_qry = mysqli_query($conn,$region_name_qry);
    $region_result = mysqli_fetch_assoc($region_qry);
    $region_name = $region_result['region_name'];

    $province = $_POST['province'];
    $province_name_qry = "SELECT * FROM province WHERE id = $province";
    $province_qry = mysqli_query($conn,$province_name_qry);
    $province_result = mysqli_fetch_assoc($province_qry);
    $province_name = $province_result['province_name'];
    


    $city = $_POST['city'];
    $city_name_qry = "SELECT * FROM city WHERE id = $city";
    $city_qry = mysqli_query($conn,$city_name_qry);
    $city_result = mysqli_fetch_assoc($city_qry);
    $city_name = $city_result['city_name'];

    $barangay = $_POST['barangay'];
    $barangay_name_qry = "SELECT * FROM barangay WHERE id = $barangay";
    $barangay_qry = mysqli_query($conn,$barangay_name_qry);
    $barangay_result = mysqli_fetch_assoc($barangay_qry);
    $barangay_name = $barangay_result['barangay_name'];

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
        $region_name,
        $province_name,
        $city_name,
        $barangay_name,
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
