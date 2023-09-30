<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add Address</title>
    <!-- Include jQuery and SweetAlert library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>
<body>
    <!-- Add Address Button -->
    <button id="addAddressBtn">Add Address</button>

    <script>
        $(document).ready(function() {
            // Add a click event listener to the "Add Address" button
            $('#addAddressBtn').on('click', function() {
                // Create a function to populate the "Province" select based on the selected "Region"
                function populateProvinces(regionId) {
                    // Clear existing options
                    $('#province').empty();

                    // Fetch provinces based on the selected region using AJAX
                    $.ajax({
                        url: 'get_provinces.php', // Replace with your URL to fetch provinces
                        method: 'GET',
                        data: { region: regionId }, // Pass the selected region
                        success: function(data) {
                            // Assuming the response is an array of objects with 'id' and 'province_name'
                            data.forEach(function(province) {
                                $('#province').append($('<option>', {
                                    value: province.id,
                                    text: province.province_name
                                }));
                            });
                        },
                        error: function() {
                            // Handle AJAX errors
                        }
                    });
                }

                Swal.fire({
                    title: "Add Address",
                    html: '<div class="form-container">' +
                        '<label for="fullname">Fullname:</label>' +
                        '<input type="text" id="fullname" name="fullname" required><br>' +

                        '<label for="number">Number:</label>' +
                        '<input type="text" id="number" name="number" required><br>' +

                        '<label for="region"> Region:</label>' +
                        '<select id="region" name="region" required>' +
                        '<option selected disabled>  Select Region </option>' +
                        '</select><br>' +

                        '<label for="province">Province:</label>' +
                        '<select id="province" name="province" required>' +
                        '<option selected disabled>  Select Province </option>' +
                        '</select><br>' +

                        '<label for="city">City:</label>' +
                        '<select id="city" name="city" required>' +
                        '<option value="city">City</option>' +
                        '</select><br>' +

                        '<label for="barangay">Barangay:</label>' +
                        '<select id="barangay" name="barangay" required>' +
                        '<option value="barangay">Barangay</option>' +
                        '</select><br>' +

                        '<label for="zip">ZIP Code:</label>' +
                        '<input type="text" id="zip" name="zip" required><br>' +

                        '<label for="street">Street:</label>' +
                        '<input type="text" id="street" name="street" required><br>' +
                        '</div>',
                    showCancelButton: true,
                    confirmButtonText: "Add",
                    cancelButtonText: "Cancel",
                    preConfirm: () => {
                        // Handle the "Add" button click here
                        var formData = {
                            fullname: $('#fullname').val(),
                            number: $('#number').val(),
                            region: $('#region').val(),
                            province: $('#province').val(),
                            city: $('#city').val(),
                            barangay: $('#barangay').val(),
                            zip: $('#zip').val(),
                            street: $('#street').val(),
                        };

                        // Send an AJAX request to add the address
                        return $.ajax({
                            url: "swal_add_address.php", // Create this PHP file to add the address
                            method: "POST",
                            data: formData,
                        });
                    },
                }).then((result) => {
                    // Handle the AJAX response
                    if (result.isConfirmed) {
                        if (result.value === "success") {
                            // Address added successfully
                            Swal.fire("Success", "Address added successfully", "success");
                            // Reload the DataTable to display the new address
                            $('#profileAddress').DataTable().ajax.reload();
                        } else {
                            // Error occurred while adding the address
                            Swal.fire("Error", "Error adding address", "error");
                        }
                    }
                });

                // Populate the "Region" select based on your data source (e.g., AJAX)
                $.ajax({
                    url: 'get_regions.php', // Replace with your URL to fetch regions
                    method: 'GET',
                    success: function(data) {
                        // Assuming the response is an array of objects with 'id' and 'region_name'
                        data.forEach(function(region) {
                            $('#region').append($('<option>', {
                                value: region.id,
                                text: region.region_name
                            }));
                        });
                    },
                    error: function() {
                        // Handle AJAX errors
                    }
                });

                // Add an event listener to dynamically populate "Province" based on "Region" selection
                $('#region').on('change', function() {
                    var selectedRegionId = $(this).val();
                    populateProvinces(selectedRegionId);
                });
            });
        });
    </script>
</body>
</html>
