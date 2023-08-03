<?php
include 'connection.php';
include 'html/header.html.php';

// Retrieve the available game components from the "game_components" table
$query_components = "SELECT * FROM game_components";
$result_components = mysqli_query($conn, $query_components);

// Fetch the game name from the database
$game_id = $_POST['game_id']; // Assuming you pass the game_id in the hidden input
$game_name = $_POST['game_name']; // Fetching the game name
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Custom Game Component</title>
</head>

<body>
    <h2>Add Custom Game Component</h2>

    <!-- Display the game name -->
    <h3>Game: <?php echo $game_name; ?></h3>

    <ul>
        <?php while ($component = mysqli_fetch_assoc($result_components)) { ?>
            <li>
                <a href="game_component_details.php?game_id=<?php echo $game_id; ?>&game_name=<?php echo urlencode($game_name); ?>&component_id=<?php echo $component['component_id']; ?>">
                    <strong><?php echo $component['component_name']; ?></strong><br>
                    Price: <?php echo $component['price']; ?><br>
                </a>
            </li>
        <?php } ?>
    </ul>
</body>

</html>
