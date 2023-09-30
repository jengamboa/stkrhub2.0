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

        $isDefault = $row['is_default'];

        // Create a form with input fields for editing address details
        echo '
            <form id="editAddressForm">
                <input type="hidden" name="addressId" value="' . $addressId . '">
                <label for="editedFullname">Fullname:</label>
                <input type="text" id="editedFullname" name="editedFullname" value="' . htmlspecialchars($row['fullname']) . '" required><br>
                
                <label for="editedNumber">Number:</label>
                <input type="text" id="editedNumber" name="editedNumber" value="' . htmlspecialchars($row['number']) . '" required><br>

                <label for="editedregion"> Region:</label>
                <select id="region" name="region" required><br>
                <option value=""> ' . htmlspecialchars($row['region']). '</option>
                </select><br>

                <label for="editedprovince"> Province:</label>
                <select id="editedprovince" name="editedprovince" required><br>
                <option value=""> ' . htmlspecialchars($row['province']). '</option>
                </select><br>

                <label for="editedcity"> City:</label>
                <select id="editedcity" name="editedcity" required><br>
                <option value=""> ' . htmlspecialchars($row['city']). '</option>
                </select><br>

                <label for="editedbarangay"> Barangay:</label>
                <select id="editedbarangay" name="editedbarangay" required><br>
                <option value=""> ' . htmlspecialchars($row['barangay']). '</option>
                </select><br>
                
                <label for="editedZip">ZIP Code:</label>
                <input type="text" id="editedZip" name="editedZip" value="' . htmlspecialchars($row['zip']) . '" required><br>
                
                <label for="editedStreet">Street:</label>
                <input type="text" id="editedStreet" name="editedStreet" value="' . htmlspecialchars($row['street']) . '" required><br>

                ';

                if ($isDefault == 1){
                    echo '
                    <label for="setDefaultAddress">This is your Default Address:</label>
                    <input type="checkbox" id="setDefaultAddress" name="setDefaultAddress" checked disabled><br>

                    ';
                } else {
                    echo '
                    <label for="setDefaultAddress">Set this as the default address:</label>
                    <input type="checkbox" id="setDefaultAddress" name="setDefaultAddress"><br>
                    ';
                }


                echo'

                
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
