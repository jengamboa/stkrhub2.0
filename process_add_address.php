<?php
include 'connection.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Handle the case where the user is not logged in, e.g., redirect to a login page
    header("Location: login_page.php");
    exit();
}

// Get the user_id from the SESSION
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $fullname = $_POST['fullname'];
    $number = $_POST['number'];
    $region = $_POST['region'];
    $province = $_POST['province'];
    $city = $_POST['city'];
    $barangay = $_POST['barangay'];
    $zip = $_POST['zip'];
    $street = $_POST['street'];

    // Check if "Make default address" checkbox is checked
    $is_default = isset($_POST['make_default']) ? 1 : 0;

    // Get the current date and time
    $created_at = date("Y-m-d H:i:s");

    // Start a transaction
    mysqli_autocommit($conn, false);

    // If "Make default" is checked, update existing addresses to set is_default to 0
    if ($is_default == 1) {
        $updateDefaultSQL = "UPDATE addresses SET is_default = 0 WHERE user_id = $user_id";
        if (!mysqli_query($conn, $updateDefaultSQL)) {
            // Handle the case where the update failed
            echo "Error updating default addresses: " . mysqli_error($conn);
            mysqli_rollback($conn);
            mysqli_autocommit($conn, true);
            exit();
        }
    }

    // Insert the new address
    $insertAddressSQL = "INSERT INTO addresses (user_id, fullname, number, region, province, city, barangay, zip, street, is_default, created_at)
                         VALUES ($user_id, '$fullname', '$number', '$region', '$province', '$city', '$barangay', '$zip', '$street', $is_default, '$created_at')";

    if (mysqli_query($conn, $insertAddressSQL)) {
        // Commit the transaction
        mysqli_commit($conn);
        header("Location: address_page.php");
        exit();
    } else {
        // Rollback the transaction and handle the case where the insertion failed
        mysqli_rollback($conn);
        echo "Error inserting address: " . mysqli_error($conn);
    }

    // Restore autocommit mode
    mysqli_autocommit($conn, true);
} else {
    // Handle invalid requests
    echo "Invalid request.";
}
?>
