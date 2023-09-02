<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel'])) {
    $order_id = $_POST['order_id'];

    // Update the order to set is_pending to 0 and is_cancel to 1 only if it's pending
    $updateOrderQuery = "UPDATE orders 
                         SET is_pending = 0, is_canceled = 1 
                         WHERE order_id = $order_id AND is_pending = 1";

    if (mysqli_query($conn, $updateOrderQuery)) {
        echo "Order ID $order_id has been canceled.";
    } else {
        echo "Error updating the order: " . mysqli_error($conn);
    }
} else {
    // header("Location: orders_page.php");
    exit;
}
?>
