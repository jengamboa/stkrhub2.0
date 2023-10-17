<?php
include "connection.php";

$user_id = $_GET['user_id'];

$sqlApproved = "SELECT * FROM built_games WHERE creator_id = $user_id AND is_approved = 1";
$resultApproved = $conn->query($sqlApproved);

$data = array();

while ($fetched = $resultApproved->fetch_assoc()) {
    $built_game_id = $fetched['built_game_id'];
    $game_id = $fetched['game_id'];
    $name = $fetched['name'];
    $description = $fetched['description'];
    $creator_id = $fetched['creator_id'];
    $build_date = $fetched['build_date'];
    $price = $fetched['price'];

    $is_pending = $fetched['is_pending'];
    $is_canceled = $fetched['is_canceled'];
    $is_approved = $fetched['is_approved'];

    $is_at_cart = $fetched['is_at_cart'];
    $is_semi_purchased = $fetched['is_semi_purchased'];
    $is_purchased = $fetched['is_purchased'];

    $is_pending_published = $fetched['is_pending_published'];
    $is_request_denied = $fetched['is_request_denied'];
    $is_published = $fetched['is_published'];

    $sqlReason = "SELECT * FROM denied_publish_requests WHERE built_game_id = $built_game_id";
    $queryReason = $conn->query($sqlReason);
    while ($fetchedReason = $queryReason->fetch_assoc()) {
        $denied_publish_request_id = $fetchedReason['denied_publish_request_id'];
        $reason = $fetchedReason['reason'];

        if ($fetchedReason['file_path'] === null) {
            $file_path = 'null';
        } else {
            $file_path = $fetchedReason['file_path'];
        }
    }


    $game_link = '
    <a href="built_game_dashboard.php?built_game_id=' . $built_game_id . '">' . $name . '</a>
    ';

    $description_value = '<p class="text-truncate" style="max-width: 140px;" data-toggle="tooltip" title="' . $description . '">' . $description . '</p>';


    if ($game_id == 0) {
        $from_what_game_value = '
            <small>deleted</small>
        ';
    } else {
        $from_what_game_value = '
           ID: ' . $game_id . '
        ';
    }

    $from_what_game = $from_what_game_value;

    $publish_request = '
    <a href="edit_game_page.php?built_game_id=' . $built_game_id . '">Ready to Publish</a>
    ';


    // status
    if ($is_at_cart == 1) {
        $status_value = 'Please Purchase at Cart';
    } elseif ($is_request_denied == 1) {
        $status_value = '
        <a href="denied_publish_request_page.php?built_game_id=' . $built_game_id . '">View Reason Denied</a>
        Your request has been denied
        <button class="view-reason" data-built_game_id="' . $built_game_id . '" data-reason="' . $reason . '" data-file_path="' . $file_path . '">
            View Reason
        </button>
        ';
    } elseif ($is_pending_published == 1) {
        $status_value = '
        <a href="pending_publish_request_page.php?built_game_id=' . $built_game_id . '">View Publish Request</a>
        ';
    } elseif ($is_published == 1) {
        $status_value = 'PUBLISHED';
    } elseif ($is_semi_purchased == 1) {
        if ($is_purchased) {
            $status_value = '
            ' . $publish_request . '
            ';
        } else {
            $status_value = 'Do not Cancel you Order';
        }
    } elseif ($is_purchased == 1) {
        $status_value = '
        ' . $publish_request . '
        ';
    } elseif ($is_approved == 1) {
        $status_value = 'Purchase first, to Publish';
    } else {
        $status_value = '';
    }

    $status = $status_value;


    // extra actions
    $extra_actions = '
    <button class="edit-built_game" data-built_game_id="' . $built_game_id . '">
        <i class="fa-solid fa-pen-to-square"></i>
    </button>

    <button class="delete-built_game" data-built_game_id="' . $built_game_id . '">
        <i class="fa-solid fa-trash"></i>
    </button>
    ';


    // actions
    if ($is_at_cart == 1) {
        $actions = '
    <button id="built_game_buy"
    data-built_game_id="' . $built_game_id . '"
    class="add-to-cart-approved"
    
    disabled
    data-toggle="tooltip" title="You can only buy bulk once you have purchased it once"
    >
        <span class="ti-bag"></span> Add to Cart
    </button>

    ' . $extra_actions . '
    ';
    } elseif ($is_published == 1) {
        $actions = '
    <button id="built_game_buy" data-built_game_id="' . $built_game_id . '" class="social-info">
        <span class="ti-bag"></span> Add to Cart
    </button>
    ' . $extra_actions . '
    ';
    } elseif ($is_semi_purchased == 1) {
        if ($is_purchased) {
            $actions = '
            <button 
            id="built_game_buy_again" data-built_game_id="' . $built_game_id . '" 
            class="add-to-cart-approved"
            >
                <span class="ti-bag"></span> Add to Cart
            </button>
            ' . $extra_actions . '
            ';
        } else {
            $actions = '
            <button id="built_game_buy"
            data-built_game_id="' . $built_game_id . '"
            class="add-to-cart-approved"
            
            disabled
            data-toggle="tooltip" title="You can only buy bulk once you have completely purchased it once"
            >
                <span class="ti-bag"></span> Add to Cart
            </button>
        
            ' . $extra_actions . '
            ';
        }
    } elseif ($is_purchased == 1) {
        $actions = '
    <button 
    id="built_game_buy_again" data-built_game_id="' . $built_game_id . '" 
    class="add-to-cart-approved"
    >
        <span class="ti-bag"></span> Add to Cart
    </button>
    ' . $extra_actions . '
    ';
    } elseif ($is_approved == 1) {
        $actions = '
    <button id="built_game_buy"
    data-built_game_id="' . $built_game_id . '"
    class="add-to-cart-approved"
    >
        <span class="ti-bag"></span> Add to Cart
    </button>

    ' . $extra_actions . '
    ';
    } else {
        $actions = '
    <button id="built_game_buy" data-built_game_id="' . $built_game_id . '" class="social-info">
        <span class="ti-bag"></span> Add to Cart
    </button>
    ' . $extra_actions . '
    ';
    }





    $built_game_link = $game_link;
    $total_price = $price;
    $formatted_date = $build_date;


    $data[] = array(
        "built_game_link" => $built_game_link,
        "description" => $description_value,
        "from_what_game" => $from_what_game,
        "total_price" => $total_price,
        "formatted_date" => $formatted_date,
        "status" => $status,
        "actions" => $actions,

    );
}

echo json_encode($data);
