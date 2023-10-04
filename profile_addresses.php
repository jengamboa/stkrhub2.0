<?php
session_start();
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>


    <!-- CSS ================================ -->
    <link rel="stylesheet" href="css/linearicons.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/font-awesome.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/themify-icons.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/bootstrap.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/owl.carousel.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/nice-select.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/nouislider.min.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/ion.rangeSlider.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="css/magnific-popup.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="css/main.css?<?php echo time(); ?>">

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>



</head>

<body>
    <?php
    include 'connection.php';
    include 'html/page_header.php';

    $region = "SELECT * FROM region";
    $region_qry = mysqli_query($conn, $region);
    ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Element Page</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Element</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container">

            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills">
                        <a class="nav-link active" href="profile_index.php">My Account</a>

                        <a class="nav-link " href="profile_all.php">My Purchase</a>

                        <a class="nav-link " href="process_logout.php">Logout</a>


                    </div>
                </div>

                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-myaccount" role="tabpanel" aria-labelledby="v-pills-myaccount-tab">

                            <!-- laman -->
                            <nav>
                                <div class="nav nav-tabs">
                                    <a class="nav-item nav-link " href="profile_index.php">Profile</a>

                                    <a class="nav-item nav-link active" href="profile_addresses.php">Addresses</a>

                                    <a class="nav-item nav-link" href="profile_password.php">Change Password</a>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">



                                <div class="tab-pane fade show active" id="nav-addresses" role="tabpanel" aria-labelledby="nav-addresses-tab">
                                    <section style="padding: 20px;">
                                        <div class="container">

                                            <button id="addAddressBtn">Add Address</button>

                                            <!-- DataTables Address  -->
                                            <table id="profileAddress" class="display">
                                                <!-- <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Input</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                </thead> -->

                                                <tbody>
                                                    <!-- User data will be displayed here -->
                                                </tbody>
                                            </table>

                                        </div>
                                    </section>
                                </div>



                            </div>
                            <!-- /laman -->

                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Sample Area -->




    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->

    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>

    <!-- Include DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Filepond JavaScript -->
    <script src="https://unpkg.com/filepond@4.23.1/dist/filepond.min.js"></script>

    <script>
        $(document).ready(function() {

            //DataTables
            var user_id = <?php echo $user_id; ?>;

            $('#profileAddress').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,

                "ajax": {
                    "url": "json_profile_addresses.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "checkbox"
                    },
                    {
                        "data": "editButton"
                    },
                    {
                        "data": "address"
                    },
                    {
                        "data": "deleteButton"
                    },

                ]
            });


            // Function to handle the SweetAlert dialog and AJAX request
            function confirmDefaultAddress(addressId) {
                Swal.fire({
                    title: "Do you want it to be a Default Address?",
                    icon: "question",
                    showCancelButton: true,
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Yes," send AJAX request
                        $.ajax({
                            url: "swal_process_default_address.php",
                            method: "POST",
                            data: {
                                addressId: addressId,
                            },
                            success: function(response) {
                                // Handle the response if needed
                                // You can update the DataTable or perform other actions
                                // based on the server's response.

                                // Reload the DataTable
                                $('#profileAddress').DataTable().ajax.reload();
                            },
                            error: function() {
                                // Handle any AJAX errors here
                            },
                        });
                    } else {
                        // User clicked "No" or canceled the dialog
                        // Reload the DataTable (optional, depending on your use case)
                        $('#profileAddress').DataTable().ajax.reload();
                    }
                });
            }

            // Add a click event listener to the radio buttons
            $('#profileAddress').on('click', '.address-checkbox', function() {
                var addressId = $(this).data('address-id');
                confirmDefaultAddress(addressId);
            });





            // Add a click event listener to the "Edit" buttons
            $('#profileAddress').on('click', '.edit-btn', function() {
                // Get the address ID associated with the clicked "Edit" button
                var addressId = $(this).data('address-id');

                // Fetch the address details for the specified address ID from the server
                $.ajax({
                    url: "swal_get_address_details.php", // Create this PHP file to fetch address details by ID
                    method: "GET",
                    data: {
                        addressId: addressId,
                    },
                    success: function(response) {
                        // Handle the response and show a SweetAlert for editing
                        Swal.fire({
                            title: "Edit Address",
                            html: response, // Include the fetched address details in the SweetAlert content
                            showCancelButton: true,
                            confirmButtonText: "Save",
                            cancelButtonText: "Cancel",
                            preConfirm: () => {
                                // Handle the "Save" button click here
                                var formData = {
                                    addressId: addressId,
                                    // Retrieve and collect edited address details from the SweetAlert form fields
                                    fullname: $('#editedFullname').val(),
                                    number: $('#editedNumber').val(),
                                    region: $('#editedregion_').val(),
                                    province: $('#editedprovince_').val(),
                                    city: $('#editedcity_').val(),
                                    barangay: $('#editedbarangay_').val(),
                                    zip: $('#editedZip').val(),
                                    street: $('#editedStreet').val(),
                                };

                                // Send an AJAX request to update the address information in the database
                                $.ajax({
                                    url: "swal_update_address.php", // Create this PHP file to update the address
                                    method: "POST",
                                    data: formData,
                                    success: function() {
                                        // Reload the DataTable after the address is updated
                                        $('#profileAddress').DataTable().ajax.reload();

                                        // Show a success message with Swal
                                        Swal.fire({
                                            title: "Success",
                                            text: "Address updated successfully!",
                                            icon: "success",
                                        });
                                    },
                                    error: function() {
                                        // Handle any AJAX errors here
                                    },
                                });
                            },
                        });

                        $('#editedregion_').on('change', function() {
                    var region_id = $(this).val();
                    console.log(region_id);
                    $.ajax({
                        url:'option_province.php',
                        type:"POST",
                        data:{
                            region_data:region_id
                        },
                        success:function(result){
                            $('#editedprovince_').html(result);
                            //console.log(result);
                        }
                    })
                });

                $('#editedprovince_').on('change', function() {
                    var province_id = $(this).val();
                    //console.log(province_id); 
                    $.ajax({
                        url:'option_city.php',
                        type:"POST",
                        data:{
                            province_data:province_id
                        },
                        success:function(data){
                            $('#editedcity_').html(data);
                            //console.log(result);
                        }
                    })
                });

                $('#editedcity_').on('change', function() {
                    var city_id = $(this).val();
                    //console.log(province_id); 
                    $.ajax({
                        url:'option_barangay.php',
                        type:"POST",
                        data:{
                            city_data:city_id
                        },
                        success:function(data){
                            $('#editedbarangay_').html(data);
                            //console.log(result);
                        }
                    })
                });
                    },
                    error: function() {
                        // Handle any AJAX errors here
                    },
                });

                

            });





            // Add a click event listener to the "Delete" buttons
            $('#profileAddress').on('click', '.delete-btn', function() {
                var addressId = $(this).data('address-id');

                Swal.fire({
                    title: "Confirm Delete",
                    text: "Are you sure you want to delete this address?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Delete",
                    cancelButtonText: "Cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User clicked "Delete," send AJAX request to delete the address
                        $.ajax({
                            url: "swal_delete_address.php", // Create this PHP file to delete the address
                            method: "POST",
                            data: {
                                addressId: addressId,
                            },
                            success: function(response) {


                                // Reload the DataTable
                                $('#profileAddress').DataTable().ajax.reload();
                            },
                            error: function() {
                                // Handle any AJAX errors here
                            },
                        });
                    }
                });    
            });





            $(document).ready(function() {      // Add a click event listener to the "Add Address" button
                $('#addAddressBtn').on('click', function() {

                    Swal.fire({

                        title: "Add Address",
                        html: '<div class="form-container">' +
                            '<label for="fullname">Fullname:</label>' +
                            '<input type="text" id="fullname" name="fullname" required><br>' +

                            '<label for="number">Number:</label>' +
                            '<input type="text" id="number" name="number" required><br>' +

                            '<label for="region"> Region:</label>' +
                            '<select id="region" name="region" required><br>' +
                            '<option selected disabled>  Select Region </option>' +
                            '<?php while ($row = mysqli_fetch_assoc($region_qry)) : ?>' +
                            '<option value="<?php echo $row['id']; ?>"><?php echo $row['region_name']; ?></option>' +
                            '<?php endwhile; ?>' +
                            '</select><br>' +

                            '<label for="province">Province:</label>' +
                            '<select id="province" name="province" required><br>' +
                            '<option selected disabled>  Select Province </option>' +
                            '</select><br>' +

                            '<label for="city">City:</label>' +
                            '<select id="city" name="city" required><br>' +
                            '<option value="city">Select City</option>' +
                            '</select><br>' +

                            '<label for="barangay">Barangay:</label>' + 
                            '<select id="barangay" name="barangay" required><br>' +
                            '<option value="barangay">Select Barangay</option>' +
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

                    $('#region').on('change', function() {
                    var region_id = $(this).val();
                    //console.log(region_id);
                    $.ajax({
                        url:'option_province.php',
                        type:"POST",
                        data:{
                            region_data:region_id
                        },
                        success:function(result){
                            $('#province').html(result);
                            //console.log(result);
                        }
                    })
                });

                $('#province').on('change', function() {
                    var province_id = $(this).val();
                    //console.log(province_id); 
                    $.ajax({
                        url:'option_city.php',
                        type:"POST",
                        data:{
                            province_data:province_id
                        },
                        success:function(data){
                            $('#city').html(data);
                            //console.log(result);
                        }
                    })
                });

                $('#city').on('change', function() {
                    var city_id = $(this).val();
                    //console.log(province_id); 
                    $.ajax({
                        url:'option_barangay.php',
                        type:"POST",
                        data:{
                            city_data:city_id
                        },
                        success:function(data){
                            $('#barangay').html(data);
                            //console.log(result);
                        }
                    })
                });






                });
                
            });
        });
        
    </script>


</body>

</html>