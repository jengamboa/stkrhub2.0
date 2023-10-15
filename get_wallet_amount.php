<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

$sql = "SELECT wallet_amount FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result) {
    $row = $result->fetch_assoc();
    $wallet_amount = $row['wallet_amount'];
    echo $wallet_amount;
} else {
    echo "Database error: Unable to fetch wallet amount.";
}


$conn->close();
