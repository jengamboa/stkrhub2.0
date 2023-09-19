<?php

if (isset($_POST['user_id']) && isset($_FILES['avatar'])) {
    $user_id = $_POST['user_id'];
    $avatarFile = $_FILES['avatar'];

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($avatarFile['type'], $allowedTypes)) {
        http_response_code(400); // Bad Request
        echo json_encode(["error" => "Invalid file type"]);
        exit();
    }

    $uploadDirectory = 'uploads/avatars/';

    $uniqueID = uniqid();
    $avatarFileName = $uniqueID . '_' . basename($avatarFile['name']);

    if (!file_exists($uploadDirectory)) {
        mkdir($uploadDirectory, 0755, true);
    }

    $destinationPath = $uploadDirectory . $avatarFileName;
    if (move_uploaded_file($avatarFile['tmp_name'], $destinationPath)) {
        include "connection.php";

        $sql = "UPDATE users SET avatar = '$destinationPath' WHERE user_id = $user_id";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "Error updating avatar: " . $conn->error]);
        }

        $conn->close();
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Failed to move uploaded file"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid parameters"]);
}
