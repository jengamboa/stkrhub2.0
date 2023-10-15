<?php
include "connection.php";
$json = array();

$user_id = $_GET['user_id'];
$unique_order_group_id = $_GET['unique_order_group_id'];

$sql = "SELECT * FROM cart WHERE user_id = $user_id AND is_active = 1 AND is_visible !=0";
$result = $conn->query($sql);
while ($fetched = $result->fetch_assoc()) {
    $cart_id = $fetched['cart_id'];

}





$item = '

<div class="row p-0">
    <div class="col d-flex justify-content-end">
        Subtotal
    </div>

    <div class="col-3 d-flex justify-content-end">
        P77
    </div>
</div>

<div class="row p-0">
    <div class="col d-flex justify-content-end">
        Shipping Fee
    </div>

    <div class="col-3 d-flex justify-content-end">
        P77
    </div>
</div>

<div class="row p-0">
    <div class="col d-flex justify-content-end">
        Shipping Discount Subtotal
    </div>

    <div class="col-3 d-flex justify-content-end">
        P77
    </div>
</div>

<div class="row p-0">
    <div class="col d-flex justify-content-end">
        Payment Method
    </div>

    <div class="col-3 d-flex justify-content-end">
        Paypal
    </div>
</div>

<div class="row p-0">
    <div class="col d-flex justify-content-end">
        Order Total
    </div>

    <div class="col-3 d-flex justify-content-end">
        <h4>P77</h4>
    </div>
</div>

';


$json[] = array(
    "item" => $item,
);

echo json_encode($json);
