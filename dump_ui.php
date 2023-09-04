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
    <h1>User DataTable</h1>

    <table id="userTable" class="display">
        <thead>
            <tr>
                <th>Added Component ID</th>
                <th>Component ID</th>
                <th>Component Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Info</th>
                <th>Modify</th>
            </tr>
        </thead>
        <tbody>
            <!-- User data will be displayed here -->
        </tbody>
    </table>


    <?php
    $user_id = '3';
    $game_id = '47';
    ?>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function() {
            var user_id = <?php echo $user_id; ?>; 
            var game_id = <?php echo $game_id; ?>; 

            $('#userTable').DataTable({
                "ajax": {
                    "url": "fetch_users.php",
                    data: {
                        user_id: user_id,
                        game_id: game_id,                        
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "added_component_id"
                    },
                    {
                        "data": "component_id"
                    },
                    {
                        "data": "component_name"
                    },
                    {
                        "data": "price"
                    },
                    {
                        "data": "category"
                    },
                    {
                        "data": "edit_quantity"
                    },
                    {
                        "data": "info"
                    },
                    {
                        "data": "modify"
                    },
                ]
            });
        });
    </script>

</body>

</html>