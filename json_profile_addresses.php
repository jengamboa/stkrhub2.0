<?php
include "connection.php"; // Include your database connection script

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM addresses WHERE user_id = $user_id";
$resultAddresses = $conn->query($sql);

$data = array();

$radioGroupName = 'address_radio'; // Common name for the radio button group

while ($row = $resultAddresses->fetch_assoc()) {
    $radioId = 'address_radio_' . $row['address_id']; // Unique ID for each radio button

    $isChecked = $row['is_default'] == 1 ? 'checked' : ''; // Check if is_default is 1

    $checkbox = '
        <input type="radio" class="address-checkbox" data-address-id="' . $row['address_id'] . '" name="' . $radioGroupName . '" id="' . $radioId . '" ' . $isChecked . '>';

    $address = '
        <p>' . $row['fullname'] . '</p>
        <p>' . $row['number'] . '</p>
        <p>' . $row['region'] . '</p>
        <p>' . $row['province'] . '</p>
        <p>' . $row['city'] . '</p>
        <p>' . $row['barangay'] . '</p>
        <p>' . $row['zip'] . '</p>
        <p>' . $row['street'] . '</p>
        
        
    ';


    $editButton = '<button type="button" class="edit-btn" data-address-id="' . $row['address_id'] . '">Edit</button>';

    $deleteButton = '<button type="button" class="delete-btn" data-address-id="' . $row['address_id'] . '">Delete</button>';



    $data[] = array(
        "checkbox" => $checkbox,
        "address" => $address,
        "editButton" => $editButton,
        "deleteButton" => $deleteButton,

    );
}

echo json_encode($data);
