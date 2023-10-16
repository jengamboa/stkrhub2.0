<?php
include "connection.php";

$json = array();

$user_id = $_POST['user_id'];
$selectedCartIds = $_POST['selectedCartIds'];

// Count the number of cart IDs
$numSelectedCarts = count($selectedCartIds);

$selectedCartIdsString = implode(',', $selectedCartIds);

$sql = "SELECT * FROM cart WHERE user_id = $user_id AND cart_id IN ($selectedCartIdsString) AND is_visible = 1";
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

    (int)$sub_total += $price * $quantity;
}



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




    $chosen_address = '
    <p class="card-text text-muted">
    ' . $region . ' | ' . $province . ' | ' . $city . ' | ' . $barangay . ' | ' . $zip . ' | ' . $street . '
    </p>
    ';

    // Initialize $destination_id with a default value
    $destination_id = 0;

    // Check if the inner query has any results before entering the nested loop
    $sqlCheckDestination = "SELECT * FROM destination_rates WHERE destination_name = '$region'";
    $queryCheckDestination = $conn->query($sqlCheckDestination);
    if ($queryCheckDestination->num_rows > 0) {
        // Fetch the results from the inner query
        $fetchedDestination = $queryCheckDestination->fetch_assoc();

        $destination_id = $fetchedDestination['destination_id'];
        $weight_price_1 = $fetchedDestination['weight_price_1'];
        $weight_price_2 = $fetchedDestination['weight_price_2'];
        $weight_price_3 = $fetchedDestination['weight_price_3'];
        $weight_price_4 = $fetchedDestination['weight_price_4'];
        $weight_price_5 = $fetchedDestination['weight_price_5'];
    }

    $numSelectedCarts = count($selectedCartIds);
    // Initialize variables
    $weight_price = 0;

    if ($numSelectedCarts >= 1 && $numSelectedCarts <= 10) {
        $weight_price = (float)$weight_price_1;
    } elseif ($numSelectedCarts >= 11 && $numSelectedCarts <= 20) {
        $weight_price = (float)$weight_price_2;
    } elseif ($numSelectedCarts >= 21 && $numSelectedCarts <= 30) {
        $weight_price = (float)$weight_price_3;
    } elseif ($numSelectedCarts >= 31 && $numSelectedCarts <= 40) {
        $weight_price = (float)$weight_price_4;
    } elseif ($numSelectedCarts >= 41) {
        $weight_price = (float)$weight_price_5;
    }


    $shipping = 'Shipping: ' . $weight_price;
    $total_payment = ($sub_total + $weight_price);



    $item1 = '
    <div class="row">
        <div class="col">' . $sub_total . '</div>
        <div class="col">' . $chosen_address . '</div>
        <div class="col">' . $shipping . '</div>
        <div class="col">' . $total_payment . '</div>
    </div>
    ';

    $item2 = '
        <button id="purchase_payment" 
        data-fullname="' . $fullname . '"
        data-number="' . $number . '"
        data-region="' . $region . '"
        data-province="' . $province . '"
        data-city="' . $city . '"
        data-barangay="' . $barangay . '"
        data-zip="' . $zip . '"
        data-street="' . $street . '"
        data-total_payment="' . $total_payment . '"
        data-carts_selected="' . implode(',', $selectedCartIds) . '"
        >Buy Paypal</button>
    ';



    $json[] = array(
        "item1" => $item1,
        "item2" => $item2,
    );
}

echo json_encode($json);
