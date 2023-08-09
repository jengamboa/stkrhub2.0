<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_id']) && isset($_POST['quantity'])) {
    $cartId = $_POST['cart_id'];
    $newQuantity = intval($_POST['quantity']); // Convert to integer
    
    // Update the cart table with the new quantity
    $updateQuery = "UPDATE cart SET quantity = $newQuantity WHERE cart_id = $cartId";
    
    if (mysqli_query($conn, $updateQuery)) {
        echo 'Quantity updated successfully';
    } else {
        echo 'Error updating quantity: ' . mysqli_error($conn);
    }
} else {
    echo 'Invalid request';
}
?>
