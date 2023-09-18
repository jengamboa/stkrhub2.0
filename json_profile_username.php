<?php
include "connection.php";

$json = array();

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$resultUsers = $conn->query($sql);

while ($fetched = $resultUsers->fetch_assoc()) {
    $title = '<h6>Username: </h6>';

    $username = $fetched['username'];

    $input = '
        <input 
            type="text" 
            value="'.$username.'" 
            readonly>
    ';

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
