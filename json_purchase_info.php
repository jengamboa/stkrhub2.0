<?php
include "connection.php";

$json = array();

$user_id = $_POST['user_id'];
$selectedCartIds = $_POST['selectedCartIds'];

$selectedCartIdsString = implode(',', $selectedCartIds);

$sql = "SELECT * FROM cart WHERE user_id = $user_id AND cart_id IN ($selectedCartIdsString)";
$result = $conn->query($sql);

$sub_total = 0;

while ($fetched = $result->fetch_assoc()) {
    $cart_id = $fetched['cart_id'];
    $published_game_id = $fetched['published_game_id'];
    $built_game_id = $fetched['built_game_id'];
    $added_component_id = $fetched['added_component_id'];
    $quantity = $fetched['quantity'];
    $price = $fetched['price'];
    $is_active = $fetched['is_active'];

    $sub_total += $price * $quantity;
}

$sub_total = '<h6>' . $sub_total . '</h6>';


$sqlGetActive = "SELECT * FROM addresses WHERE is_default = 1";
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
}

$chosen_address = '
<p class="card-text text-muted">
' . $region . ' | ' . $province . ' | ' . $city . ' | ' . $barangay . ' | ' . $zip . ' | ' . $street . '
</p>
';


$shipping = 'P shipping';
$total_payment = 'P total_payment';

$json[] = array(
    "sub_total" => $sub_total,
    "chosen_address" => $chosen_address,
    "shipping" => $shipping,
    "total_payment" => $total_payment,
);

echo json_encode($json);
