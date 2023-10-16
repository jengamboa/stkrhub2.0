<?php
session_start();
include 'connection.php';

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


</head>


<body>

    <div id="main-wrapper">
        <?php
        include 'html/admin_header.php';
        include 'html/admin_sidebar.php';
        ?>

        <div class="content-body">
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Games Approval Requests</h4>
                            <p class="mb-0">Users are now expeting the their order is being processed.</p>
                        </div>
                    </div>
                </div>
                <!-- row -->


                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <table id="hasRequest" class="display">
                                    <thead>
                                        <tr>
                                            <th>Built Game Name</th>
                                            <th>Category</th>
                                            <th>Edition</th>
                                            <th>Creator</th>
                                            <th>Status</th>
                                            <th>Actions</th>
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


            $('#hasRequest').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_request_details_page.php",
                    data: {

                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "game_link"
                    },
                    {
                        "data": "category"
                    },
                    {
                        "data": "edition"
                    },
                    {
                        "data": "creator_id"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "actions",
                        width: '10%',
                        className: 'dt-center'
                    },


                ]
            });





            $('#inProductionTable').on('click', '#to_ship', function() {
                var order_id = $(this).data('order_id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "When confirmed, the order is ready to be picked by the courier.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, proceed",
                    cancelButtonText: "No, cancel",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "admin_process_to_ship.php",
                            method: "POST",
                            data: {
                                order_id: order_id
                            },
                            dataType: "json", // Expect JSON response
                            success: function(response) {
                                if (response.status === "success") {
                                    $('#inProductionTable').DataTable().ajax.reload();
                                    Swal.fire("Order is in production", "", "success");
                                } else {
                                    $('#inProductionTable').DataTable().ajax.reload();
                                    Swal.fire("Failed to process order", response.message, "error");
                                }
                            },
                            error: function() {
                                $('#inProductionTable').DataTable().ajax.reload();
                                Swal.fire("Failed to process order", "An error occurred while processing the order", "error");

                            },
                        });
                    }
                });
            });



        });
    </script>



</body>

</html>