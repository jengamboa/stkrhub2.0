<?php
include "connection.php";

// Query to find the user with the highest total creator_profit
$sqlUsers = "SELECT user_id, SUM(creator_profit) AS total_creator_profit
             FROM orders
             GROUP BY user_id
             ORDER BY total_creator_profit DESC";

$resultUsers = $conn->query($sqlUsers);

$data = array();

while ($row = $resultUsers->fetch_assoc()) {
    $user_id = $row['user_id'];
    $totalCreatorProfit = $row['total_creator_profit'];

    // Query to retrieve user details
    $sqlUserDetails = "SELECT * FROM users WHERE user_id = $user_id";
    $resultUserDetails = $conn->query($sqlUserDetails);
    $userDetails = $resultUserDetails->fetch_assoc();

    $username = $userDetails['username'];
    $avatar = $userDetails['avatar'];

    $avatar = '
        <a href="#">
            <div style="width: 50px; overflow: hidden; border-radius: 50%;">
                <img class="media-object mr-3" src="../' . $avatar . '" alt="..." style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </a>
    ';

    $totalProfit = $totalCreatorProfit;

    $data[] = array(
        "avatar" => $avatar,
        "name" => $username,
        "earnings" => $totalProfit,
    );
}

echo json_encode($data);
?>
