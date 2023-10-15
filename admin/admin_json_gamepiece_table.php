<?php
session_start();
include "connection.php";

$category = ""; // Define a default value

if (isset($_SESSION['category'])) {
    $category = $_SESSION['category']; // Retrieve $category from the session
    
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM game_components WHERE category = ?");
    $stmt->bind_param("s", $category); // Assuming 'category' is a string, use "s" for string
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array();
    while ($row = $result->fetch_assoc()) {
        $component_id = $row['component_id'];
        $name = $row['component_name'];
        $description = $row['description'];
        $price = $row['price'];
        $size = $row['size'];
        $has_colors = $row['has_colors'];
        $colors = array(); // Initialize an empty array for colors
        $templates = array(); // Initialize an empty array for templates

        if ($has_colors == 1) {
            $colorQuery = "SELECT * FROM component_colors WHERE component_id = $component_id";
            $colorResult = mysqli_query($conn, $colorQuery);
            
            while ($colorRow = mysqli_fetch_assoc($colorResult)) {
                $colors[] = $colorRow['color_name']; // Add color to the array
            }
        } else {
            $colors [] = 'No Color';
        }

        $templateQuery = "SELECT * FROM component_templates WHERE component_id = $component_id";
        $templateResult = mysqli_query($conn, $templateQuery);
            
        while ($templateRow = mysqli_fetch_assoc($templateResult)) {
            $templates[] = $templateRow['template_name']; // Add template to the array
        }

        $actions = '<a href="edit_game_components.php?id=' . $component_id . '">Edit</a> <a href="delete_game_component.php?id=' . $component_id . '" Style = "color:red;">Delete</a>' ;

        $data[] = array(
            "name" => $name,
            "description" => $description,
            "price" => $price,
            "size" => $size,
            "colors" => $colors, // Store colors as an array
            "templates" => $templates, // Store templates as an array
            "actions" => $actions,
        );
    }

    // Send a JSON content type header
    header('Content-Type: application/json');
    
    echo json_encode($data);
} else {
    echo "Category not set.";
}
?>
