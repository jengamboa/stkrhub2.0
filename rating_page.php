<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel'])) {
    $order_id = $_POST['order_id'];
    $published_game_id = $_POST['published_game_id'];

    echo $order_id . '<br>';
    echo $published_game_id;
}
?>
