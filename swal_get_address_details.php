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

        $region = "SELECT * FROM region WHERE region_name != '" . $row['region'] . "'";
        $region_qry = mysqli_query($conn, $region);

        $current_region = "SELECT * FROM region WHERE region_name = '" . $row['region'] . "'";
        $cregion = mysqli_query($conn,$current_region);
        $current_r = mysqli_fetch_assoc($cregion);

        

        $current_province = "SELECT * FROM province WHERE province_name = '" . $row['province'] . "'";
        $cprovince = mysqli_query($conn, $current_province);
        $current_p = mysqli_fetch_assoc($cprovince);
        $p_id = $current_p['region_id'];

        $province = "SELECT * FROM province WHERE region_id = $p_id";
        $province_qry = mysqli_query($conn, $province);

        $current_city = "SELECT * FROM city WHERE city_name = '" . $row['city'] . "'";
        $ccity = mysqli_query($conn, $current_city);
        $current_c = mysqli_fetch_assoc($ccity);
        $c_id = $current_c['province_id'];

        $city = "SELECT * FROM city WHERE province_id = $c_id";
        $city_qry = mysqli_query($conn, $city);

        $current_barangay = "SELECT * FROM barangay WHERE barangay_name = '" . $row['barangay'] . "'";
        $cbarangay = mysqli_query($conn, $current_barangay);
        $current_b = mysqli_fetch_assoc($cbarangay);
        $b_id = $current_b['city_id'];

        $barangay = "SELECT * FROM barangay WHERE city_id = $b_id";
        $barangay_qry = mysqli_query($conn, $barangay);

        // Create a form with input fields for editing address details


        echo '
            <form id="editAddressForm">
                <input type="hidden" name="addressId" value="' . $addressId . '">
                <label for="editedFullname">Fullname:</label>
                <input type="text" id="editedFullname" name="editedFullname" value="' . htmlspecialchars($row['fullname']) . '" required><br>
                
                <label for="editedNumber">Number:</label>
                <input type="text" id="editedNumber" name="editedNumber" value="' . htmlspecialchars($row['number']) . '" required><br>

                <label for="editedregion_"> Region:</label>
                <select id="editedregion_" name="editedregion" required>
                    <option value="' .$current_r['id']. '"> ' . htmlspecialchars($row['region']) . '</option>';

        // Generate options for regions
        while ($region_row = mysqli_fetch_assoc($region_qry)) {
            echo '<option value="' .$region_row['id']. '"> ' .$region_row['region_name']. '</option>';
        }

        echo '</select><br>

                <label for="editedprovince_"> Province:</label>
                <select id="editedprovince_" name="editedprovince" required>
                    <option value="' .$current_p['id']. '"> ' . htmlspecialchars($row['province']) . '</option>';
        
                    while ($province_row = mysqli_fetch_assoc($province_qry)) {
                        echo '<option value="' .$province_row['id']. '"> ' .$province_row['province_name']. '</option>';
                    }
                    
        echo '</select><br>

                <label for="editedcity_"> City:</label>
                <select id="editedcity_" name="editedcity" required>
                    <option value="' .$current_c['id']. '"> ' . htmlspecialchars($row['city']) . '</option>';

                    while ($city_row = mysqli_fetch_assoc($city_qry)) {
                        echo '<option value="' .$city_row['id']. '"> ' .$city_row['city_name']. '</option>';
                    }
                    
        echo '</select><br>

                <label for="editedbarangay_"> Barangay:</label>
                <select id="editedbarangay_" name="editedbarangay" required>
                    <option value=""> ' . htmlspecialchars($row['barangay']) . '</option>';

                    while ($barangay_row = mysqli_fetch_assoc($barangay_qry)) {
                        echo '<option value="' .$barangay_row['id']. '"> ' .$barangay_row['barangay_name']. '</option>';
                    }
                    
        echo '</select><br>
                
                <label for="editedZip">ZIP Code:</label>
                <input type="text" id="editedZip" name="editedZip" value="' . htmlspecialchars($row['zip']) . '" required><br>
                
                <label for="editedStreet">Street:</label>
                <input type="text" id="editedStreet" name="editedStreet" value="' . htmlspecialchars($row['street']) . '" required><br>
                
                <!-- Add a submit button here -->
                <input type="submit" value="Save">
            </form>';

        if ($isDefault == 1) {
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


        echo '

                
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
