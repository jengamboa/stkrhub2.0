<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User DataTable</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>

    <table id="userTable" class="display">
        <thead>
            <tr>
                <th>Checkbox</th>
                <th>Item</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <!-- User data will be displayed here -->
        </tbody>
    </table>

    <?php
    $user_id = 3;
    ?>

    <script>
        $(document).ready(function () {

            var user_id = <?php echo $user_id; ?>;

            $('#userTable').DataTable({
                "ajax": {
                    "url": "json_cart_page.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "checkbox" },
                    { "data": "item" },
                    { "data": "item_price" },
                    { "data": "item_quantity" },
                    { "data": "item_total_price" },
                ]
            });

            // Listen for delete button click using event delegation
            $('#userTable').on('click', '.item-quantity', function () {
                var cart_id = $(this).data('cartid');
                var quantity = $(this).data('quantity');

                // Store a reference to the DataTable
                var table = $('#userTable').DataTable();

                // Send AJAX request to delete_component.php
                $.ajax({
                    type: 'POST',
                    url: 'process_update_quantity.php',
                    data: {
                        cart_id: cart_id,
                        quantity: quantity
                    },
                    success: function (response) {
                        console.log(response);
                        table.ajax.reload();
                    }
                });
            });
        });
    </script>
</body>

</html>