<?php
// Include the connection.php file to establish a database connection
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve color data sent via AJAX
    $colorId = mysqli_real_escape_string($conn, $_POST["colorId"]);

    // Check if the color with the given ID exists
    $checkColorQuery = "SELECT * FROM component_colors WHERE color_id = $colorId";
    $colorResult = $conn->query($checkColorQuery);

    if ($colorResult->num_rows == 0) {
        echo "Error: Color not found.";
    } else {
        // SQL query to delete the color with the specified color_id
        $sql = "DELETE FROM component_colors WHERE color_id = $colorId";

        if ($conn->query($sql) === TRUE) {
            echo "Color deleted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
