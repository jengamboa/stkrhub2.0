<?php
include "connection.php";

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM published_built_games WHERE creator_id = $user_id";
$result = $conn->query($sql);

$data = array();

while ($fetched = $result->fetch_assoc()) {

    $published_game_id = $fetched['published_game_id'];
    $built_game_id = $fetched['built_game_id'];
    $game_name = $fetched['game_name'];
    $category = $fetched['category'];
    $edition = $fetched['edition'];
    $published_date = $fetched['published_date'];
    $logo_path = $fetched['logo_path'];
    $desired_markup = $fetched['desired_markup'];
    $manufacturer_profit = $fetched['manufacturer_profit'];
    $creator_profit = $fetched['creator_profit'];
    $marketplace_price = $fetched['marketplace_price'];

    $has_pending_update = $fetched['has_pending_update'];
    $is_hidden = $fetched['is_hidden'];

    // Initialize variables before the nested loop
    $game_id = '';
    $built_game_name = '';
    $price = '';

    $sqlGetBuiltGames = "SELECT * FROM built_games WHERE built_game_id = $built_game_id";
    $resultGetBuiltGames = $conn->query($sqlGetBuiltGames);
    while ($fetchedBuiltGames = $resultGetBuiltGames->fetch_assoc()) {
        $game_id = $fetchedBuiltGames['game_id'];
        $built_game_name = $fetchedBuiltGames['name'];
        $price = $fetchedBuiltGames['price'];
    }

    $published_game_link = '
        <a href="marketplace_item_page.php?id=' . $published_game_id . '">' . $game_name . '</a>
    ';

    $info_value = '
        <p>Built Game Name: ' . $built_game_name . '</p>
        <p>From what Game ID: ' . $game_id . '</p>
    ';
    $info = $info_value;

    $price_and_markup_value = '
        <p>Cost: ' . $price . '</p>
        <p>desired_markup: ' . $desired_markup . '</p>
        <p>manufacturer_profit: ' . $manufacturer_profit . '</p>
        <p>creator_profit: ' . $creator_profit . '</p>
        <p>marketplace_price: ' . $marketplace_price . '</p>
    ';
    $price_and_markup = $price_and_markup_value;



    $total_price = 0;
    $total_desired_markup = 0;
    $total_manufacturer_profit = 0;
    $total_creator_profit = 0;
    $total_marketplace_price = 0;

    $sqlCalculate = "SELECT * FROM orders WHERE published_game_id = $published_game_id AND to_deliver = 1";
    $queryCalculate = $conn->query($sqlCalculate);
    while ($fetchedCalculate = $queryCalculate->fetch_assoc()) {
        $calculate_quantity = $fetchedCalculate['quantity'];

        $calculate_price = $fetchedCalculate['price'] * $calculate_quantity;
        $calculate_desired_markup = $fetchedCalculate['desired_markup'] * $calculate_quantity;
        $calculate_manufacturer_profit = $fetchedCalculate['manufacturer_profit'] * $calculate_quantity;
        $calculate_creator_profit = $fetchedCalculate['creator_profit'] * $calculate_quantity;
        $calculate_marketplace_price = $fetchedCalculate['marketplace_price'] * $calculate_quantity;

        $total_price += $calculate_price;
        $total_desired_markup += $calculate_desired_markup;
        $total_manufacturer_profit += $calculate_manufacturer_profit;
        $total_creator_profit += $calculate_creator_profit;
        $total_marketplace_price += $calculate_marketplace_price;
    }

    $total_earnings_value = '
        <p>Total Manufacturer\'s Earnings: ' . $total_manufacturer_profit . '</p>
        <p>Total Creator\'s Earnings: ' . $total_creator_profit . '</p>
        <p>Total Creator\'s Received: Coming Soon</p>
        <a href="___.php?id=' . $published_game_id . '">View More (Coming Soon)</a>
    ';
    $total_earnings = $total_earnings_value;


    if ($is_hidden === '1') {
        $action1 = '
            <button id="unhideButton" data-published_game_id="' . $published_game_id . '">Unhide</button>

        ';
    } else {
        $action1 = '
            <button id="hideButton" data-published_game_id="' . $published_game_id . '">Hide</button>

        ';
    }

    if ($has_pending_update === '1') {
        $action2 = '
            <button id="viewEditButton" data-published_game_id="' . $published_game_id . '">View Edit Request</button>
        ';
    } else {
        $action2 = '
            <button id="editButton" data-published_game_id="' . $published_game_id . '">Edit</button>

        ';
    }

    $actions = $action1 . $action2;




    $data[] = array(
        "published_game_link" => $published_game_link,
        "edition" => $edition,
        "category" => $category,
        "info" => $info,
        "published_date" => $published_date,
        "price_and_markup" => $price_and_markup,
        "total_earnings" => $total_earnings,
        "actions" => $actions,

    );
}

echo json_encode($data);
