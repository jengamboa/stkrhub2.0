<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['selectedItems']) && is_array($_POST['selectedItems'])) {
    $selectedCartIds = $_POST['selectedItems'];
    echo '<h2>Selected Cart IDs:</h2>';
    echo '<pre>';
    print_r($selectedCartIds);
    echo '</pre>';
} else {
    echo 'No items selected.';
}
?>
