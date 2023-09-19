<?php
include "connection.php"; // Include your database connection script

if (isset($_GET['addressId'])) {
    $addressId = $_GET['addressId'];

    // Prepare and execute a query to fetch the address details
    $sql = "SELECT * FROM addresses WHERE address_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $addressId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Create a form with input fields for editing address details
        echo '
            <form id="editAddressForm">
                <input type="hidden" name="addressId" value="' . $addressId . '">
                <label for="editedFullname">Fullname:</label>
                <input type="text" id="editedFullname" name="editedFullname" value="' . htmlspecialchars($row['fullname']) . '" required><br>
                
                <label for="editedNumber">Number:</label>
                <input type="text" id="editedNumber" name="editedNumber" value="' . htmlspecialchars($row['number']) . '" required><br>

                <label for="editedRegion">Region:</label>
                <input type="text" id="editedRegion" name="editedRegion" value="' . htmlspecialchars($row['region']) . '" required><br>
                
                <label for="editedProvince">Province:</label>
                <input type="text" id="editedProvince" name="editedProvince" value="' . htmlspecialchars($row['province']) . '" required><br>
                
                <label for="editedCity">City:</label>
                <input type="text" id="editedCity" name="editedCity" value="' . htmlspecialchars($row['city']) . '" required><br>
                
                <label for="editedBarangay">Barangay:</label>
                <input type="text" id="editedBarangay" name="editedBarangay" value="' . htmlspecialchars($row['barangay']) . '" required><br>
                
                <label for="editedZip">ZIP Code:</label>
                <input type="text" id="editedZip" name="editedZip" value="' . htmlspecialchars($row['zip']) . '" required><br>
                
                <label for="editedStreet">Street:</label>
                <input type="text" id="editedStreet" name="editedStreet" value="' . htmlspecialchars($row['street']) . '" required><br>
            </form>
        ';
    } else {
        echo "Address not found.";
    }

    // Close the database connection
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
