<?php
include "connection.php"; // Include your database connection script

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM addresses WHERE user_id = $user_id";
$resultAddresses = $conn->query($sql);

$data = array();

while ($row = $resultAddresses->fetch_assoc()) {
    $checkbox = '<input type="checkbox" class="address-checkbox" data-address-id="' . $row['address_id'] . '">';

    $address = $row['fullname'] . ', ' . $row['number'] . ', ' . $row['street'] . ', ' . $row['barangay'] . ', ' . $row['city'];

    $editButton = '<button type="button" class="edit-btn">Edit</button>';

    $data[] = array(
        "checkbox" => $checkbox,
        "address" => $address,
        "editButton" => $editButton,
    );
}

echo json_encode($data);

$conn->close();
