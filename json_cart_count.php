<?php
include "connection.php";

$user_id = $_GET['user_id'];
$data = array();


// SQL query to count the records in the cart table for the given user ID
$sql = "SELECT COUNT(cart_id) AS cart_count FROM cart WHERE user_id = $user_id AND is_visible = 1";

// Execute the SQL query
$result = $conn->query($sql);

if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    $cart_count = $row['cart_count'];

    $conn->close();
}

$item = '
<span class="cart-icon">
    <i class="fas fa-shopping-cart" style="font-size: 20px;"></i>
</span>
'.$cart_count.'
';

$data[] = array(
    "cart_count" => $item,

);


echo json_encode($data);
