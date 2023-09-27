<?php
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cart_id']) && isset($_POST['quantity'])) {
    $cart_id = $_POST['cart_id'];
    $quantity = $_POST['quantity'];

    // Update the quantity in the "cart" table
    $update_query = "UPDATE cart SET quantity = '$quantity' WHERE cart_id = '$cart_id'";

    if (mysqli_query($conn, $update_query)) {
        echo "Quantity updated successfully";
    } else {
        echo "Error updating quantity: " . mysqli_error($conn);
    }
}
?>
