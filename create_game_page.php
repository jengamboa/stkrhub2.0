<?php
session_start();
include 'connection.php';
?>

<!DOCTYPE html>
<html>

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
        <?php include 'css/body.css'; ?>.multi-step-bar {
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

        li.step:after {
            content: '';
            width: 100%;
            height: 2px;
            background: #898989;
            position: absolute;


            z-index: -1;
        }

        li.step:first-child:after {
            content: none;
        }

        li.step.active:before {
            background: green;
            color: white;
        }

        .section-step {
            padding: 20px;
            background-color: #f0f0f0;
            margin: 20px;
            border: 1px solid #ddd;
            display: none;
        }

        .section-step:target {
            display: block;
        }

        ul.multi-step-bar {
            display: flex;
            justify-content: center;

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



    <section class="features-area section-gap">
        <div class="container">

            <nav class="step">
                <ul class="multi-step-bar">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <a href="#section1">
                                    <li class="step">
                                        <i class="fa-solid fa-compass-drafting"></i>
                                        <p>Create Game</p>
                                    </li>
                                </a>
                            </div>

                            <div class="col-sm">
                                <a href="#section2">
                                    <li class="step">
                                        <i class="fa-solid fa-puzzle-piece"></i>
                                        <p>Built Games</p>
                                    </li>
                                </a>
                            </div>

                            <div class="col-sm">
                                <a href="#section3">
                                    <li class="step">
                                        <i class="fa-solid fa-hourglass-start"></i>
                                        <p>Pending Games</p>
                                    </li>
                                </a>
                            </div>


                            <div class="col-sm">
                                <a href="#section4">
                                    <li class="step">
                                        <i class="fa-solid fa-road-barrier"></i>
                                        <p>Canceled Games</p>
                                    </li>
                                </a>
                            </div>

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

                        </div>
                    </div>
                </ul>
            </nav>



            <div id="section1" class="section-step">
                <div class="row">

                    <div class="col-4">

                        <h2>Create Game</h2>
                        <form id="createGameForm">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                            <br>

                            <label for="description">Description:</label>
                            <textarea id="description" name="description" required></textarea> <!-- Added closing tag </textarea> -->
                            <br>

                            <input type="submit" value="Submit">
                        </form>


                    </div>
                    <div class="col-8">

                        <!-- DataTables Create Game  -->
                        <table id="createGameTable" class="display" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Game Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Date Created</th>
                                    <th>Edit</th>
                                    <th>Build</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- User data will be displayed here -->
                            </tbody>
                        </table>
                        <!-- /DataTables Create Game  -->
                    </div>

                </div>
            </div>

            <div id="section2" class="section-step">
                <!-- DataTables Build Game  -->
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
                        <!-- User data will be displayed here -->
                    </tbody>
                </table>
                <!-- /DataTables Build Game  -->
            </div>

            <div id="section3" class="section-step">
                <!-- DataTables pendingGameTable  -->
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
                        <!-- User data will be displayed here -->
                    </tbody>
                </table>
                <!-- /DataTables pendingGameTable  -->
            </div>

            <div id="section4" class="section-step">
                <!-- DataTables canceledGameTable  -->
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
                        <!-- User data will be displayed here -->
                    </tbody>
                </table>
                <!-- /DataTables canceledGameTable  -->
            </div>

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
                <!-- /DataTables publishedGameTable  -->
            </div>
        </div>
    </section>



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

                            // Reload the DataTable
                            $('#createGameTable').DataTable().ajax.reload();
                            $('#builtGameTable').DataTable().ajax.reload();
                            $('#pendingGameTable').DataTable().ajax.reload();

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
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "json_created_games.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
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
                        "data": "build"
                    },
                    {
                        "data": "edit"
                    },


                ]
            });




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
                                    } else {
                                        Swal.fire('Success', result.value.message, 'success');
                                        // Reload the DataTable
                                        $('#createGameTable').DataTable().ajax.reload();
                                        $('#builtGameTable').DataTable().ajax.reload();
                                        $('#pendingGameTable').DataTable().ajax.reload();
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
            $('#createGameTable').on('click', '.build-game', function() {
                var gameId = $(this).data('gameid');
                var gameName = $(this).data('name');
                var gameDescription = $(this).data('description');
                var total_price = $(this).data('total_price');


                // Create a SweetAlert2 confirmation dialog for building a game
                Swal.fire({
                    title: 'Build Game (ID: ' + gameId + ')',
                    text: 'Name: ' + gameName + '\nDescription: ' + gameDescription +
                        '\nAre you sure you want to build this game?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Build',
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Send an AJAX request to build the game
                        $.ajax({
                            type: 'POST',
                            url: 'process_build_game.php', // Create a PHP script for building the game
                            data: {
                                game_id: gameId,
                                name: gameName,
                                description: gameDescription,
                                total_price: total_price,
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Success', response.message, 'success');

                                    // Optionally, you can refresh the DataTables table after building
                                    $('#createGameTable').DataTable().ajax.reload();
                                    $('#builtGameTable').DataTable().ajax.reload();
                                    $('#pendingGameTable').DataTable().ajax.reload();
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
                                    } else {
                                        Swal.fire('Success', result.value.message, 'success');
                                        // Reload the DataTable
                                        $('#createGameTable').DataTable().ajax.reload();
                                        $('#builtGameTable').DataTable().ajax.reload();
                                        $('#pendingGameTable').DataTable().ajax.reload();
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
            $('#builtGameTable').on('click', '.approve-built_game', function() {
                var built_game_id = $(this).data('built_game_id');
                var name = $(this).data('name');

                Swal.fire({
                    title: 'Built Game (ID: ' + built_game_id + ')',
                    text: 'Name: ' + name + '\nDescription: ' +
                        '\nAre you sure you want to Get Approved this game?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Get Approved',
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {
                        // Send an AJAX request to build the game
                        $.ajax({
                            type: 'POST',
                            url: 'process_get_approved_game.php', // Create a PHP script for building the game
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

        });
    </script>


</body>

</html>