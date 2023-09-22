<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if a POST request with a 'value' parameter was made
    if (isset($_POST['value'])) {
        $selectedValue = $_POST['value'];
        // Echo the selected value
        echo "Selected value: " . $selectedValue;
    } else {
        // Handle the case where 'value' parameter is not set
        echo "No value selected.";
    }
} else {
    // Handle other request methods (GET, etc.) if needed
    echo "Invalid request method.";
}
?>
