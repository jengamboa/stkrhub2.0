<?php
include 'connection.php';
include 'html/header.html.php';

$built_game_id = $_GET['built_game_id']; // Retrieve the built_game_id from the URL parameter

// Fetch the built game's added components with their details
$query = "SELECT bgagc.component_id, gc.component_name, gc.price, gc.category, bgagc.quantity, gc.has_colors, bgagc.is_custom_design, bgagc.custom_design_file_path, gc.size
          FROM built_games_added_game_components AS bgagc
          JOIN game_components AS gc ON bgagc.component_id = gc.component_id
          WHERE bgagc.built_game_id = '$built_game_id'";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Game Components</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <h2>Game Components for Built Game ID:
        <?php echo $built_game_id; ?>
    </h2>

    <table id="gameComponentsTable" class="display">
        <thead>
            <tr>
                <th>Component Name</th>
                <th>Price</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Info</th>
                <th>Size</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['component_name'] . '</td>';
                echo '<td>$' . $row['price'] . '</td>';
                echo '<td>' . $row['category'] . '</td>';
                echo '<td>' . $row['quantity'] . '</td>';
                echo '<td>';

                if ($row['has_colors'] == 1) {
                    // Get color information based on the color_id
                    $colorId = $row['component_id'];
                    $colorQuery = "SELECT color_name FROM component_colors WHERE color_id = '$colorId'";
                    $colorResult = mysqli_query($conn, $colorQuery);
                    $colorRow = mysqli_fetch_assoc($colorResult);
                    $colorName = $colorRow['color_name'];

                    echo 'Color Name: ' . $colorName;
                } else {
                    // Display file upload or "No file upload"
                    if ($row['is_custom_design'] == 1) {
                        $filePath = $row['custom_design_file_path'];
                        $fileName = basename($filePath); // Get the filename from the path
                        echo 'File: <a href="' . $filePath . '" download>' . $fileName . '</a>';
                    } else {
                        echo 'No file upload';
                    }
                }


                echo '</td>';
                echo '<td>' . $row['size'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>

    <!-- Include DataTables JavaScript -->
    <script type="text/javascript" charset="utf8"
        src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>

    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function () {
            $('#gameComponentsTable').DataTable();
        });
    </script>
</body>

</html>