<?php
include "connection.php";

$json = array();

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$resultAvatar = $conn->query($sql);

while ($fetchedAvatar = $resultAvatar->fetch_assoc()) {
    $title = '<h6>Username: </h6>';

    $avatar = $fetchedAvatar['avatar'];

    $edit = '
        <button type="button" class="edit-btn">Edit</button>
    ';

    $input = '
        <img 
            src="' . $avatar . '" 
            class="user-avatar"
            
            style="
                width:100px
            "
        >

        ' . $edit . '
    ';




    $json[] = array(
        "title" => $title,
        "input" => $input,
    );
}



echo json_encode($json);
