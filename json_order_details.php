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
    <div class="col">
        <div class="d-flex justify-content-start">
            <a href="profile_canceled.php" style="color: #; cursor:pointer;"><i class="fa-solid fa-arrow-left"></i> Back</a> 
        </div>
    </div>

    <div class="col">
        <div class="d-flex justify-content-end">
        
            <ul class="d-flex" style="gap: 2rem;">
                <li class="">
                    Order ID
                </li>

                <li class="">
                    Status
                </li>
            </ul>
    
        </div>
    </div>
</div>

<div class="row p-4">
    <div class="col">
        <div class="container d-flex justify-content-center align-items-center">

            <div class="">
                <div class="progresses mb-3">
                    <div class="steps">
                    <span><i class="fa fa-check"></i></span>
                    </div>

                    <span class="step-line"></span>

                    <div class="steps">
                    <span><i class="fa fa-check"></i></span>
                    </div>

                    <span class="step-line"></span>

                    <div class="steps">
                    <span class="font-weight-bold">3</span>
                    </div>
                </div>
              
                <div class="progresses">
                    <div class="steps-b">
                        <span>Order Placed</span>
                        <span class="small">Date</span>
                    </div>

                    <span class="step-line-b"></span>

                    <div class="steps-b">
                        <span>Order Canceled</span>
                        <span class="small">Date</span>
                    </div>

                    <span class="step-line-b"></span>

                    <div class="steps-b">
                        <span>Refunded</span>
                        <span class="small">Date</span>
                    </div>
                </div>
            </div>    

        </div>
    </div>
</div>


<div class="row">
    <div class="col">
        <p>Reason: asdkadkaskdj</p>
    </div>
</div>

<div class="row">
    <div class="col">
        <h5>Delivery Address</h5>
        asdjh
    </div>
</div>

';


$json[] = array(
    "item" => $item,
);

echo json_encode($json);
