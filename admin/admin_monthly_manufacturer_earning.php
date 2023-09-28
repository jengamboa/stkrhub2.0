<?php
include 'connection.php';

$currentMonth = date('F');
$months = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
];
$monthIndex = array_search($currentMonth, $months);

$array1 = [];

for ($i = 1; $i <= 9; $i++) {
        $prevMonthIndex = ($monthIndex - $i + 12) % 12;
        $array1[] = $months[$prevMonthIndex];
}

$array1 = array_reverse($array1);


// Get the first and last day of the current month
$currentMonthStart = date('Y-m-01');
$currentMonthEnd = date('Y-m-t');

// Query to calculate the total manufacturer_profit for orders in production during the current month
$sql = "SELECT SUM(manufacturer_profit) AS total_profit
        FROM orders
        WHERE in_production = 1
        AND order_date BETWEEN '$currentMonthStart' AND '$currentMonthEnd'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();
$currentMonthTotalProfit = $row['total_profit'];


// Function to calculate total manufacturer profit for a given month
function calculateManufacturerProfit($conn, $monthsAgo)
{
        $startOfMonth = date('Y-m-01', strtotime("first day of -$monthsAgo months"));
        $endOfMonth = date('Y-m-t', strtotime("last day of -$monthsAgo months"));

        $sql = "SELECT SUM(manufacturer_profit) AS total_profit
                FROM orders
                WHERE in_production = 1
                AND order_date BETWEEN '$startOfMonth' AND '$endOfMonth'";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        return $row['total_profit'];
}

// Calculate the total manufacturer profit for each of the previous 4 months
$one = calculateManufacturerProfit($conn, 1);
$two = calculateManufacturerProfit($conn, 2);
$three = calculateManufacturerProfit($conn, 3);
$four = calculateManufacturerProfit($conn, 4);
$five = calculateManufacturerProfit($conn, 5);
$six = calculateManufacturerProfit($conn, 6);
$seven = calculateManufacturerProfit($conn, 7);
$eight = calculateManufacturerProfit($conn, 8);
$nine = calculateManufacturerProfit($conn, 9);




$array2 = [$nine, $eight, $seven, $six, $five, $four, $three, $two, $one];

$data = array(
        "labels" => $array1,
        "data" => $array2
);

echo json_encode($data);
