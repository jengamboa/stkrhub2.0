<?php
session_start();
include 'connection.php';

$component_id;

if (isset($_GET['id'])) {

    $component_id = $_GET['id'];

    $sql = "DELETE FROM component_colors WHERE ccomponent_id = $component_id";

    if ($conn->query($sql) === TRUE) {
        echo "Color deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $sql = "DELETE FROM component_templates WHERE ccomponent_id = $component_id";

    if ($conn->query($sql) === TRUE) {
        echo "Color deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $sql = "DELETE FROM component_assets WHERE ccomponent_id = $component_id";

    if ($conn->query($sql) === TRUE) {
        echo "Color deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $sql = "DELETE FROM game_components WHERE ccomponent_id = $component_id";

        if ($conn->query($sql) === TRUE) {
            echo "Color deleted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }

}


