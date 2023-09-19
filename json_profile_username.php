<?php
include "connection.php";

$json = array();

$user_id = $_GET['user_id'];

$sql = "SELECT * FROM users WHERE user_id = $user_id";
$resultUsers = $conn->query($sql);

while ($fetched = $resultUsers->fetch_assoc()) {

    $username = $fetched['username'];
    $avatar = $fetched['avatar'];


    $row = '
    
        <div class="container">

            <div class="row">
                <div class="col-lg-2">
                    <h6>Username: </h6>
                </div>
                <div class="col-md-auto">
                    <input class="username-input" value="'.$username.'" readonly style="border: none;"> 
                    <button type="button" class="btn edit-btn">Edit</button>
                </div>
            </div> <br>

            <div class="row">
                <div class="col-lg-2">
                    <h6>Avatar: </h6>
                </div>
                <div class="col-md-auto">
                    <image src="'.$avatar.'" style="width: 200px;">
                    <button type="button" class="btn edit-btn-avatar">Edit</button>
                </div>
            </div>

        </div>
    
    ';


    $json[] = array(
        "row" => $row,

    );
}



echo json_encode($json);
