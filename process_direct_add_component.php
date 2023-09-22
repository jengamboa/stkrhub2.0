<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['direct_add'])) {

    $game_id = $_POST['game_id'];
    $component_id = $_POST['component_id'];
    $quantity = $_POST['quantity'];

    $sqlGetComponentDetails = "SELECT * FROM game_components WHERE component_id = $component_id";
    $queryGetComponentDetails = $conn->query($sqlGetComponentDetails);
    while ($fetchedComponentDetails = $queryGetComponentDetails->fetch_assoc()) {
        $component_name = $fetchedComponentDetails['component_name'];
        $component_description = $fetchedComponentDetails['description'];
        $component_price = $fetchedComponentDetails['price'];
        $component_category = $fetchedComponentDetails['category'];
        $component_assets = $fetchedComponentDetails['assets'];
        $component_has_colors = $fetchedComponentDetails['has_colors'];
        $component_size = $fetchedComponentDetails['size'];
    }

    echo $user_id . '<br>';
    echo 'game id: ' . $game_id . '<br>';
    echo $component_id . '<br>';
    echo $component_name . '<br>';
    echo $component_price . '<br>';
    echo $component_has_colors . '<br>';
    echo $component_size . '<br>';
    echo $quantity . '<br>';



    if ($game_id == 0) {

        $sqlSingleComponent = "INSERT INTO added_game_components (game_id, component_id, size, is_custom_design, custom_design_file_path, quantity, user_id) 
            VALUES (NULL, '$component_id', '$component_size', 0, '', '$quantity', '$user_id')";

        if ($querySingleComponent = $conn->query($sqlSingleComponent)) {
            echo 'inserted to added game components table';
        }

        $added_component_id = mysqli_insert_id($conn);

        echo $added_component_id;


        $cart_insert_query = "INSERT INTO cart (user_id, game_id, built_game_id, added_component_id, quantity, price, is_active) 
            VALUES ('$user_id', NULL, NULL, '$added_component_id', '$quantity', '$component_price', 1)";

        if ($singleComponentToCart = $conn->query($cart_insert_query)) {
            echo 'inserted to cart table';
        }

        header("Location: cart_page.php");
    } elseif ($game_id !== 0) {

        $insert_query = "INSERT INTO added_game_components (game_id, component_id, is_custom_design, custom_design_file_path, quantity, size, user_id) 
            VALUES ('$game_id', '$component_id', 0, '', '$quantity', '$component_size', '$user_id')";

        if ($queryComponentToGame = $conn->query($insert_query)) {
            echo 'inserted to added game components with game';
        }

        $added_component_game_id = mysqli_insert_id($conn);
        echo $added_component_game_id;

        header("Location: game_dashboard.php?game_id=$game_id");
    }
}
