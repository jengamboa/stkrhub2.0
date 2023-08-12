<?php
include 'connection.php'; // Include your database connection

// Get the passed data from the URL parameters
$user_id = $_GET['user_id'];
$game_id = $_GET['game_id'];
$game_name = $_GET['game_name'];
$game_price = $_GET['game_price'];
$description = $_GET['description'];
$category = $_GET['category'];
$built_game_id = $_GET['built_game_id'];

// Echo the passed parameters
echo "User ID: $user_id<br>";
echo "Game ID: $game_id<br>";
echo "Game Name: $game_name<br>";
echo "Game Price: $game_price<br>";
echo "Description: $description<br>";
echo "Category: $category<br>";
echo "Built Game ID: $built_game_id<br>";

// Retrieve added game components based on the game_id from added_game_components table
$select_components_query = "SELECT * FROM added_game_components WHERE game_id = '$game_id'";
$result_components = mysqli_query($conn, $select_components_query);

// Insert the retrieved game components into built_games_added_game_components table
while ($component = mysqli_fetch_assoc($result_components)) {
    $component_id = $component['component_id'];
    $is_custom_design = $component['is_custom_design'];
    $custom_design_file_path = $component['custom_design_file_path'];
    $quantity = $component['quantity'];
    $color_id = $component['color_id'];
    $size = $component['size'];

    // Insert the component into built_games_added_game_components table
    $insert_component_query = "INSERT INTO built_games_added_game_components (built_game_id, game_id, component_id, is_custom_design, custom_design_file_path, quantity, color_id, size)
                               VALUES ('$built_game_id', '$game_id', '$component_id', '$is_custom_design', '$custom_design_file_path', '$quantity', '$color_id', '$size')";
    mysqli_query($conn, $insert_component_query);
}

echo "Added game components transferred successfully!";

// Redirect to built_games_page
header("Location: built_games_page.php");
exit(); // Make sure to exit to prevent further execution
?>