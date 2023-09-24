<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if there are uploaded files in the "logo" array (multiple file upload input)
    if (isset($_FILES["logo"]) && count($_FILES["logo"]["error"]) > 0) {
        // Handle multiple file uploads here
        // ...

        // The paths to the uploaded images should be stored in $uploadedFiles
    }

    // Check if there is a single uploaded file
    if (isset($_FILES["singleLogo"]) && $_FILES["singleLogo"]["error"] == 0) {
        // Specify a directory to store the single uploaded file (ensure it exists and is writable)
        $targetDir = "uploads/";

        // Create the directory if it doesn't exist
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        // Generate a unique filename for the single uploaded image
        $targetFile = $targetDir . uniqid() . "_" . basename($_FILES["singleLogo"]["name"]);

        // Move the single uploaded file to the specified directory
        if (move_uploaded_file($_FILES["singleLogo"]["tmp_name"], $targetFile)) {
            // Handle the single uploaded file here
            // ...

            // Echo the path to the single uploaded image
            echo $targetFile;
        } else {
            // Error handling for failed upload of the single file
            echo "Error: There was a problem uploading the single file.";
        }
    }

    // Handle the text input with name "description"
    if (isset($_POST["description"])) {
        $description = $_POST["description"];
        // You can use the $description variable here as needed
        // ...
    }
}
?>
