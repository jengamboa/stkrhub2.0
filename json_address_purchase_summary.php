<?php
include "connection.php"; // Include your database connection script

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM addresses WHERE user_id = $user_id";
$resultAddresses = $conn->query($sql);

$data = array();

$radioGroupName = 'address_radio'; // Common name for the radio button group

while ($row = $resultAddresses->fetch_assoc()) {
    $radioId = 'address_radio_' . $row['address_id']; // Unique ID for each radio button

    $fullname = $row['fullname'];
    $number = $row['number'];
    $region = $row['region'];
    $province = $row['province'];
    $city = $row['city'];
    $barangay = $row['barangay'];
    $zip = $row['zip'];
    $street = $row['street'];
    $is_default = $row['is_default'];



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

    if ($is_default == 1) {
        $deleteButton = '
            
        ';
    } else {
        $deleteButton = '
            <button type="button" class="delete-btn" data-address-id="' . $row['address_id'] . '">Delete</button>
        ';
    }


    $actions = $editButton . $deleteButton;
    

    $item = '
    <div class="card border border-primary shadow-0 ">';
    
    if ($is_default == 1) {
        $item .= '
        <div class="card-header">
            Default
        </div>';
    } else {
        $item .= '';
    }
    
    $item .= '
        <div class="card-body">
            <div class="row">
                <div class="col" style="display:flex; justify-content: flex-start;">
                    <h5 class="card-title">' . $fullname . ' - ' . $number . '</h5>
                </div>
                <div class="col" style="display:flex; justify-content: flex-end;">
                    <div>
                        <input class="form-check-input radio-chosen" type="radio" name="radioNoLabel" id="radioNoLabel1" value="" data-address-id='.$row['address_id'].'
                        ' . ($is_default == 1 ? 'checked' : '') . '>
                    </div>
                </div>
            </div>
            <p class="card-text text-muted">
                ' . $region . ' | ' . $province . ' | ' . $city . ' | ' . $barangay . ' | ' . $zip . ' | ' . $street . '
            </p>
            ' . $actions . '
        </div>
    </div>';
    

    $data[] = array(
        "item" => $item,
    );
}

echo json_encode($data);
