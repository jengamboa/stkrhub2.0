<?php
include 'connection.php';

$sql = 'SELECT courier_name FROM courier';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $courierNames = array();
  while ($row = $result->fetch_assoc()) {
    $courierNames[] = array('courier_name' => $row['courier_name']);
  }

  // Return the data as JSON
  echo json_encode($courierNames);
} else {
  // Handle the case where no data is found
  echo '[]';
}

$conn->close();
?>
