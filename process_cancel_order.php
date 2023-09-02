<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel'])) {
    $order_id = $_POST['order_id'];
    echo "Order ID $order_id has been canceled.";
} else {

    // header("Location: orders_page.php");
    exit;
}