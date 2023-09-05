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
    <?php
    include 'connection.php';
    include 'html/header.html.php';

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        header("Location: login.php");
        exit;
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['game_id'])) {
        $game_id = $_GET['game_id'];

        // Retrieve the game details from the "games" table
        $query = "SELECT * FROM games WHERE game_id = '$game_id' AND user_id = '{$_SESSION['user_id']}'";
        $result = mysqli_query($conn, $query);
        $game = mysqli_fetch_assoc($result);

        // Retrieve the added game components for this game from the "added_game_components" table
        $query_components = "SELECT agc.added_component_id, agc.color_id, gc.component_id, gc.component_name, gc.price, gc.category, agc.is_custom_design, agc.custom_design_file_path, agc.quantity FROM added_game_components agc INNER JOIN game_components gc ON agc.component_id = gc.component_id WHERE agc.game_id = '$game_id'";
        $result_components = mysqli_query($conn, $query_components);
    }
    ?>

    <h2>Game Dashboard</h2>

    <h3>
        <?php echo $game['name']; ?>
    </h3>
    <p>
        <?php echo $game['description']; ?>
    </p>
    <p>Game ID:
        <?php echo $game['game_id']; ?>
    </p>
    <p>Category:
        <?php echo $game['category']; ?>
    </p>

    <p>Total Price:
        <?php echo calculateTotalPrice($game_id); ?>
    </p>
    <?php
    function calculateTotalPrice($game_id)
    {
        global $conn;

        $total_price = 0;

        // Retrieve the added game components for this game from the "added_game_components" table
        $query_components = "SELECT gc.price, agc.quantity FROM added_game_components agc
                        INNER JOIN game_components gc ON agc.component_id = gc.component_id
                        WHERE agc.game_id = '$game_id'";
        $result_components = mysqli_query($conn, $query_components);

        // Calculate the total price by summing up the prices of all added components, considering quantity
        while ($component = mysqli_fetch_assoc($result_components)) {
            $total_price += $component['price'] * $component['quantity'];
        }

        return $total_price;
    }
    ?>

    <table id="userTable" class="display">
        <thead>
            <tr>
                <th>Component Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Info</th>
                <th>Modify</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <!-- User data will be displayed here -->
        </tbody>
    </table>

    <form method="post" action="add_custom_component.php">
        <input type="hidden" name="game_id" value="<?php echo $game_id; ?>">
        <input type="submit" name="add_custom_component" value="Add Custom Game Component">
    </form>


    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function () {
            var user_id = <?php echo $user_id; ?>;
            var game_id = <?php echo $game_id; ?>;

            $('#userTable').DataTable({
                "ajax": {
                    "url": "json_game_dashboard.php",
                    data: {
                        user_id: user_id,
                        game_id: game_id,
                    },
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "component_name" },
                    { "data": "category" },
                    { "data": "price" },
                    { "data": "edit_quantity" },
                    { "data": "info" },
                    { "data": "modify" },
                    { "data": "delete" },
                ]
            });


            // Handle color link clicks within the DataTable context
            $('#userTable').on('click', '.color-link', function () {

                var game_id = $(this).data('gameid');
                var component_id = $(this).data('componentid');
                var color_id = $(this).data('colorid');
                var added_component_id = $(this).data('addedcomponentid');

                // Store a reference to the DataTable
                var table = $('#userTable').DataTable();

                // Send AJAX request to process_update_color.php
                $.ajax({
                    type: 'GET',
                    url: 'process_update_color.php',
                    data: {
                        game_id: game_id,
                        component_id: component_id,
                        color_id: color_id,
                        added_component_id: added_component_id
                    },
                    success: function (response) {
                        // Handle the response if needed
                        console.log(response);

                        // Refresh the DataTable
                        table.ajax.reload();
                    },
                    error: function (error) {
                        // Handle errors if needed
                        console.error(error);
                    }
                });
            });


            // Listen for delete button click using event delegation
            $('#userTable').on('click', '.delete-component', function () {
                var game_id = $(this).data('gameid');
                var component_id = $(this).data('componentid');

                // Store a reference to the DataTable
                var table = $('#userTable').DataTable();

                // Send AJAX request to delete_component.php
                $.ajax({
                    type: 'POST',
                    url: 'delete_component.php',
                    data: {
                        game_id: game_id,
                        added_component_id: component_id
                    },
                    success: function (response) {
                        console.log(response);

                        // Refresh the DataTable after successful deletion
                        table.ajax.reload();
                    }
                });
            });


            // Listen for changes to quantity input using event delegation
            $('#userTable').on('change', '.quantity-input', function () {
                var game_id = $(this).data('gameid');
                var component_id = $(this).data('componentid');
                var quantity = $(this).val();

                // Send AJAX request to update_quantity.php
                $.ajax({
                    type: 'POST',
                    url: 'update_quantity.php',
                    data: {
                        game_id: game_id,
                        added_component_id: component_id,
                        quantity: quantity
                    },
                    success: function (response) {
                        console.log(response);
                        // Call calculateTotalPrice function and update the total price display
                        var total_price = calculateTotalPrice(game_id);
                        $('#total-price').text(total_price);

                        // Refresh the DataTable
                        table.ajax.reload();
                    }
                });
            });

            function calculateTotalPrice(game_id) {
                // Your calculateTotalPrice logic here...
                // Return the calculated total price
            }



            // Listen for update custom design button click using event delegation
            $('#userTable').on('click', '.update-design', function () {
                var game_id = $(this).data('gameid');
                var component_id = $(this).data('componentid');
                var component_name = $(this).data('componentname');
                var component_price = $(this).data('componentprice');
                var component_category = $(this).data('componentcategory');
                var file_path = $(this).data('filepath');
                var file_name = $(this).data('filename');
                var game_name = $(this).data('gamename');
                var added_component_id = $(this).data('addedcomponentid'); // Retrieve added_component_id

                // Redirect to the update_custom_design.php page with the necessary parameters
                window.location.href = 'update_custom_design.php?game_id=' + game_id +
                    '&component_id=' + component_id +
                    '&component_name=' + encodeURIComponent(component_name) +
                    '&component_price=' + component_price +
                    '&component_category=' + encodeURIComponent(component_category) +
                    '&file_path=' + encodeURIComponent(file_path) +
                    '&file_name=' + encodeURIComponent(file_name) +
                    '&game_name=' + encodeURIComponent(game_name) +
                    '&added_component_id=' + added_component_id; // Pass added_component_id
            });

        });
    </script>

</body>

</html>