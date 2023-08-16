<?php
include 'connection.php';
include 'html/header.html.php';

// Retrieve the available game components from the "game_components" table
$query_components = "SELECT * FROM game_components";
$result_components = mysqli_query($conn, $query_components);

// Fetch the game name from the database if available
$game_id = isset($_POST['game_id']) ? $_POST['game_id'] : null;
$game_name = isset($_POST['game_name']) ? $_POST['game_name'] : null;
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Custom Game Component</title>
</head>

<body>
    <h2>Add Custom Game Component</h2>

    <!-- Display the game name if available -->
    <?php if ($game_id !== null && $game_name !== null) { ?>
        <h3>Game ID: <?php echo $game_id; ?></h3>
        <h3>Game Name: <?php echo $game_name; ?></h3>
    <?php } ?>

    <ul>
        <?php while ($component = mysqli_fetch_assoc($result_components)) { ?>
            <li>
                <a href="game_component_details.php?game_id=<?php echo $game_id; ?>&game_name=<?php echo urlencode($game_name); ?>&component_id=<?php echo $component['component_id']; ?>">
                    <strong><?php echo $component['component_name']; ?></strong><br>
                    Price: <?php echo $component['price']; ?><br>
                    Size: <?php echo $component['size']; ?><br>
                </a>
            </li>
        <?php } ?>
    </ul>
</body>

</html>
