<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['direct_add'])) {

    $game_id = $_POST['game_id'];
    $game_name = $_POST['game_name'];
    $component_id = $_POST['component_id'];
    $component_name = $_POST['component_name'];
    $component_price = $_POST['component_price'];
    $component_category = $_POST['component_category'];
    $selected_size = $_POST['selected_size'];
    $quantity = $_POST['quantity']; // Include quantity


    // Check if game_id exists (it's part of a game) or not
    if ($game_id !== '') {

        // Echo the values passed from the previous page
        echo "User ID: " . $user_id . "<br>";
        echo "Game ID: " . $game_id . "<br>";
        echo "Component ID: " . $component_id . "<br>";
        echo "Selected Size: " . $selected_size . "<br>";
        echo "Quantity: " . $quantity . "<br>";

        $insert_query = "INSERT INTO added_game_components 
            (game_id, component_id, is_custom_design, custom_design_file_path, quantity, size, user_id)
            VALUES ('$game_id', '$component_id', 0, '', '$quantity', '$selected_size', '$user_id')";

        if ($queryComponentToGame = $conn->query($insert_query)) {
            echo 'inserted to added game components with game';
        }

        $added_component_game_id = mysqli_insert_id($conn);
        echo $added_component_game_id;

        header("Location: game_dashboard.php?game_id=$game_id");

    } else {
        echo "It is a single game component.<br>";

        echo $component_id;
        echo $quantity;
        echo $component_price;
        echo $component_category;
        echo $selected_size;

        $sqlSingleComponent = "INSERT INTO added_game_components 
            (game_id, component_id, size, is_custom_design, custom_design_file_path, quantity, user_id) 
            VALUES (NULL, '$component_id', '$selected_size', 0, '', '$quantity', '$user_id')";

        if ($querySingleComponent = $conn->query($sqlSingleComponent)) {
            echo 'inserted to added game components table';
        }

        $added_component_id = mysqli_insert_id($conn);

        echo $added_component_id;


        $cart_insert_query = "INSERT INTO cart 
            (user_id, game_id, built_game_id, added_component_id, quantity, price, is_active) 
            VALUES ('$user_id', NULL, NULL, '$added_component_id', '$quantity', '$component_price', 1)";

        if ($singleComponentToCart = $conn->query($cart_insert_query)) {
            echo 'inserted to cart table';
        }

        header("Location: cart.php");

    }
}
