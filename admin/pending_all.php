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
                            <h4>All Pending Orders</h4>
                            <p class="mb-0">Once order is accepted, STKR Players could not cancel it anymore.</p>
                        </div>
                    </div>
                </div>
                <!-- row -->


                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <table id="allOrdersTable" class="display" style="width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Classification</th>
                                            <th>Title</th>
                                            <th>Price</th>
                                            <th>User</th>
                                            <th>Date</th>
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

    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {


            $('#allOrdersTable').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_pending_all.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "id", width: '10%', className: 'dt-center'
                    },
                    {
                        "data": "classification",  
                    },
                    {
                        "data": "title"
                    },
                    {
                        "data": "price"
                    },
                    {
                        "data": "user"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "actions"
                    },


                ]
            });




            $("#myForm").submit(function(e) {
                e.preventDefault(); // Prevent the default form submission
                var formData = new FormData(this); // Create a FormData object

                // Send an AJAX POST request
                $.ajax({
                    type: "POST",
                    url: "admin_process_add_gamepiece.php", // Your server-side script URL
                    data: formData,
                    contentType: false, // Prevent jQuery from adding a content-type header
                    processData: false, // Prevent jQuery from processing the data
                    success: function(response) {
                        // Display a SweetAlert with a success message
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: 'Data inserted successfully!',
                        });

                        $('#gamePieceTable').DataTable().ajax.reload();

                        // Clear the form after successful submission
                        $("#myForm")[0].reset();
                    },
                    error: function(error) {
                        // Display a SweetAlert with an error message
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: 'Error in submitting data: ' + error.responseText,
                        });
                    }
                });
            });





        });
    </script>



</body>

</html>