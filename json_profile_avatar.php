<?php
include "connection.php";

$json = array();

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$resultAvatar = $conn->query($sql);

while ($fetchedAvatar = $resultAvatar->fetch_assoc()) {
    $title = '<h6>Username: </h6>';

    $avatar = $fetchedAvatar['avatar'];

    $input = $avatar;

    $edit = '
        <button type="button">Edit</button>
    ';


    $json[] = array(
        "title" => $title,
        "input" => $input,
        "edit" => $edit,
    );
}



echo json_encode($json);
