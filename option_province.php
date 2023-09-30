<?php 
include 'connection.php';

$region_id = $_POST['region_data'];

$province = "SELECT * FROM province WHERE region_id = $region_id";

$province_qry = mysqli_query($conn, $province);
//$output = "";
$output = '<option value=""> Select Province </option>';
while ($province_row = mysqli_fetch_assoc($province_qry)){
    $output .= '<option value="'.$province_row['id'].'">' . $province_row['province_name'] . '</option>';
}
echo $output;

?>