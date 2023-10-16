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
                            <h4>Cash Out Requests</h4>
                            <p class="mb-0">Users are now expeting the their order is being processed.</p>
                        </div>
                    </div>
                </div>
                <!-- row -->


                <div class="row">

                    <div class="col">
                        <div class="card">
                            <div class="card-body">

                                <?php
                                $sqlCheckInProduction = "SELECT COUNT(*) AS count FROM orders";
                                $resultCheckInProduction = $conn->query($sqlCheckInProduction);

                                if ($resultCheckInProduction) {
                                    $row = $resultCheckInProduction->fetch_assoc();
                                    $count = $row['count'];

                                    if ($count > 0) {
                                        echo '
                                                <table id="allOrders" class="hover" style="width: 100%;">
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                                ';
                                    } else {
                                        echo 'None.';
                                    }
                                } else {
                                    echo 'Error checking for orders in production.';
                                }
                                ?>

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


            $('#allOrders').DataTable({
                language: {
                    search: "",
                },

                searching: true,
                info: false,
                paging: true,
                lengthChange: false,
                ordering: false,

                "ajax": {
                    "url": "admin_json_cash_out.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "user_id"
                    },
                    {
                        "data": "transaction_type"
                    },
                    {
                        "data": "transaction_date"
                    },
                    {
                        "data": "amount"
                    },
                    {
                        "data": "paypal_email_destination"
                    },
                    {
                        "data": "actions"
                    },
                ]
            });



            $('#allOrders').on('click', '#send_money', function() {
                var creator_id = $(this).data('creator_id');
                var wallet_transaction_id = $(this).data('wallet_transaction_id');
                var paypal_email_destination = $(this).data('paypal_email_destination');
                var amount = $(this).data('amount');
                var cash_out_fee = $(this).data('cash_out_fee');

                Swal.fire({
                    title: 'Send Money through Paypal',
                    html: 'Payee\'s Email: ' + paypal_email_destination + '<br> Amount to Pay: ' + amount,
                    showCancelButton: true,
                    confirmButtonText: 'Sent',
                }).then((result) => {
                    if (result.isConfirmed) {

                        Swal.fire({
                            title: 'Are you sure you already sent?',
                            html: 'Payee\'s Email: ' + paypal_email_destination + '<br> Amount to Pay: ' + amount,
                            showCancelButton: true,
                            confirmButtonText: 'Yes',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: 'POST',
                                    url: 'admin_process_refunded.php',
                                    data: {
                                        wallet_transaction_id: wallet_transaction_id,
                                        creator_id: creator_id,
                                        paypal_email_destination: paypal_email_destination,
                                        amount: amount,
                                        cash_out_fee: cash_out_fee,
                                    },
                                    dataType: 'json',
                                    success: function(response) {
                                        if (response.success) {
                                            Swal.fire('Success', response.message, 'success');
                                            $('#allOrders').DataTable().ajax.reload();
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
                    }
                });


            });



        });
    </script>



</body>

</html>