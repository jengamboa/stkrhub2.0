<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="img/icon.png">
    <meta name="author" content="CodePixar">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta charset="UTF-8">
    <title>My Games</title>


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
        <?php include 'css/body.css'; ?>
        .multi-step-bar {
            overflow: hidden;
            counter-reset: step;
            width: 75%;
            margin: 15px auto 30px;
        }

        li.step {
            text-align: center;
            list-style-type: none;
            color: blue;
            text-transform: CAPITALIZE;

            position: relative;
            font-weight: 600;

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }


        .section-step {
            padding: 20px;
            margin: 0px;
            display: none;
        }

        .section-step:target {
            display: block;
        }


        <?php include 'css/header.css'; ?>
        
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


        /* btn add */
        .Btn {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            width: 45px;
            height: 45px;
            border-radius: calc(45px/2);
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition-duration: .3s;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
            background: linear-gradient(144deg, #26d3e0, #b660e8);
        }

        /* plus sign */
        .sign {
            width: 100%;
            font-size: 1.7em;
            color: white;
            transition-duration: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* text */
        .text {
            position: absolute;
            right: 0%;
            width: 0%;
            opacity: 0;
            color: white;
            font-weight: 500;
            transition-duration: .3s;
        }

        /* hover effect on button width */
        .Btn:hover {
            width: 125px;
            transition-duration: .3s;
        }

        .Btn:hover .sign {
            width: 30%;
            transition-duration: .3s;
            padding-left: 15px;
        }

        /* hover effect button's text */
        .Btn:hover .text {
            opacity: 1;
            width: 70%;
            transition-duration: .3s;
            padding-right: 15px;
        }

        /* button click effect*/
        .Btn:active {
            transform: translate(2px, 2px);
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

        /* approve game button */
        .approve-game {
            background-color: #15172e !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;

            color: #f7f799;
        }

        .approve-game[disabled] {
            background-color: #ccc;
            color: #777;
            cursor: not-allowed;
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

        table.dataTable {
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
    </style>
</head>

<body>
    <?php
    $header_create_game = 'active';
    include 'html/page_header.php';

    ?>

    <!-- Back to top button -->
    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>


    <!-- Start Banner Area -->
    <section class="features-area">
        <div class="container" style="padding: 3rem;">
        </div>
    </section>
    <!-- End Banner Area -->



    <section class="features-area section-gap">
        <div class="container">

            <nav class="step">
                <ul class="multi-step-bar">

                    <div class="container">
                        <div class="row">

                            <!-- steps -->

                            <div class="col-sm">
                                <a href="#section1">
                                    <li class="step">
                                        <i class="fa-solid fa-compass-drafting"></i>
                                        <p>Create Game</p>
                                    </li>
                                </a>
                            </div>

                            <!-- <div class="col-sm">
                                <a href="#section2">
                                    <li class="step">
                                        <i class="fa-solid fa-puzzle-piece"></i>
                                        <p>Built Games</p>
                                    </li>
                                </a>
                            </div> -->

                            <!-- <div class="col-sm">
                                <a href="#section3">
                                    <li class="step">
                                        <i class="fa-solid fa-hourglass-start"></i>
                                        <p>Pending Games</p>
                                    </li>
                                </a>
                            </div> -->

                            <!-- <div class="col-sm">
                                <a href="#section4">
                                    <li class="step">
                                        <i class="fa-solid fa-road-barrier"></i>
                                        <p>Canceled Games</p>
                                    </li>
                                </a>
                            </div> -->

                            <div class="col-sm">
                                <a href="#section5">
                                    <li class="step">
                                        <i class="fa-solid fa-thumbs-up"></i>
                                        <p>Approved Games</p>
                                    </li>
                                </a>
                            </div>

                            <div class="col-sm">
                                <a href="#section6">
                                    <li class="step">
                                        <i class="fa-solid fa-money-bill"></i>
                                        <p>Purchased Games</p>
                                    </li>
                                </a>
                            </div>

                            <div class="col-sm">
                                <a href="#section7">
                                    <li class="step">
                                        <i class="fa-solid fa-flag-checkered"></i>
                                        <p>Published Games</p>
                                    </li>
                                </a>
                            </div>

                            <!-- /steps -->

                        </div>
                    </div>
                </ul>
            </nav>

            <!-- sections -->

            <div id="section1" class="section-step mt-0">
                <div class="row" style="width: 100%;">
                    <div class="col">

                        <div class="row">
                            <div class="col-4">
                                <h2>Created Games</h2>
                            </div>

                            <div class="col">
                                <button class="Btn" type="button" data-toggle="modal" data-target="#create_game_modal">
                                    <div class="sign">+</div>
                                    <div class="text">Create</div>
                                </button>
                            </div>
                        </div>


                        <table id="createGameTable" class="display" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th style="min-width: 80px; max-width: 80px;">Game Name</th>
                                    <th style="min-width: 80px; max-width: 80px;">Description</th>
                                    <th style="min-width: 80px; max-width: 80px;">Price</th>
                                    <th style="min-width: 80px; max-width: 80px;">Date Modified</th>
                                    <th style="min-width: 170px; max-width: 170px;">Status</th>
                                    <th style="min-width: 120px; max-width: 120px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Your table rows here -->
                            </tbody>
                        </table>



                    </div>

                </div>
            </div>

            <!-- <div id="section2" class="section-step">

                <table id="builtGameTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Built Game Name</th>
                            <th>Description</th>
                            <th>From what game</th>
                            <th>Price</th>
                            <th>Date Built</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>

            </div> -->

            <!-- <div id="section3" class="section-step">
                <table id="pendingGameTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Built Game Name</th>
                            <th>Description</th>
                            <th>From what game</th>
                            <th>Price</th>
                            <th>Date Built</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div> -->

            <!-- <div id="section4" class="section-step">
                <table id="canceledGameTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Built Game Name</th>
                            <th>Description</th>
                            <th>From what game</th>
                            <th>Price</th>
                            <th>Date Built</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                    </tbody>
                </table>
            </div> -->

            <div id="section5" class="section-step">
                <!-- DataTables approvedGameTable  -->
                <table id="approvedGameTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Built Game Name</th>
                            <th>Description</th>
                            <th>From what game</th>
                            <th>Price</th>
                            <th>Date Built</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- User data will be displayed here -->
                    </tbody>
                </table>
                <!-- /DataTables approvedGameTable  -->
            </div>

            <div id="section6" class="section-step">
                <!-- DataTables purchasedGameTable  -->
                <table id="purchasedGameTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Built Game Name</th>
                            <th>Description</th>
                            <th>From what game</th>
                            <th>Price</th>
                            <th>Date Built</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- User data will be displayed here -->
                    </tbody>
                </table>
                <!-- /DataTables purchasedGameTable  -->
            </div>

            <div id="section7" class="section-step">
                <!-- DataTables publishedGameTable  -->
                <table id="publishedGameTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Published Game Name</th>
                            <th>Edition</th>
                            <th>Category</th>
                            <th>Info</th>
                            <th>Published Date</th>
                            <th>Price and Markup</th>
                            <th>Total Earnings</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <!-- User data will be displayed here -->
                    </tbody>
                </table>
                <!-- /DataTables publishedGameTable  -->
            </div>

            <!-- /sections -->

        </div>
    </section>


    <!-- modals -->
    <div class="modal fade" id="create_game_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="
                background: rgba(39, 42, 78, 0.37);
				border-radius: 15px 15px 15px 15px;
				box-shadow: 0 4px 30px rgba(0, 0, 0, 0.2);
				backdrop-filter: blur(5.7px);
				-webkit-backdrop-filter: blur(5.7px);
				line-height: 0px !important;
                ">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Game</h5>
                </div>

                <form id="createGameForm">
                    <div class="modal-body">


                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Game Name:</label>
                            <input type="text" id="name" name="name" class="form-control" id="recipient-name" required>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Game Description:</label>
                            <textarea class="form-control" id="description" name="description" id="message-text"></textarea>
                        </div>



                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" style="border: none; background: linear-gradient(144deg, #26d3e0, #b660e8);">Create Game</button>
                    </div>
                </form>

            </div>
        </div>
    </div>



    <script src="js/vendor/jquery-2.2.4.min.js"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

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

            // mahalaga toh
            <?php include 'js/essential.php'; ?>

            $("#createGameForm").submit(function(event) {
                event.preventDefault(); // Prevent the default form submission

                var formData = {
                    name: $("#name").val(),
                    description: $("#description").val(),
                };

                $.ajax({
                    type: "POST",
                    url: "process_create_game.php",
                    data: formData,
                    dataType: "json",
                    encode: true,
                    success: function(response) {
                        if (response.success) {
                            // Clear the form fields
                            $("#name").val("");
                            $("#description").val("");

                            $('#create_game_modal').modal('hide');

                            // Reload the DataTable
                            $('#createGameTable').DataTable().ajax.reload();
                            $('#builtGameTable').DataTable().ajax.reload();
                            $('#pendingGameTable').DataTable().ajax.reload();

                            $('#canceledGameTable').DataTable().ajax.reload();
                            $('#approvedGameTable').DataTable().ajax.reload();
                            $('#purchasedGameTable').DataTable().ajax.reload();
                            $('#publishedGameTable').DataTable().ajax.reload();

                            $('#cartCount').DataTable().ajax.reload();

                            // Show a success SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                text: response.message,
                            });
                        } else {
                            // Show an error SweetAlert
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            });
                        }
                    }
                });


            });

            //DataTables
            var user_id = <?php echo $user_id; ?>;

            $('#createGameTable').DataTable({

                language: {
                    search: "",
                },

                searching: true,
                info: false,
                paging: false,
                ordering: false,

                "ajax": {
                    "url": "json_created_games.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [

                    {
                        "data": "game_link"
                    },
                    {
                        "data": "description"
                    },
                    {
                        "data": "total_price"
                    },
                    {
                        "data": "formatted_date"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "actions"
                    },


                ]
            });

            // search bar
            var searchInput = $('div.dataTables_filter input');
            $('#createGameTable thead th:nth-child(6)').append(searchInput);
            searchInput.attr('placeholder', 'Search here');
            searchInput.addClass('form-control');
            searchInput.css('width', '100%');




            $('#createGameTable').on('click', '.edit-game', function() {
                var gameId = $(this).data('gameid');

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
                                        $('#createGameTable').DataTable().ajax.reload();
                                        $('#builtGameTable').DataTable().ajax.reload();
                                        $('#pendingGameTable').DataTable().ajax.reload();

                                        $('#canceledGameTable').DataTable().ajax.reload();
                                        $('#approvedGameTable').DataTable().ajax.reload();
                                        $('#purchasedGameTable').DataTable().ajax.reload();
                                        $('#publishedGameTable').DataTable().ajax.reload();

                                        $('#cartCount').DataTable().ajax.reload();
                                    } else {
                                        Swal.fire('Success', result.value.message, 'success');
                                        // Reload the DataTable
                                        $('#createGameTable').DataTable().ajax.reload();
                                        $('#builtGameTable').DataTable().ajax.reload();
                                        $('#pendingGameTable').DataTable().ajax.reload();

                                        $('#canceledGameTable').DataTable().ajax.reload();
                                        $('#approvedGameTable').DataTable().ajax.reload();
                                        $('#purchasedGameTable').DataTable().ajax.reload();
                                        $('#publishedGameTable').DataTable().ajax.reload();

                                        $('#cartCount').DataTable().ajax.reload();
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





            // Add click event handler for "delete" buttons
            $('#createGameTable').on('click', '.delete-game', function() {
                var gameId = $(this).data('gameid');

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
                                    Swal.fire('Success', response.message, 'success');

                                    // Optionally, you can refresh the DataTables table after deletion
                                    $('#createGameTable').DataTable().ajax.reload();
                                    $('#builtGameTable').DataTable().ajax.reload();
                                    $('#pendingGameTable').DataTable().ajax.reload();

                                    $('#canceledGameTable').DataTable().ajax.reload();
                                    $('#approvedGameTable').DataTable().ajax.reload();
                                    $('#purchasedGameTable').DataTable().ajax.reload();
                                    $('#publishedGameTable').DataTable().ajax.reload();

                                    $('#cartCount').DataTable().ajax.reload();
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






            // ANDITO AKOO
            // Add click event handler for "build" buttons
            $('#createGameTable').on('click', '.approve-game', function() {
                var gameId = $(this).data('gameid');
                var gameName = $(this).data('name');
                var gameDescription = $(this).data('description');
                var total_price = $(this).data('total_price');
                var ticket_price = $(this).data('ticket_price');


                // Create a SweetAlert2 confirmation dialog for building a game
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
                        // Send an AJAX request to build the game
                        $.ajax({
                            type: 'POST',
                            // url: 'process_build_game.php',
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
                                    Swal.fire('Success', response.message, 'success');

                                    // Optionally, you can refresh the DataTables table after building
                                    $('#createGameTable').DataTable().ajax.reload();
                                    $('#builtGameTable').DataTable().ajax.reload();
                                    $('#pendingGameTable').DataTable().ajax.reload();

                                    $('#canceledGameTable').DataTable().ajax.reload();
                                    $('#approvedGameTable').DataTable().ajax.reload();
                                    $('#purchasedGameTable').DataTable().ajax.reload();
                                    $('#publishedGameTable').DataTable().ajax.reload();

                                    $('#cartCount').DataTable().ajax.reload();
                                } else {
                                    Swal.fire('Error', response.message, 'error');

                                }
                            },
                            error: function() {
                                Swal.fire('Error', 'Failed to build the game', 'error');
                            }
                        });
                    }
                });
            });




            // Add click event handler for "build" buttons
            $('#createGameTable').on('click', '.view-reason', function() {
                var game_id = $(this).data('game_id');
                var reason = $(this).data('reason');
                var file_path = $(this).data('file_path');

                var downloadLink = '';

                // Check if file_path is not NULL before creating the download link
                if (file_path === 0) {
                    downloadLink = 'wala attachment';
                } else {
                    downloadLink = '<br><a href="' + file_path + '" download>Download Attachment</a>';
                }

                Swal.fire({
                    title: 'View Reason',
                    html: 'Reason: ' + reason + downloadLink,
                    icon: 'info',
                    showCancelButton: false,
                    cancelButtonText: 'Cancel',
                })
            });






            // TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:


            $('#builtGameTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "json_built_games.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "built_game_link"
                    },
                    {
                        "data": "description"
                    },
                    {
                        "data": "from_what_game"
                    },
                    {
                        "data": "total_price"
                    },
                    {
                        "data": "formatted_date"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "actions"
                    },

                ]
            });





            $('#builtGameTable').on('click', '.edit-built_game', function() {
                var built_game_id = $(this).data('built_game_id');

                $.ajax({
                    type: 'POST',
                    url: 'get_built_game_details.php',
                    data: {
                        built_game_id: built_game_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            var currentName = response.name;
                            var currentDescription = response.description;

                            Swal.fire({
                                title: 'Edit Game (ID: ' + built_game_id + ')',
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
                                        url: 'process_edit_built_game_details.php',
                                        data: {
                                            built_game_id: built_game_id,
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
                                        $('#createGameTable').DataTable().ajax.reload();
                                        $('#builtGameTable').DataTable().ajax.reload();
                                        $('#pendingGameTable').DataTable().ajax.reload();

                                        $('#canceledGameTable').DataTable().ajax.reload();
                                        $('#approvedGameTable').DataTable().ajax.reload();
                                        $('#purchasedGameTable').DataTable().ajax.reload();
                                        $('#publishedGameTable').DataTable().ajax.reload();

                                        $('#cartCount').DataTable().ajax.reload();
                                    } else {
                                        Swal.fire('Success', result.value.message, 'success');
                                        // Reload the DataTable
                                        $('#createGameTable').DataTable().ajax.reload();
                                        $('#builtGameTable').DataTable().ajax.reload();
                                        $('#pendingGameTable').DataTable().ajax.reload();

                                        $('#canceledGameTable').DataTable().ajax.reload();
                                        $('#approvedGameTable').DataTable().ajax.reload();
                                        $('#purchasedGameTable').DataTable().ajax.reload();
                                        $('#publishedGameTable').DataTable().ajax.reload();

                                        $('#cartCount').DataTable().ajax.reload();
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




            // Add click event handler for "delete" buttons
            $('#builtGameTable').on('click', '.delete-built_game', function() {
                var built_game_id = $(this).data('built_game_id');

                // Create a SweetAlert2 confirmation dialog for deleting a game
                Swal.fire({
                    title: 'Delete Game (ID: ' + built_game_id + ')',
                    text: 'Are you sure you want to delete this game?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'POST',
                            url: 'process_delete_built_game.php',
                            data: {
                                built_game_id: built_game_id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Success', response.message, 'success');

                                    // Optionally, you can refresh the DataTables table after deletion
                                    $('#createGameTable').DataTable().ajax.reload();
                                    $('#builtGameTable').DataTable().ajax.reload();
                                    $('#pendingGameTable').DataTable().ajax.reload();

                                    $('#canceledGameTable').DataTable().ajax.reload();
                                    $('#approvedGameTable').DataTable().ajax.reload();
                                    $('#purchasedGameTable').DataTable().ajax.reload();
                                    $('#publishedGameTable').DataTable().ajax.reload();

                                    $('#cartCount').DataTable().ajax.reload();
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


            // Add click event handler for "build" buttons
            // $('#builtGameTable').on('click', '.approve-built_game', function() {
            //     var built_game_id = $(this).data('built_game_id');
            //     var name = $(this).data('name');
            //     var ticket_price = $(this).data('ticket_price');

            //     Swal.fire({
            //         title: 'Buy A Ticket',
            //         html: 'Ticket Price: ' + ticket_price,
            //         icon: 'info',
            //         showCancelButton: true,
            //         confirmButtonText: 'Buy',
            //         cancelButtonText: 'Cancel',
            //     }).then(function(result) {
            //         if (result.isConfirmed) {

            //             $.ajax({
            //                 type: 'POST',
            //                 url: 'process_get_approved_game.php', // Create a PHP script to check balance and deduct cost
            //                 data: {
            //                     built_game_id: built_game_id,
            //                     name: name,
            //                     ticket_price: ticket_price
            //                 },
            //                 dataType: 'json',
            //                 success: function(response) {
            //                     if (response.success) {
            //                         Swal.fire('Success', response.message, 'success');

            //                         // Optionally, you can refresh the DataTables table after building
            //                         $('#createGameTable').DataTable().ajax.reload();
            //                         $('#builtGameTable').DataTable().ajax.reload();
            //                         $('#pendingGameTable').DataTable().ajax.reload();
            //                         $('#canceledGameTable').DataTable().ajax.reload();
            //                         $('#approvedGameTable').DataTable().ajax.reload();
            //                         $('#purchasedGameTable').DataTable().ajax.reload();
            //                         $('#publishedGameTable').DataTable().ajax.reload();
            //                     } else {
            //                         Swal.fire('Error', response.message, 'error');
            //                     }
            //                 },
            //                 error: function() {
            //                     Swal.fire('Error', 'Failed to deduct the cost', 'error');
            //                 }
            //             });
            //         }
            //     });
            // });






            // TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:


            $('#pendingGameTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "json_pending_games.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "built_game_link"
                    },
                    {
                        "data": "description"
                    },
                    {
                        "data": "from_what_game"
                    },
                    {
                        "data": "total_price"
                    },
                    {
                        "data": "formatted_date"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "actions"
                    },

                ]
            });



            // Add click event handler for "build" buttons
            $('#pendingGameTable').on('click', '.cancel-built_game', function() {
                var built_game_id = $(this).data('built_game_id');
                var name = $(this).data('name');

                Swal.fire({
                    title: 'Built Game (ID: ' + built_game_id + ')',
                    text: 'Name: ' + name + '\nDescription: ' +
                        '\nAre you sure you want to stop Approving this game?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Approving Stopped',
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Send an AJAX request to build the game
                        $.ajax({
                            type: 'POST',
                            url: 'process_cancel_game.php', // Create a PHP script for building the game
                            data: {
                                built_game_id: built_game_id,
                                name: name,
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Success', response.message, 'success');

                                    // Optionally, you can refresh the DataTables table after building
                                    $('#createGameTable').DataTable().ajax.reload();
                                    $('#builtGameTable').DataTable().ajax.reload();
                                    $('#pendingGameTable').DataTable().ajax.reload();

                                    $('#canceledGameTable').DataTable().ajax.reload();
                                    $('#approvedGameTable').DataTable().ajax.reload();
                                    $('#purchasedGameTable').DataTable().ajax.reload();
                                    $('#publishedGameTable').DataTable().ajax.reload();

                                    $('#cartCount').DataTable().ajax.reload();
                                } else {
                                    Swal.fire('Error', response.message, 'error');
                                }
                            },
                            error: function() {
                                Swal.fire('Error', 'Failed to build the game', 'error');
                            }
                        });
                    }
                });
            });





            // TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:
            $('#canceledGameTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "json_canceled_games.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "built_game_link"
                    },
                    {
                        "data": "description"
                    },
                    {
                        "data": "from_what_game"
                    },
                    {
                        "data": "total_price"
                    },
                    {
                        "data": "formatted_date"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "actions"
                    },

                ]
            });



            // TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:
            $('#approvedGameTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "json_approved_games.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "built_game_link"
                    },
                    {
                        "data": "description"
                    },
                    {
                        "data": "from_what_game"
                    },
                    {
                        "data": "total_price"
                    },
                    {
                        "data": "formatted_date"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "actions"
                    },

                ]
            });


            // Add click event handler for "build" buttons
            $('#approvedGameTable').on('click', '#built_game_buy', function() {

                var built_game_id = $(this).data("built_game_id");

                $.ajax({
                    url: "process_add_built_game_to_cart.php?built_game_id=" + built_game_id,
                    type: "GET",
                    success: function(data) {
                        $(".cart-count").html(data);
                    },
                });
            });








            $('#approvedGameTable').on('click', '.edit-built_game', function() {
                var built_game_id = $(this).data('built_game_id');

                $.ajax({
                    type: 'POST',
                    url: 'get_built_game_details.php',
                    data: {
                        built_game_id: built_game_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            var currentName = response.name;
                            var currentDescription = response.description;

                            Swal.fire({
                                title: 'Edit Game (ID: ' + built_game_id + ')',
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
                                        url: 'process_edit_built_game_details.php',
                                        data: {
                                            built_game_id: built_game_id,
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
                                        $('#createGameTable').DataTable().ajax.reload();
                                        $('#builtGameTable').DataTable().ajax.reload();
                                        $('#pendingGameTable').DataTable().ajax.reload();

                                        $('#canceledGameTable').DataTable().ajax.reload();
                                        $('#approvedGameTable').DataTable().ajax.reload();
                                        $('#purchasedGameTable').DataTable().ajax.reload();
                                        $('#publishedGameTable').DataTable().ajax.reload();

                                        $('#cartCount').DataTable().ajax.reload();
                                    } else {
                                        Swal.fire('Success', result.value.message, 'success');
                                        // Reload the DataTable
                                        $('#createGameTable').DataTable().ajax.reload();
                                        $('#builtGameTable').DataTable().ajax.reload();
                                        $('#pendingGameTable').DataTable().ajax.reload();

                                        $('#canceledGameTable').DataTable().ajax.reload();
                                        $('#approvedGameTable').DataTable().ajax.reload();
                                        $('#purchasedGameTable').DataTable().ajax.reload();
                                        $('#publishedGameTable').DataTable().ajax.reload();

                                        $('#cartCount').DataTable().ajax.reload();
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




            // Add click event handler for "delete" buttons
            $('#approvedGameTable').on('click', '.delete-built_game', function() {
                var built_game_id = $(this).data('built_game_id');

                // Create a SweetAlert2 confirmation dialog for deleting a game
                Swal.fire({
                    title: 'Delete Game (ID: ' + built_game_id + ')',
                    text: 'Are you sure you want to delete this game?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'POST',
                            url: 'process_delete_built_game.php',
                            data: {
                                built_game_id: built_game_id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Success', response.message, 'success');

                                    // Optionally, you can refresh the DataTables table after deletion
                                    $('#createGameTable').DataTable().ajax.reload();
                                    $('#builtGameTable').DataTable().ajax.reload();
                                    $('#pendingGameTable').DataTable().ajax.reload();

                                    $('#canceledGameTable').DataTable().ajax.reload();
                                    $('#approvedGameTable').DataTable().ajax.reload();
                                    $('#purchasedGameTable').DataTable().ajax.reload();
                                    $('#publishedGameTable').DataTable().ajax.reload();

                                    $('#cartCount').DataTable().ajax.reload();
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













            // TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:
            $('#purchasedGameTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "json_purchased_games.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "built_game_link"
                    },
                    {
                        "data": "description"
                    },
                    {
                        "data": "from_what_game"
                    },
                    {
                        "data": "total_price"
                    },
                    {
                        "data": "formatted_date"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "actions"
                    },

                ]
            });

            // Add click event handler for "build" buttons
            $('#purchasedGameTable').on('click', '.view-reason', function() {
                var built_game_id = $(this).data('built_game_id');
                var reason = $(this).data('reason');
                var file_path = $(this).data('file_path');

                var downloadLink = '';

                // Check if file_path is not NULL before creating the download link
                if (file_path === 0) {
                    downloadLink = 'wala attachment';
                } else {
                    downloadLink = '<br><a href="' + file_path + '" download>Download Attachment</a>';
                }

                Swal.fire({
                    title: 'View Reason',
                    html: 'Reason: ' + reason + downloadLink,
                    icon: 'info',
                    confirmButtonText: 'Request Publish Again',
                    showCancelButton: true,
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = 'edit_game_page.php?built_game_id=' + built_game_id;
                    }
                });

            });





            // TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:TODO:
            $('#publishedGameTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "json_published_games_table.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "published_game_link"
                    },
                    {
                        "data": "edition"
                    },
                    {
                        "data": "category"
                    },
                    {
                        "data": "info"
                    },
                    {
                        "data": "published_date"
                    },
                    {
                        "data": "price_and_markup"
                    },
                    {
                        "data": "total_earnings"
                    },
                    {
                        "data": "actions"
                    },

                ]
            });


            // Add click event handler for "build" buttons
            $('#publishedGameTable').on('click', '#hideButton', function() {

                var published_game_id = $(this).data('published_game_id');


                Swal.fire({
                    title: 'Confirmation',
                    text: 'Are you sure you want to hide published game ID ' + published_game_id + '?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // User clicked "Yes," send an AJAX request
                        $.ajax({
                            url: 'process_hide_published_game.php', // URL to your PHP script
                            type: 'POST',
                            data: {
                                published_game_id: published_game_id
                            },
                            success: function(response) {
                                // Handle the response from the PHP script
                                if (response === 'success') {
                                    Swal.fire('Hidden!', 'The published game has been hidden.', 'success');

                                    // Optionally, you can refresh the DataTables table after building
                                    $('#createGameTable').DataTable().ajax.reload();
                                    $('#builtGameTable').DataTable().ajax.reload();
                                    $('#pendingGameTable').DataTable().ajax.reload();

                                    $('#canceledGameTable').DataTable().ajax.reload();
                                    $('#approvedGameTable').DataTable().ajax.reload();
                                    $('#purchasedGameTable').DataTable().ajax.reload();
                                    $('#publishedGameTable').DataTable().ajax.reload();

                                    $('#cartCount').DataTable().ajax.reload();
                                } else {
                                    Swal.fire('Error', 'An error occurred while hiding the game.', 'error');

                                    // Optionally, you can refresh the DataTables table after building
                                    $('#createGameTable').DataTable().ajax.reload();
                                    $('#builtGameTable').DataTable().ajax.reload();
                                    $('#pendingGameTable').DataTable().ajax.reload();

                                    $('#canceledGameTable').DataTable().ajax.reload();
                                    $('#approvedGameTable').DataTable().ajax.reload();
                                    $('#purchasedGameTable').DataTable().ajax.reload();
                                    $('#publishedGameTable').DataTable().ajax.reload();

                                    $('#cartCount').DataTable().ajax.reload();
                                }
                            },
                            error: function() {
                                Swal.fire('Error', 'An error occurred while processing your request.', 'error');
                            }
                        });
                    } else {
                        // User clicked "Cancel" or closed the dialog
                        Swal.fire('Cancelled', 'The action was cancelled.', 'info');
                    }
                });


            });




            // Add click event handler for "build" buttons
            $('#publishedGameTable').on('click', '#unhideButton', function() {

                var published_game_id = $(this).data('published_game_id');


                Swal.fire({
                    title: 'Confirmation',
                    text: 'Are you sure you want to unhide published game ID ' + published_game_id + '?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // User clicked "Yes," send an AJAX request
                        $.ajax({
                            url: 'process_unhide_published_game.php',
                            type: 'POST',
                            data: {
                                published_game_id: published_game_id
                            },
                            success: function(response) {
                                // Handle the response from the PHP script
                                if (response === 'success') {
                                    Swal.fire('Hidden!', 'The published game has been unhidden.', 'success');

                                    // Optionally, you can refresh the DataTables table after building
                                    $('#createGameTable').DataTable().ajax.reload();
                                    $('#builtGameTable').DataTable().ajax.reload();
                                    $('#pendingGameTable').DataTable().ajax.reload();

                                    $('#canceledGameTable').DataTable().ajax.reload();
                                    $('#approvedGameTable').DataTable().ajax.reload();
                                    $('#purchasedGameTable').DataTable().ajax.reload();
                                    $('#publishedGameTable').DataTable().ajax.reload();

                                    $('#cartCount').DataTable().ajax.reload();
                                } else {
                                    Swal.fire('Error', 'An error occurred while unhiding the game.', 'error');

                                    // Optionally, you can refresh the DataTables table after building
                                    $('#createGameTable').DataTable().ajax.reload();
                                    $('#builtGameTable').DataTable().ajax.reload();
                                    $('#pendingGameTable').DataTable().ajax.reload();

                                    $('#canceledGameTable').DataTable().ajax.reload();
                                    $('#approvedGameTable').DataTable().ajax.reload();
                                    $('#purchasedGameTable').DataTable().ajax.reload();
                                    $('#publishedGameTable').DataTable().ajax.reload();

                                    $('#cartCount').DataTable().ajax.reload();
                                }
                            },
                            error: function() {
                                Swal.fire('Error', 'An error occurred while processing your request.', 'error');
                            }
                        });
                    } else {
                        // User clicked "Cancel" or closed the dialog
                        Swal.fire('Cancelled', 'The action was cancelled.', 'info');
                    }
                });


            });






            // Add click event handler for "build" buttons
            $('#publishedGameTable').on('click', '#editButton', function() {
                var publishedGameId = $(this).data('published_game_id');

                $.ajax({
                    type: 'POST',
                    url: 'update_game_page.php',
                    data: {
                        published_game_id: publishedGameId
                    },
                    success: function(response) {
                        // Redirect to update_game_page.php with the publishedGameId as a query parameter
                        window.location.href = 'update_game_page.php?published_game_id=' + publishedGameId;
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error: ' + status, error);
                    }
                });
            });





            // Add click event handler for "build" buttons
            $('#publishedGameTable').on('click', '#viewEditButton', function() {
                var publishedGameId = $(this).data('published_game_id');

                $.ajax({
                    type: 'POST',
                    url: 'update_game_page.php',
                    data: {
                        published_game_id: publishedGameId
                    },
                    success: function(response) {
                        // Redirect to update_game_page.php with the publishedGameId as a query parameter
                        window.location.href = 'pending_update_publish_request_page.php?published_game_id=' + publishedGameId;
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX error: ' + status, error);
                    }
                });
            });




            // Add click event handler for "build" buttons
            $('#publishedGameTable').on('click', '#viewReason', function() {
                var published_game_id = $(this).data('published_game_id');
                var reason = $(this).data('reason');
                var file_path = $(this).data('file_path');

                var downloadLink = '';

                // Check if file_path is not NULL before creating the download link
                if (file_path === 0) {
                    downloadLink = 'wala attachment';
                } else {
                    downloadLink = '<br><a href="' + file_path + '" download>Download Attachment</a>';
                }

                Swal.fire({
                    title: 'View Reason',
                    html: 'Reason: ' + reason + downloadLink,
                    icon: 'info',
                    confirmButtonText: 'Request Publish Again',
                    showCancelButton: true,
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        window.location.href = 'update_game_page.php?published_game_id=' + published_game_id;
                    }
                });

            });











        });
    </script>


</body>

</html>