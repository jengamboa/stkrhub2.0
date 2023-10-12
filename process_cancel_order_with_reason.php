<?php
include 'connection.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $reason_id = $_POST['reason_id'];
    $unique_order_group_id = $_POST['unique_order_group_id'];
    $user_id = $_POST['user_id'];

    echo "reason_id: " . $reason_id .'<br>';
    echo "unique_order_group_id: " . $unique_order_group_id.'<br>';
    echo "user_id: " . $user_id.'<br>';

} else {
    echo "Please select a reason.";
}