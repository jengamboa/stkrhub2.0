<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $uploadDirectory = 'uploads/';

    if (!is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    if (!empty($_FILES['slideFiles']) && is_array($_FILES['slideFiles']['tmp_name'])) {
        foreach ($_FILES['slideFiles']['tmp_name'] as $index => $tmpName) {
            $originalName = $_FILES['slideFiles']['name'][$index];
            $targetPath = $uploadDirectory . $originalName;

            if (move_uploaded_file($tmpName, $targetPath)) {
                // File moved successfully
                echo "File '$originalName' uploaded and moved to '$uploadDirectory'.<br>";
            } else {
                // Error moving file
                echo "Error uploading file '$originalName'.<br>";
            }
        }
    } else {
        echo "No files uploaded.";
    }
}
?>
