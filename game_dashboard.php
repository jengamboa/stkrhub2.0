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
        <?php include 'css/body.css' ?><?php include 'css/header.css'; ?>#infoTable .odd {
            background-color: transparent;
        }


        table.dataTable,
        table.dataTable thead,
        table.dataTable tbody,
        table.dataTable tr,
        table.dataTable td,
        table.dataTable th,
        table.dataTable tbody tr.even,
        table.dataTable tbody tr.odd {
            border: none !important;
        }

        .sticky-wrapper {
            top: 0px !important;
        }

        .header_area .main_menu .main_box {
            max-width: 100%;
        }

        .form-control::placeholder {
            font-size: 14px;
            /* Adjust the font size as needed */
        }



        /* edit button */
        .edit-game {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #90ee90;
        }

        /* delete button */
        .delete-game {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #dc3545;
        }

        .delete-component {
            background-color: transparent !important;
            border: none;
            cursor: pointer;

            color: #dc3545;
        }

        .approve-game {
            background-color: #1f2243 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #f7f799;
        }

        .cancel-ticket {
            background-color: #dc3545 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #f7f799;
        }

        label {
            color: white;
        }


        /* datatables */
        table.dataTable.stripe tbody tr.even,
        table.dataTable.display tbody tr.even {
            background-color: #15172e;
        }

        table.dataTable.stripe tbody tr.odd,
        table.dataTable.display tbody tr.odd {
            background-color: #1f2243;
        }

        .odd {
            margin: 20px;
        }

        #userTable {
            box-shadow: 0 0 10px #000000;
        }

        tr .odd {
            padding: 10rem;
        }

        table.dataTable,
        table.dataTable thead,
        table.dataTable tbody,
        table.dataTable tr,
        table.dataTable td,
        table.dataTable th,
        table.dataTable tbody tr.even,
        table.dataTable tbody tr.odd {
            border: none !important;
        }

        input[type="search"] {
            color: white;
        }

        .approve-game[disabled] {
            background-color: #ccc;
            color: #777;
            cursor: not-allowed;
        }
    </style>
</head>

