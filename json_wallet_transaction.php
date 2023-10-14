<?php
include "connection.php";
$json = array();
$user_id = $_GET['user_id'];

$sql = "SELECT * FROM wallet_transactions WHERE user_id = $user_id ORDER BY transaction_date DESC";
$result = $conn->query($sql);
while ($fetched = $result->fetch_assoc()) {
    $wallet_transaction_id = $fetched['wallet_transaction_id'];
    $transaction_type = $fetched['transaction_type'];
    $amount = $fetched['amount'];
    $transaction_date = $fetched['transaction_date'];
    $status = $fetched['status'];
    $mode = $fetched['mode'];
    $paypal_transaction_id = $fetched['paypal_transaction_id'];


    $type = $transaction_type;
    $amount = $amount;
    $date = $transaction_date;
    $status = $status;
    $mode = $mode;
    $paypal_transaction_id = $paypal_transaction_id;

    $json[] = array(
        "type" => $type,
        "amount" => $amount,
        "date" => $date,
        "status" => $status,
        "mode" => $mode,
        "paypal_transaction_id" => $paypal_transaction_id,
    );
}

echo json_encode($json);
