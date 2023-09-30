<?php 
include 'connection.php';

$province_id = $_POST['province_data'];

$city = "SELECT * FROM city WHERE province_id = $province_id";

$city_qry = mysqli_query($conn,$city);
//$output = "";
$output = '<option value=""> Select City </option>';
while ($city_row = mysqli_fetch_assoc($city_qry)){
    $output .= '<option value="'.$city_row['id'].'">' . $city_row['city_name'] . '</option>';
}
echo $output;

?>