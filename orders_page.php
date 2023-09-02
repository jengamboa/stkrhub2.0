<?php
include 'connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if not logged in
    header("Location: login_page.php");
    exit;
}

// HTML for the Orders Page
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders Page</title>
</head>

<body>
    <header>
        <h1>Welcome to the Orders Page</h1>
        <nav>
            <ul>
                <li><a href="pending_orders_page.php">Pending Orders</a></li>
                <li><a href="in_production_orders_page.php">In Production Orders</a></li>
                <li><a href="ship_orders_page.php">To Ship Orders</a></li>
                <li><a href="deliver_orders_page.php">To Deliver Orders</a></li>
                <li><a href="received_orders_page.php">Received Orders</a></li>
                <li><a href="canceled_orders_page.php">Canceled Orders</a></li>
            </ul>
        </nav>
    </header>
</body>

</html>
