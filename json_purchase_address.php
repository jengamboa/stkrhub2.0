<?php
include "connection.php";

$user_id = $_GET['user_id'];
$data = array();


$sqlGetActive = "SELECT * FROM addresses WHERE is_default = 1 AND user_id = $user_id";
$queryGetActive = $conn->query($sqlGetActive);
while ($fetchedActive = $queryGetActive->fetch_assoc()) {
    $address_id = $fetchedActive['address_id'];
    $fullname = $fetchedActive['fullname'];
    $number = $fetchedActive['number'];
    $region = $fetchedActive['region'];
    $province = $fetchedActive['province'];
    $city = $fetchedActive['city'];
    $barangay = $fetchedActive['barangay'];
    $zip = $fetchedActive['zip'];
    $street = $fetchedActive['street'];


    $full_address_value = '
    ' . $street . '  ' . $barangay . '  ' . $city . '  ' . $barangay . '  ' . $province . '  ' . $region . '  ' . $zip . ' 
    ';

    $status = '<span class="p-1 m-2" style="border: 2px solid #b660e8; color: #b660e8; border-radius: 7px;">Default</span>';

    $actions = '
    <span class="p-1 m-2" id="change_address"
    style="border: 2px solid ##16162a; color: white; background-color: #16162a; border-radius: 7px; cursor: pointer"
    >
        Change
    </span>
    ';

    // item
    $item = '
    <div class="row">
        <div class="col-2">' . $fullname . ' ' . $number . '</div>

        <div class="col-8">' . $full_address_value . '</div>

        <div class="col">'.$status.' '.$actions.'</div>
    </div>

    ';


    $data[] = array(
        "item" => $item,
    );
}

echo json_encode($data);
