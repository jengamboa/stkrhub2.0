<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['built_game_id'])) {
    $built_game_id = $_POST['built_game_id'];
    $game_name = isset($_POST['game_name']) ? $_POST['game_name'] : '';
    $edition = isset($_POST['edition']) ? $_POST['edition'] : '';

    // Database connection
    include 'connection.php';

    // Insert data into the "published_built_games" table
    $insertQuery = "INSERT INTO published_built_games (built_game_id, game_name, edition) 
                    VALUES ('$built_game_id', '$game_name', '$edition')";

    if (mysqli_query($conn, $insertQuery)) {
        // You can include your header or any necessary files here

        echo '<h2>Game Published</h2>';
        echo '<p>Built Game ID: ' . $built_game_id . '</p>';
        echo '<p>Complete Game Name: ' . $game_name . '</p>';
        echo '<p>Edition: ' . $edition . '</p>';

        // You can include your footer or any necessary files here
    } else {
        echo 'Error inserting data into the database: ' . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo '<p>No built game ID was provided.</p>';
}
?>