<body>
    <?php include 'html/page_header.php'; ?>

    <!-- Back to top button -->
    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container">

            <h1><a href="create_game_page.php#section1" class="fa-solid fa-arrow-left" style="color: #26d3e0; cursor:pointer;"></a> Game Dashboard</h1>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <table id="infoTable" class="display" style="width: 100%;">
                            <tbody>
                            </tbody>
                        </table>
                    </div>

                    <div class="col">
                        <div class="container" style="display:flex; flex-direction:column; gap: 20px;">
                            <?php
                            $sqlTutorials = "SELECT * FROM tutorials WHERE designation = 'create_game' LIMIT 1";
                            $result = $conn->query($sqlTutorials);

                            while ($fetchedTutorials = $result->fetch_assoc()) {
                                $tutorial_id = $fetchedTutorials['tutorial_id'];
                                $tutorial_title = $fetchedTutorials['tutorial_title'];
                                $tutorial_description = $fetchedTutorials['tutorial_description'];
                                $tutorial_link = $fetchedTutorials['tutorial_link'];;
                                $is_primary = $fetchedTutorials['is_primary'];
                                $time_added = $fetchedTutorials['time_added'];

                                echo '
                            <div class="row s_product_inner">
                                <div class="col-lg-8">
                                    <div class="iframe-container">
                                        <iframe class="iframe" src="' . $tutorial_link . '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                    </div>
                                </div>

                                <div class="col-lg-4 offset-lg-1" style="margin-left: 0px; margin-top: 0px;">
                                    <div class="s_product_text" style="margin-top: 20px;line-height: 10px;">
                                        <h6>' . $tutorial_title . '</h6>

                                        <div style="
                                            width: 100%;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 7;
                                            -webkit-box-orient:vertical;
                                            overflow: hidden;
                                            ">
                                            <span class="small">
                                                ' . $tutorial_description . '
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            ';
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>


        </div>

        <div class="container">

            <table id="userTable" class="display" style="width: 100%;">
                <thead>
                    <tr>
                        <th>Component Name</th>
                        <th>Category</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th style="min-width: 170px; max-width: 170px;">Info</th>
                        <th>Modify</th>
                        <th style="min-width: 40px; max-width: 40px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>


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


            $('#infoTable').on('click', '.approve-game', function() {
                var gameId = $(this).data('gameid');
                var gameName = $(this).data('name');
                var gameDescription = $(this).data('description');
                var total_price = $(this).data('total_price');
                var ticket_price = $(this).data('ticket_price');

                Swal.fire({
                    title: 'Approve Game (Ticket Price: ' + ticket_price + ')',
                    text: 'Total Price: ' + total_price + '\gameId: ' + gameId +
                        '\nAre you sure you want to Approve this game?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Buy Ticket',
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: 'process_get_approved_game.php',
                            data: {
                                game_id: gameId,
                                name: gameName,
                                description: gameDescription,
                                total_price: total_price,
                                ticket_price: ticket_price,
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#infoTable').DataTable().ajax.reload();
                                    $('#cartCount').DataTable().ajax.reload();
                                    $('#userTable').DataTable().ajax.reload();
                                    Swal.fire('Success', response.message, 'success');
                                } else {
                                    $('#infoTable').DataTable().ajax.reload();
                                    $('#cartCount').DataTable().ajax.reload();
                                    $('#userTable').DataTable().ajax.reload();
                                    Swal.fire('Error', response.message, 'error');

                                }
                            },
                            error: function() {
                                $('#infoTable').DataTable().ajax.reload();
                                $('#cartCount').DataTable().ajax.reload();
                                $('#userTable').DataTable().ajax.reload();
                                Swal.fire('Error', 'Failed to build the game', 'error');
                            }
                        });
                    }
                });
            });


            $('#infoTable').on('click', '.cancel-ticket', function() {
                var gameId = $(this).data('gameid');
                var gameName = $(this).data('name');
                var gameDescription = $(this).data('description');
                var total_price = $(this).data('total_price');
                var ticket_price = $(this).data('ticket_price');

                Swal.fire({
                    title: 'Cancel Ticket',
                    text: '',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Cancel Ticket',
                    cancelButtonText: 'No, do not cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: 'process_cancel_ticket_cart.php',
                            data: {
                                game_id: gameId,
                                name: gameName,
                                description: gameDescription,
                                total_price: total_price,
                                ticket_price: ticket_price,
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    $('#infoTable').DataTable().ajax.reload();
                                    $('#cartCount').DataTable().ajax.reload();
                                    $('#userTable').DataTable().ajax.reload();
                                    Swal.fire('Success', response.message, 'success');
                                } else {
                                    $('#infoTable').DataTable().ajax.reload();
                                    $('#cartCount').DataTable().ajax.reload();
                                    $('#userTable').DataTable().ajax.reload();
                                    Swal.fire('Error', response.message, 'error');

                                }
                            },
                            error: function() {
                                $('#infoTable').DataTable().ajax.reload();
                                $('#cartCount').DataTable().ajax.reload();
                                $('#userTable').DataTable().ajax.reload();
                                Swal.fire('Error', 'Failed to Cancel Ticket', 'error');
                            }
                        });
                    }
                });
            });





            $('#infoTable').on('click', '.delete-game', function() {
                var gameId = $(this).data('game_id');

                // Create a SweetAlert2 confirmation dialog for deleting a game
                Swal.fire({
                    title: 'Delete Game (ID: ' + gameId + ')',
                    text: 'Are you sure you want to delete this game?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Send an AJAX request to delete the game
                        $.ajax({
                            type: 'POST',
                            url: 'process_delete_game.php', // Create a PHP script for deleting the game
                            data: {
                                game_id: gameId
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {

                                    // Optionally, you can refresh the DataTables table after deletion
                                    $('#infoTable').DataTable().ajax.reload();
                                    $('#userTable').DataTable().ajax.reload();

                                    $('#cartCount').DataTable().ajax.reload();

                                    Swal.fire('Success', response.message, 'success').then(function() {
                                        window.close();
                                        window.location.href = 'create_game_page.php#section1'; // Redirect to index.php
                                    });

                                } else {
                                    Swal.fire('Error', response.message, 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Error', 'Failed to delete the game', 'error');
                            }
                        });
                    }
                });
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