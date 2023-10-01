<?php
include "connection.php";

$user_id = $_GET['user_id'];
$data = array();


// SQL query to count the records in the cart table for the given user ID
$sql = "SELECT COUNT(cart_id) AS cart_count FROM cart WHERE user_id = $user_id";

// Execute the SQL query
$result = $conn->query($sql);

if ($result) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();

    $cart_count = $row['cart_count'];

    $conn->close();
}


$data[] = array(
    "cart_count" => $cart_count,

);


echo json_encode($data);
