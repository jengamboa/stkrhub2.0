<?php
// Include the connection.php file to establish a database connection
session_start();
include("connection.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['category'])) {
    // Sanitize and retrieve values from the form
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $price = floatval($_POST["price"]); // Convert to float
    $category = $_SESSION['category']; // Set the category to session categery

    $numberOfColors = isset($_POST["color_number"]) ? intval($_POST["color_number"]) : 0; // number of colors submitted

    $color_name = array(); // array for color_name
    $color_code = array(); // array for color_code

    $has_colors = isset($_POST["color"]) ? intval($_POST["color"]) : 0; // post has_color

    if ($has_colors == 1) {
        for ($i = 1; $i <= $numberOfColors; $i++) {
            $colorNameKey = "colorName$i";
            $colorCodeKey = "colorCode$i";

            if (isset($_POST[$colorNameKey]) && isset($_POST[$colorCodeKey])) {
                $color_name[] = $_POST[$colorNameKey];
                $color_code[] = $_POST[$colorCodeKey];
            }
        }
    }

    $numberOfTemplates = isset($_POST["No_template"]) ? intval($_POST["No_template"]) : 0; // Number of templates submitted

    $templateNames = array(); // Array for template names
    $uploadedFiles = array(); // Array for uploaded file paths


    $size = mysqli_real_escape_string($conn, $_POST["size"]);


    $numberOfThumbnails = isset($_POST["No_thumbnail"]) ? intval($_POST["No_thumbnail"]) : 0; // Number of thumbnails submitted

    $thumbnailUploadedFiles = array(); // Array for thumbnail uploaded file paths



    // Check if a component with the same name already exists
    $checkDuplicateQuery = "SELECT * FROM game_components WHERE component_name = '$name'";
    $duplicateResult = $conn->query($checkDuplicateQuery);

    if ($duplicateResult->num_rows > 0) {
        // A component with the same name already exists
        echo "Error: A component with the same name already exists.";
    } else {

        // SQL query to insert data into the game_components table
        $sql = "INSERT INTO game_components (component_name, description, price, category, has_colors , size) 
                VALUES ('$name', '$description', $price, '$category', $has_colors, '$size')";

        if ($conn->query($sql) === TRUE) {
            // Data inserted successfully
            echo "Data inserted successfully!";
        } else {
            // Error in inserting data
            echo "Error: " . $conn->error;
        }

        // Insert uploaded images into the component_assets table
        $componentId = mysqli_insert_id($conn); // Get the last inserted component_id
        echo $componentId;

        for ($i = 1; $i <= $numberOfTemplates; $i++) {
            $templateNameKey = "templateName$i";
            $templateFileKey = "templateCode$i";

            if (isset($_POST[$templateNameKey]) && isset($_FILES[$templateFileKey])) {
                $templateName = $_POST[$templateNameKey];
                $templateFileName = $_FILES[$templateFileKey]["name"];
                $templateFiles[] = $templateFileName;

                // Generate a unique filename to avoid overwriting
                $uniqueFilename = uniqid() . "_" . $templateFileName;

                // Upload the template file
                $uploadDirectory = "../assets/component_templates/"; // Set your upload directory
                // Ensure the directory exists, create it if not
                if (!file_exists($uploadDirectory)) {
                mkdir($uploadDirectory, 0777, true);
                }

                $uploadPath = $uploadDirectory . $uniqueFilename;

                if (move_uploaded_file($_FILES[$templateFileKey]["tmp_name"], $uploadPath)) {
                    // File uploaded successfully, store its path
                    $uploadedFiles[] = $uploadPath;
                    $templateNames[] = $templateName;
                }
            }
        }

        for ($i = 1; $i <= $numberOfThumbnails; $i++) {
            $thumbnailFileKey = "thumbnailCode$i";
        
            if (isset($_FILES[$thumbnailFileKey])) {
                $thumbnailFileName = $_FILES[$thumbnailFileKey]["name"];
                $thumbnailFiles[] = $thumbnailFileName;
        
                // Generate a unique filename to avoid overwriting
                $uniqueFilename = uniqid() . "_" . $thumbnailFileName;
        
                // Upload the thumbnail file
                $uploadDirectory = "../assets/component_assets/"; // Set your upload directory
                // Ensure the directory exists, create it if not
                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true);
                }
        
                $uploadPath = $uploadDirectory . $uniqueFilename;
        
                if (move_uploaded_file($_FILES[$thumbnailFileKey]["tmp_name"], $uploadPath)) {
                    // File uploaded successfully, store its path
                    $thumbnailUploadedFiles[] = $uploadPath;
                }
            }
        }

        // Database Insertion
        if (!empty($uploadedFiles)) {
            // Assuming you have a valid $componentId
            
            foreach ($uploadedFiles as $index => $uploadedFile) {
                $templateName = $templateNames[$index];

                // Use prepared statement to prevent SQL injection
                $stmt = $conn->prepare("INSERT INTO component_templates (component_id, template_name, template_file_path) VALUES (?, ?, ?)");
                $stmt->bind_param("iss", $componentId, $templateName, $uploadedFile);

                if ($stmt->execute()) {
                    echo "Thumbnail recorded successfully.";
                } else {
                    echo "Error inserting template: " . $stmt->error;
                }
            }
        }

        if (!empty($thumbnailUploadedFiles)) {
            // Assuming you have a valid $componentId
        
            foreach ($thumbnailUploadedFiles as $index => $thumbnailUploadedFile) {
        
                // Use prepared statement to prevent SQL injection
                $stmt = $conn->prepare("INSERT INTO component_assets (component_id, asset_path) VALUES (?, ?)");
                $stmt->bind_param("is", $componentId, $thumbnailUploadedFile);
        
                if ($stmt->execute()) {
                    echo "Thumbnail recorded successfully.";
                } else {
                    echo "Error inserting thumbnail: " . $stmt->error;
                }
            }
        }

        for ($i = 0; $i < count($color_name); $i++) {
            $color_names = $color_name[$i];
            $color_codes = $color_code[$i];

            // Perform an SQL INSERT query
            $sql = "INSERT INTO component_colors (component_id, color_name, color_code) VALUES ('$componentId', '$color_names', '$color_codes')";

            if ($conn->query($sql) === TRUE) {
                echo "Record inserted successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Close the database connection
    $conn->close();
} else {
    // If the form was not submitted, show an error or redirect as needed
    echo "Form not submitted!";
}
