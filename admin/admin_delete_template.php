<?php
// Include the connection.php file to establish a database connection
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve color data sent via AJAX
    $templateId = mysqli_real_escape_string($conn, $_POST["templateId"]);

    // Check if the color with the given ID exists
    $checkQuery = "SELECT * FROM component_templates WHERE template_id = $templateId";
    $Result = $conn->query($checkQuery);

    if ($Result->num_rows == 0) {
        echo "Error: Color not found.";
    } else {
        // SQL query to delete the color with the specified color_id
        $sql = "DELETE FROM component_templates WHERE template_id = $templateId";

        if ($conn->query($sql) === TRUE) {
            echo "Template deleted successfully!";
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