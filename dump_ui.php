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
                <th>Component Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Game ID</th>
            </tr>
        </thead>
        <tbody>
            <!-- User data will be displayed here -->
        </tbody>
    </table>


    <?php
    $game_id = '34';
    ?>

    <!-- Custom JavaScript -->
    <script>
        $(document).ready(function () {
            var game_id = <?php echo $game_id; ?>; // Corrected PHP syntax

            $('#userTable').DataTable({
                "ajax": {
                    "url": "fetch_users.php",
                    data: {
                        game_id: game_id,
                    },
                    "dataSrc": ""
                },
                "columns": [
                    { "data": "component_name" },
                    { "data": "price" },
                    { "data": "category" },
                    { "data": "gameID" },
                ]
            });
        });
    </script>

</body>

</html>