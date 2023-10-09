<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD']) {
    $game_id = $_GET['game_id'];
    $creator_id = $_GET['creator_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Focus - Bootstrap Admin Dashboard </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">


    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Include DataTables CSS and JS files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Include SweetAlert library -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
        #infoTable .odd {
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


        /* delete button */
        .deny-game {
            background-color: #dc3545 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            padding: 4px;
            margin: 4px;

            color: #343957;
        }

        .approve-game {
            background-color: #90ee90 !important;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            padding: 4px;
            margin: 4px;

            color: #343957;
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

    <div id="main-wrapper">
        <?php
        include 'html/admin_header.php';
        include 'html/admin_sidebar.php';
        ?>

        <div class="content-body">
            <div class="container-fluid">

                <h1><a href="games_approval_requests.php" class="fa-solid fa-arrow-left" style="color: #26d3e0; cursor:pointer;"></a> Game Dashboard</h1>

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <table id="infoTable" class="display" style="width: 100%;">
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- row -->


                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <table id="userTable" class="display" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Component Name</th>
                                            <th>Category</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th style="min-width: 170px; max-width: 170px;">Info</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="footer">






            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p>
            </div>
        </div>



    </div>



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


    <!-- modals -->
    <div class="modal fade" id="changeAddress">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">My Address</h5>
                </div>
                <form id="denyForm" enctype="multipart/form-data">
                    <div class="modal-body">

                        <label for="reason">Reason:</label>
                        <input type="text" id="reason" name="reason" required><br>

                        <label for="fileupload">File Upload:</label>
                        <input type="file" id="fileupload" name="fileupload"><br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>







    <!-- Include global.min.js first -->
    <script src="./vendor/global/global.min.js"></script>

    <!-- Include DataTables JS after global.min.js -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {


            var user_id = <?php echo $creator_id; ?>;
            var game_id = <?php echo $game_id; ?>;

            $('#userTable').DataTable({


                searching: true,
                info: false,
                paging: false,
                ordering: false,
                "ajax": {
                    "url": "admin_json_game_dashboard.php",
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

                ]
            });



            $('#infoTable').DataTable({
                searching: false,
                info: false,
                paging: false,
                ordering: false,
                ajax: {
                    url: "admin_json_info_table.php",
                    data: {
                        user_id: user_id,
                        game_id: game_id,
                    },
                    dataSrc: ""
                },
                columns: [{
                    data: "item"
                }, ]
            });



            $('#infoTable').on('click', '.approve-game', function() {
                var gameId = $(this).data('game_id');
                var creator_id = $(this).data('creator_id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: 'Do you want to approve this game?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, approve it!',
                    cancelButtonText: 'No, cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: 'admin_process_approve_game.php',
                            data: {
                                user_id: creator_id,
                                game_id: gameId,
                            },
                            dataType: 'json',
                            success: function(response) {
                                Swal.fire('Approved!', 'The game has been approved.', 'success');
                            },
                            error: function(xhr, status, error) {
                                Swal.fire('Error', 'An error occurred while approving the game.', 'error');
                            }
                        });
                    }
                });
            });


            $('#infoTable').on('click', '.deny-game', function() {
                var gameId = $(this).data('game_id');
                var creator_id = $(this).data('creator_id');

                $("#changeAddress").modal("show");

                // You can also set hidden input fields to pass the gameId and creatorId to the PHP script
                $('#denyForm').append('<input type="hidden" id="game_id" value="' + gameId + '">');
                $('#denyForm').append('<input type="hidden" id="creator_id" value="' + creator_id + '">');
            });


            $("#denyForm").submit(function(e) {
                e.preventDefault(); // Prevent the default form submission

                var formData = new FormData();
                formData.append('reason', $('#reason').val());
                formData.append('fileupload', $('#fileupload')[0].files[0]);

                formData.append('game_id', $('#game_id').val());
                formData.append('creator_id', $('#creator_id').val());

                // Make an AJAX request to submit the form data
                $.ajax({
                    url: 'admin_process_deny_game_request.php', // Replace with your server-side script URL
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        // Handle the success response here
                        console.log("Form submitted successfully.");
                        // You can do something here like displaying a success message or closing the modal
                        $("#changeAddress").modal('hide');
                    },
                    error: function(error) {
                        // Handle any errors here
                        console.error("Error submitting the form: " + error);
                        // You can display an error message or take any other appropriate action
                    }
                });
            });


        });
    </script>



</body>

</html>