<?php
// Include the connection.php file to establish a database connection
include("connection.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $price = floatval($_POST["price"]); // Convert to float
    $category = "game piece"; // Set the category to "game piece"
    $has_colors = 1;
    $is_upload_only = 0;
    $size = mysqli_real_escape_string($conn, $_POST["size"]);

    // Check if a component with the same name already exists
    $checkDuplicateQuery = "SELECT * FROM game_components WHERE component_name = '$name'";
    $duplicateResult = $conn->query($checkDuplicateQuery);

    if ($duplicateResult->num_rows > 0) {
        // A component with the same name already exists
        echo "Error: A component with the same name already exists.";
    } else {
        // Create a directory to store uploaded images (e.g., "assets/")
        $uploadDirectory = "../assets/";
        if (!file_exists($uploadDirectory)) {
            mkdir($uploadDirectory, 0777, true);
        }

        $uploadedFiles = array(); // Store uploaded file paths

        // Process uploaded images
        if (!empty($_FILES['images']['name'])) {
            $totalFiles = count($_FILES['images']['name']);

            for ($i = 0; $i < $totalFiles; $i++) {
                $fileName = $_FILES['images']['name'][$i];
                $fileTmpName = $_FILES['images']['tmp_name'][$i];
                $fileType = $_FILES['images']['type'][$i];

                // Generate a unique filename to avoid overwriting
                $uniqueFilename = uniqid() . "_" . $fileName;

                // Move the uploaded file to the "assets/" directory
                $uploadPath = $uploadDirectory . $uniqueFilename;

                if (move_uploaded_file($fileTmpName, $uploadPath)) {
                    // Store the uploaded file path
                    $uploadedFiles[] = $uploadPath;
                }
            }
        }

        // SQL query to insert data into the game_components table
        $sql = "INSERT INTO game_components (component_name, description, price, category, has_colors, is_upload_only, size) 
                VALUES ('$name', '$description', $price, '$category', $has_colors, $is_upload_only, '$size')";

        if ($conn->query($sql) === TRUE) {
            // Data inserted successfully
            echo "Data inserted successfully!";
        } else {
            // Error in inserting data
            echo "Error: " . $conn->error;
        }

        // Insert uploaded images into the component_assets table
        $componentId = mysqli_insert_id($conn); // Get the last inserted component_id

        foreach ($uploadedFiles as $uploadedFile) {
            // Insert each uploaded image into the component_assets table
            $insertImageSql = "INSERT INTO component_assets (component_id, asset_path, is_thumbnail) 
                               VALUES ($componentId, '$uploadedFile', 0)";

            $conn->query($insertImageSql);
        }
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form was not submitted, show an error or redirect as needed
    echo "Form not submitted!";
}
?>
