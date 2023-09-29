<?php
include "connection.php";

// Query to find the most frequent creator_id at orders table
$sqlGames = "SELECT user_id, COUNT(*) AS frequency
             FROM orders
             GROUP BY user_id
             ORDER BY frequency DESC";

$resultGames = $conn->query($sqlGames);

$data = array();

while ($row = $resultGames->fetch_assoc()) {
    $user_id = $row['user_id'];
    $frequency = $row['frequency'];

    $sqlCreator = "SELECT * FROM users WHERE user_id = $user_id";
    $queryCreator = $conn->query($sqlCreator);
    while ($fetchedCreator = $queryCreator->fetch_assoc()) {
        $username = $fetchedCreator['username'];
        $avatar = $fetchedCreator['avatar'];
    }


    // Query to calculate the total payment for the specified user_id
    $sqlSpent = "SELECT SUM(total_payment) AS total_payment FROM orders WHERE user_id = $user_id";
    $resultSpent = $conn->query($sqlSpent);
    $rowSpent = $resultSpent->fetch_assoc();
    $totalSpent = $rowSpent['total_payment'];



    $avatar = '
        <a href="#">
            <div style="width: 50px; overflow: hidden; border-radius: 50%;">
                <img class="media-object mr-3" src="../' . $avatar . '" alt="..." style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </a>
    ';

    $orders = $frequency;
    $published = 'published';
    $spent = $totalSpent;

    $data[] = array(
        "avatar" => $avatar,
        "name" => $username,
        "spent" => $spent,
        "orders" => $orders,
    );
}

echo json_encode($data);
