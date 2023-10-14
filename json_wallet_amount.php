<?php
include "connection.php";
$json = array();
$user_id = $_GET['user_id'];

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$result = $conn->query($sql);
while ($fetched = $result->fetch_assoc()) {
    $wallet_amount = $fetched['wallet_amount'];

    $item = '

<div class="row p-4">
    <div class="col">
        <div class="container d-flex justify-content-center align-items-center">

            ' . $wallet_amount . '

        </div>
    </div>
</div>


<div class="container d-flex justify-content-center" style="gap: 7px;">

<button class="btn" id="cash_in">Cash In</button>

<button class="btn" id="cash_out"
data-current_wallet_balance = "'.$wallet_amount.'">
Cash Out
</button>


</div>

    ';

    $json[] = array(
        "item" => $item,
    );
}

echo json_encode($json);
