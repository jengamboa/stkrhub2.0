<?php
// Include the connection.php file to establish a database connection
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve values from the form
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $component_id = mysqli_real_escape_string($conn, $_POST["id"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);
    $price = floatval($_POST["price"]);
    $size = mysqli_real_escape_string($conn, $_POST["size"]);
    $has_colors = $_POST['has_colors'];



    // Check if the component with the given ID exists
    $checkComponentQuery = "SELECT * FROM game_components WHERE component_id = $component_id";
    $componentResult = $conn->query($checkComponentQuery);

    if ($componentResult->num_rows == 0) {
        echo "Error: Component not found.";
    } else {
        // SQL query to update data in the game_components table
        $sql = "UPDATE game_components SET
                component_name = '$name',
                description = '$description',
                price = $price,
                size = '$size'
                WHERE component_id = $component_id";

        if ($conn->query($sql) === TRUE) {
            echo "Data updated successfully!";
        } else {
            echo "Error: " . $conn->error;
        }

        //Update Color name and Color code
        if (isset($_POST["color_id"]) && isset($_POST["color_name"]) && isset($_POST["color_code"])) {
            $colorIds = $_POST["color_id"];
            $colorNames = $_POST["color_name"];
            $colorCodes = $_POST["color_code"];

            // Now, you can loop through these arrays and work with the data as needed.
            foreach ($colorIds as $index => $colorId) {
                $colorName = $colorNames[$index];
                $colorCode = $colorCodes[$index];

                $colorUpdateSql = "UPDATE component_colors SET
                color_name = '$colorName',
                color_code = '$colorCode'
                WHERE color_id = $colorId";

                if ($conn->query($colorUpdateSql) === TRUE) {
                    echo "Color with ID $colorId updated successfully.";
                } else {
                    echo "Error updating color with ID $colorId: " . $conn->error;
                }
            }
        }

        // start of new color insertion

        $numberOfColors = isset($_POST["color_number"]) ? intval($_POST["color_number"]) : 0; // number of colors submitted

        $color_name = array(); // array for color_name
        $color_code = array(); // array for color_code

        for ($i = 1; $i <= $numberOfColors; $i++) {
            $colorNameKey = "newcolorName$i";
            $colorCodeKey = "newcolorCode$i";

            if (isset($_POST[$colorNameKey]) && isset($_POST[$colorCodeKey])) {
                $color_name[] = $_POST[$colorNameKey];
                $color_code[] = $_POST[$colorCodeKey];
            }
        }

        if (!empty($numberOfColors)) {

            if ($has_colors == 0) {
                $sql = "UPDATE game_components SET
                has_colors = 1
                WHERE component_id = $component_id";

                if ($conn->query($sql) === TRUE) {
                    echo "Data updated successfully!";
                } else {
                    echo "Error: " . $conn->error;
                }
            }

            for ($i = 0; $i < count($color_name); $i++) {
                $color_names = $color_name[$i];
                $color_codes = $color_code[$i];

                // Perform an SQL INSERT query
                $sql = "INSERT INTO component_colors (component_id, color_name, color_code) VALUES ('$component_id', '$color_names', '$color_codes')";

                if ($conn->query($sql) === TRUE) {
                    echo "Record inserted successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }

        // end of new color insertion

        //Update tempalate
                if (isset($_POST["template_id"]) && isset($_POST["template_name"]) && isset($_FILES["template_file"])) {
                    $templateIds = $_POST["template_id"];
                    $templateNames = $_POST["template_name"];
                    
                    // Loop through the uploaded files
                    foreach ($_FILES["template_file"]["tmp_name"] as $index => $tmpFile) {
                        // Get template ID, name, and the temporary file path
                        $templateId = $templateIds[$index];
                        $templateName = $templateNames[$index];
                        $templateFileName = $_FILES["template_file"]["name"][$index];
                        $templateFileTmp = $_FILES["template_file"]["tmp_name"][$index];
                        
                        // Generate a unique filename
                        $uniqueFilename = uniqid() . "_" . $templateFileName;
                        
                        // Set your upload directory
                        $uploadDirectory = "../assets/component_templates/";
                        $uploadPath = $uploadDirectory . $uniqueFilename;
                        
                        // Ensure the directory exists, create it if not
                        if (!file_exists($uploadDirectory)) {
                            mkdir($uploadDirectory, 0777, true);
                        }
                        
                        // Move the uploaded file to the target directory
                        if (move_uploaded_file($templateFileTmp, $uploadPath)) {
                            // File uploaded successfully, update the database
                            // Use prepared statements to update the database safely
                            $sql = "UPDATE component_templates SET template_name = ?, template_file_path = ? WHERE template_id = ?";
                            $stmt = $conn->prepare($sql);
                            $stmt->bind_param("ssi", $templateName, $uploadPath, $templateId);
                
                            if ($stmt->execute()) {
                                echo "Template with ID $templateId updated successfully.";
                            } else {
                                echo "Error updating template with ID $templateId: " . $stmt->error;
                            }
                
                            $stmt->close();
                            $conn->close();
                        } else {
                            echo "Error uploading file for template with ID $templateId.";
                        }
                    }
                }
        // end of update template

        // start of inserting new template
            $numberOfTemplates = isset($_POST["No_template"]) ? intval($_POST["No_template"]) : 0; // Number of templates submitted

            $templateNames = array(); // Array for template names
            $uploadedFiles = array(); // Array for uploaded file paths

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

            if (!empty($uploadedFiles)) {
                // Assuming you have a valid $componentId
            
                foreach ($uploadedFiles as $index => $uploadedFile) {
                    $templateName = $templateNames[$index];
            
                    // Use prepared statement to prevent SQL injection
                    $stmt = $conn->prepare("INSERT INTO component_templates (component_id, template_name, template_file_path) VALUES (?, ?, ?)");
                    $stmt->bind_param("iss", $component_id, $templateName, $uploadedFile);
            
                    if ($stmt->execute()) {
                        echo "Template recorded successfully.";
                    } else {
                        echo "Error inserting template: " . $stmt->error;
                    }
                }
            }



            //Update thumbnail
            if (isset($_POST["thumbnail_id"]) && isset($_FILES["thumbnail_file"])) {
                $thumbnailIds = $_POST["thumbnail_id"];
                
                // Loop through the uploaded files
                foreach ($_FILES["thumbnail_file"]["tmp_name"] as $index => $tmpFile) {
                    // Get thumbnail ID, name, and the temporary file path
                    $thumbnailId = $thumbnailIds[$index];
                    $thumbnailFileName = $_FILES["thumbnail_file"]["name"][$index];
                    $thumbnailTmp = $_FILES["thumbnail_file"]["tmp_name"][$index];
                    
                    // Generate a unique filename
                    $uniqueFilename = uniqid() . "_" . $thumbnailFileName;
                    
                    // Set your upload directory
                    $uploadDirectory = "../assets/component_assets/";
                    $uploadPath = $uploadDirectory . $uniqueFilename;
                    
                    // Ensure the directory exists, create it if not
                    if (!file_exists($uploadDirectory)) {
                        mkdir($uploadDirectory, 0777, true);
                    }
                    
                    // Move the uploaded file to the target directory
                    if (move_uploaded_file($thumbnailTmp, $uploadPath)) {
                        // File uploaded successfully, update the database
                        // Use prepared statements to update the database safely
                        $sql = "UPDATE component_assets SET asset_path = ? WHERE asset_id = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("si", $uploadPath, $thumbnailId);
            
                        if ($stmt->execute()) {
                            echo "Thumbnail with ID $thumbnailId updated successfully.";
                        } else {
                            echo "Error updating thumbnail with ID $thumbnailId: " . $stmt->error;
                        }
            
                        $stmt->close();
                    } else {
                        echo "Error uploading file for thumbnail with ID $thumbnailId.";
                    }
                }
                $conn->close();
            }
            
    // end of update thumbnail

    // start of inserting new thumbnails
    $numberOfThumbnails = isset($_POST["No_thumbnail"]) ? intval($_POST["No_thumbnail"]) : 0; // Number of thumbnails submitted

    $thumbnailUploadedFiles = array(); // Array for thumbnail uploaded file paths

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

    if (!empty($thumbnailUploadedFiles)) {
        // Assuming you have a valid $componentId
    
        foreach ($thumbnailUploadedFiles as $index => $thumbnailUploadedFile) {
    
            // Use prepared statement to prevent SQL injection
            $stmt = $conn->prepare("INSERT INTO component_assets (component_id, asset_path) VALUES (?, ?)");
            $stmt->bind_param("is", $component_id, $thumbnailUploadedFile);
    
            if ($stmt->execute()) {
                echo "Thumbnail recorded successfully.";
            } else {
                echo "Error inserting thumbnail: " . $stmt->error;
            }
        }
    }

    


            
                



    }

    // Close the database connection
    $conn->close();
} else {
    echo "Form not submitted!";
}
