<?php 
include 'connection.php';

$city_id = $_POST['city_data'];

$barangay = "SELECT * FROM barangay WHERE city_id = $city_id";

$barangay_qry = mysqli_query($conn,$barangay);
//$output = "";
$output = '<option value=""> Select Barangay </option>';
while ($barangay_row = mysqli_fetch_assoc($barangay_qry)){
    $output .= '<option value="'.$barangay_row['id'].'">' . $barangay_row['barangay_name'] . '</option>';
}
echo $output;

?>