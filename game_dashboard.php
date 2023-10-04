<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login_page.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD']) {
    $game_id = $_GET['game_id'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Navigation with Hidden Sections</title>
    <!--CSS================================== -->
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
    <link rel="stylesheet" href="css/main2.css?<?php echo time(); ?>">

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">


    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        <?php include 'css/body.css' ?><?php include 'css/header.css'; ?>
        
        #infoTable td{
            /* <!-- glass morph--> */
            background: rgba(39, 42, 78, 0.57);
            border-radius: 7px 7px 7px 7px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5.7px);
            -webkit-backdrop-filter: blur(5.7px) !important;
        }
    </style>
</head>

<body>
    <?php include 'html/page_header.php'; ?>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">

        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container">
            <!-- DataTables Build Game  -->
            <table id="infoTable" class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Game Name</th>
                    </tr>
                </thead>

                <tbody>
                    <!-- User data will be displayed here -->
                </tbody>
            </table>
            <!-- /DataTables Build Game  -->
        </div>

        <div class="container">

            <!-- DataTables Game Components -->
            <table id="userTable" class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Component Name</th>
                        <th>Category</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Info</th>
                        <th>Modify</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- User data will be displayed here -->
                </tbody>
            </table>
            <!-- /DataTables Game Components -->


        </div>

        <div class="container">
            <a href="add_custom_component.php?game_id=<?php echo $game_id; ?>">Add Custom Game Component</a>
        </div>
    </section>
    <!-- End Sample Area -->

    <section class="sample-text-area">

    </section>





    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/countdown.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
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
            <?php include 'js/essential.php'; ?>


            $('#infoTable').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                ajax: {
                    url: "json_info_table.php",
                    data: {
                        game_id: <?php echo $game_id; ?>,
                        user_id: <?php echo $user_id; ?>
                    },
                    dataSrc: ""
                },
                columns: [{
                    data: "item"
                }, ]
            });


            var user_id = <?php echo $user_id; ?>;
            var game_id = <?php echo $game_id; ?>;

            $('#userTable').DataTable({
                searching: true,
                info: false,
                paging: false,
                ordering: false,
                "ajax": {
                    "url": "json_game_dashboard.php",
                    data: {
                        user_id: user_id,
                        game_id: game_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "component_name"
                    },
                    {
                        "data": "category"
                    },
                    {
                        "data": "price"
                    },
                    {
                        "data": "edit_quantity"
                    },
                    {
                        "data": "individual_price"
                    },
                    {
                        "data": "info"
                    },
                    {
                        "data": "modify"
                    },
                    {
                        "data": "delete"
                    },
                ]
            });


            // Handle color link clicks within the DataTable context
            $('#userTable').on('click', '.color-link', function() {

                var game_id = $(this).data('gameid');
                var component_id = $(this).data('componentid');
                var color_id = $(this).data('colorid');
                var added_component_id = $(this).data('addedcomponentid');

                // Store a reference to the DataTable
                var table = $('#userTable').DataTable();

                // Send AJAX request to process_update_color.php
                $.ajax({
                    type: 'GET',
                    url: 'process_update_color.php',
                    data: {
                        game_id: game_id,
                        component_id: component_id,
                        color_id: color_id,
                        added_component_id: added_component_id
                    },
                    success: function(response) {
                        // Handle the response if needed
                        console.log(response);

                        // Refresh the DataTable
                        // table.ajax.reload();
                        // Reload the DataTable
                        $('#userTable').DataTable().ajax.reload();
                        $('#infoTable').DataTable().ajax.reload();
                    },
                    error: function(error) {
                        // Handle errors if needed
                        console.error(error);
                    }
                });
            });


            // Listen for delete button click using event delegation
            $('#userTable').on('click', '.delete-component', function() {
                var game_id = $(this).data('gameid');
                var component_id = $(this).data('componentid');

                // Show a SweetAlert confirmation dialog
                Swal.fire({
                    title: 'Confirm Delete',
                    text: 'Are you sure you want to delete this component?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // User confirmed, proceed with deletion

                        // Store a reference to the DataTable
                        var table = $('#userTable').DataTable();

                        // Send AJAX request to delete_component.php
                        $.ajax({
                            type: 'POST',
                            url: 'delete_component.php',
                            data: {
                                game_id: game_id,
                                added_component_id: component_id
                            },
                            success: function(response) {
                                console.log(response);

                                // Refresh the DataTable after successful deletion
                                $('#userTable').DataTable().ajax.reload();
                                $('#infoTable').DataTable().ajax.reload();
                            }
                        });
                    }
                });
            });



            // Listen for changes to quantity input using event delegation
            $('#userTable').on('change', '.quantity-input', function() {
                var game_id = $(this).data('gameid');
                var component_id = $(this).data('componentid');
                var quantity = $(this).val();

                // Send AJAX request to update_quantity.php
                $.ajax({
                    type: 'POST',
                    url: 'update_quantity.php',
                    data: {
                        game_id: game_id,
                        added_component_id: component_id,
                        quantity: quantity
                    },
                    success: function(response) {
                        console.log(response);
                        // Call calculateTotalPrice function and update the total price display
                        var total_price = calculateTotalPrice(game_id);
                        $('#total-price').text(total_price);

                        // Refresh the DataTable
                        // table.ajax.reload();
                        $('#userTable').DataTable().ajax.reload();
                        $('#infoTable').DataTable().ajax.reload();
                    }
                });
            });

            function calculateTotalPrice(game_id) {
                // Your calculateTotalPrice logic here...
                // Return the calculated total price
            }



            // Listen for update custom design button click using event delegation
            $('#userTable').on('click', '.update-design', function() {
                var game_id = $(this).data("gameid");
                var component_id = $(this).data("componentid");
                var component_name = $(this).data("componentname");
                var component_price = $(this).data("componentprice");
                var component_category = $(this).data("componentcategory");
                var file_path = $(this).data("filepath");
                var originalFilename = $(this).attr("data-originalFilename");
                var added_component_id = $(this).data("addedcomponentid");

                // Show the current file in the SweetAlert message
                var currentFile = decodeURIComponent(file_path); // Decode the file path if needed

                // Create a form with an input file element
                var formHtml = `
                <form id="updateCustomDesignForm">
                    <input type="file" id="newCustomDesignFile" accept=".jpg, .png, .gif">
                </form>
            `;

                // Show a SweetAlert confirmation dialog with the form
                Swal.fire({
                    title: "Update Custom Design",
                    html: formHtml + "<p>Current File: " + originalFilename + "</p>",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Update",
                    preConfirm: function() {
                        // Handle the form submission
                        var formData = new FormData();
                        var newFile = $("#newCustomDesignFile")[0].files[0];
                        formData.append("game_id", game_id);
                        formData.append("component_id", component_id);
                        formData.append("newFile", newFile);
                        formData.append("added_component_id", added_component_id);

                        return $.ajax({
                            type: "POST",
                            url: "update_custom_design.php",
                            data: formData,
                            processData: false,
                            contentType: false,
                        });
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        if (result.value.success) {
                            Swal.fire("Success", result.value.message, "success");
                            // Reload the DataTable
                            $("#userTable").DataTable().ajax.reload();
                            $("#infoTable").DataTable().ajax.reload();
                        } else {
                            Swal.fire("Error", result.value.message, "error");
                        }
                    }
                });
            });






            $('#infoTable').on('click', '.edit-game', function() {
                var gameId = $(this).data('game_id');

                $.ajax({
                    type: 'POST',
                    url: 'get_game_details.php',
                    data: {
                        game_id: gameId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            var currentName = response.name;
                            var currentDescription = response.description;

                            Swal.fire({
                                title: 'Edit Game (ID: ' + gameId + ')',
                                html: '<label for="editName">Name:</label>' +
                                    '<input type="text" id="editName" class="swal2-input" placeholder="New Name" value="' + currentName + '">' +
                                    '<label for="editDescription">Description:</label>' +
                                    '<textarea id="editDescription" class="swal2-input" placeholder="New Description">' + currentDescription + '</textarea>',
                                icon: 'info',
                                showCancelButton: true,
                                confirmButtonText: 'Save',
                                cancelButtonText: 'Cancel',
                                preConfirm: function() {
                                    var newName = $('#editName').val();
                                    var newDescription = $('#editDescription').val();

                                    return $.ajax({
                                        type: 'POST',
                                        url: 'process_edit_game_details.php',
                                        data: {
                                            game_id: gameId,
                                            name: newName,
                                            description: newDescription
                                        },
                                    });
                                },
                            }).then(function(result) {
                                if (result.isConfirmed) {
                                    if (result.value.success) {
                                        Swal.fire('Success', result.value.message, 'success');
                                        // Reload the DataTable
                                        $('#userTable').DataTable().ajax.reload();
                                        $('#infoTable').DataTable().ajax.reload();

                                    } else {
                                        Swal.fire('Success', result.value.message, 'success');
                                        // Reload the DataTable
                                        $('#userTable').DataTable().ajax.reload();
                                        $('#infoTable').DataTable().ajax.reload();

                                    }
                                }
                            });
                        } else {
                            Swal.fire('Error', 'Failed to retrieve game details', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Failed to retrieve game details', 'error');
                    }
                });
            });
        });
    </script>

</body>

</html>