<!DOCTYPE html>
<html>

<head>
    <title>My Orders</title>
    <style>
        /* ... (styles as before) ... */
    </style>
</head>

<body>
    <div class="container">
        <div class="panel">
            <h2 class="panel-title">Pending Orders</h2>
            <div class="orders">
                <?php
                include 'connection.php';

                // Fetch and display pending orders
                $query_pending = "SELECT * FROM orders WHERE is_pending = 1";
                $result_pending = mysqli_query($conn, $query_pending);

                while ($order = mysqli_fetch_assoc($result_pending)) {
                    echo '<div class="order">';
                    echo '<strong>Order ID:</strong> ' . $order['order_id'] . '<br>';
                    echo '<div class="order-details">';
                    // Display other order details
                    echo '</div>';
                    echo '</div>';
                }
                ?>
                
            </div>
        </div>

        <!-- Add similar panels for other order status -->

        <div class="panel">
            <h2 class="panel-title">Preparing Orders</h2>
            <div class="orders">
                <?php
                // Fetch and display preparing orders
                $query_preparing = "SELECT * FROM orders WHERE is_preparing = 1";
                $result_preparing = mysqli_query($conn, $query_preparing);

                while ($order = mysqli_fetch_assoc($result_preparing)) {
                    echo '<div class="order">';
                    echo '<strong>Order ID:</strong> ' . $order['order_id'] . '<br>';
                    echo '<div class="order-details">';
                    // Display other order details
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>

        <!-- Add panels for other order status (is_ready, is_shipped, is_completed, is_canceled) -->

    </div>
</body>

</html>