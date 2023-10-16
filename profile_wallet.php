<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}

$sqlClient = "SELECT * FROM constants WHERE classification = 'paypal_client_id'";
$resultClient = $conn->query($sqlClient);
while ($rowClient = $resultClient->fetch_assoc()) {
    $paypal_client_id = $rowClient['text'];
}

$sqlFee = "SELECT * FROM constants WHERE classification = 'cash_out_fee'";
$resultFee = $conn->query($sqlFee);
while ($rowFee = $resultFee->fetch_assoc()) {
    $cash_out_fee = $rowFee['percentage'];
}

$sqlMin = "SELECT * FROM constants WHERE classification = 'minimum_cash_out_amount'";
$resultMin = $conn->query($sqlMin);
while ($rowMin = $resultMin->fetch_assoc()) {
    $minimum_cash_out_amount = $rowMin['percentage'];
}
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
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
    <link rel="stylesheet" href="css/main2.css?<?php echo time(); ?>">

    <!-- scroll reveal -->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- Include DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- material icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- sweetalert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Filepond -->
    <link href="https://unpkg.com/filepond@4.23.1/dist/filepond.min.css" rel="stylesheet">

    <!-- List JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <!-- Include Tippy.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6.3.1/dist/tippy.css">

    <style>
        <?php include 'css/header.css'; ?><?php include 'css/body.css'; ?>

        /* start header */
        .sticky-wrapper {
            top: 0px !important;
        }


        .header_area .main_menu .main_box {
            max-width: 100%;
        }

        /* end */

        #infoTable tbody tr {
            background-color: transparent !important;
        }

        .image-mini-container {
            overflow: hidden;
            width: 100%;
            position: relative;
            padding-top: 80%;
        }

        .image-mini {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            object-fit: cover;
            -webkit-mask-image: linear-gradient(to left, transparent 0%, black 100%);
            mask-image: linear-gradient(to bottom, transparent 0%, black 100%);
        }

        .custom-shadow {
            box-shadow: 0 0 10px #000000;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 0px 0px;
        }

        table.dataTable.no-footer {
            border-bottom: none;
        }

        .even,
        .odd {
            background-color: transparent !important;
        }

        table.dataTable {
            width: 100%;
            margin: 0 auto;
            clear: both;
            /* border-collapse: separate; */
            border-spacing: -20px;
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

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #272a4e;
        }

        .nav-link {
            color: #fff;
        }

        /* progress step by step */
        .progresses {
            display: flex;
            align-items: center;
        }

        .step-line {
            width: 200px;
            height: 4px;
            background: #63d19e;
        }

        .step-line-b {
            width: 200px;
            height: 4px;
            background: transparent;
        }

        .steps {
            display: flex;
            background-color: #63d19e;
            color: #fff;
            font-size: 14px;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .steps-b {
            display: flex;
            flex-direction: column;
            background-color: transparent;
            width: 40px;
            height: 40px;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            white-space: nowrap;

        }

        /* end progress step by step */
    </style>
</head>

<body>
    <?php include 'html/page_header.php'; ?>
    <button type="button" class="btn btn-secondary btn-floating btn-lg" id="btn-back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Start Sample Area -->
    <section class="sample-text-area">
        <div class="container">

            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills">
                        <a class="nav-link " href="profile_index.php">My Account</a>

                        <a class="nav-link " href="profile_all.php">My Purchase</a>

                        <a class="nav-link active" href="profile_wallet.php">STKR Wallet</a>

                        <a class="nav-link " href="process_logout.php">Logout</a>


                    </div>
                </div>

                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade show active" id="v-pills-mypurchase" role="tabpanel" aria-labelledby="v-pills-mypurchase-tab">
                            <table id="walletAmount" class="hover" style="width: 100%;">
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                        <div class="tab-pane fade show active" id="v-pills-mypurchase" role="tabpanel" aria-labelledby="v-pills-mypurchase-tab">
                            <table id="walletTransaction" class="hover" style="width: 100%;">
                                <tbody>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- End Sample Area -->


    <!---------------------- MODAL ------------------------>
    <!-- cash_in -->
    <div class="modal fade" id="cashIn">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cash In</h5>
                </div>
                <form id="cashInForm" enctype="multipart/form-data">
                    <div class="modal-body">

                        <p class="text-warning" id="cash_in_warning"></p>

                        <input type="number" min="10" max="10000" id="cash_in_amount" name="cash_in_amount" value="0" required>
                        <button class="btn amount-button-cash-in" type="button" data-value="10">10</button>
                        <button class="btn amount-button-cash-in" type="button" data-value="50">50</button>
                        <button class="btn amount-button-cash-in" type="button" data-value="100">100</button>
                        <button class="btn amount-button-cash-in" type="button" data-value="500">500</button>
                        <button class="btn amount-button-cash-in" type="button" data-value="1000">1000</button>
                        <button class="btn amount-button-cash-in" type="button" data-value="5000">5000</button>
                        <button class="btn amount-button-cash-in" type="button" data-value="10000">10000</button>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <div id="paypal-payment-button-cash-in" type="submit" data-paypal_payment="' . $total_payment . '" style="width: 100%;"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- cash_out -->
    <div class="modal fade" id="cashOut">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Cash Out</h5>
                </div>
                <form id="cashOutForm" enctype="multipart/form-data">
                    <div class="modal-body">

                        <p class="text-warning" id="cash_out_warning"></p>

                        <input type="number" id="cash_out_amount" name="cash_out_amount" value="0" required>

                        <label for="cash_out_paypal_email">Your Paypal Email:</label>
                        <input type="email" id="cash_out_paypal_email" name="cash_out_paypal_email" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                        <button type="submit">Cashout</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



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

    <!-- Include Tippy.js JavaScript -->
    <script src="https://unpkg.com/tippy.js@6.3.1/dist/tippy-bundle.umd.js"></script>

    <!-- Replace the "test" client-id value with your client-id -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo $paypal_client_id ?>&currency=PHP&disable-funding=credit,card"></script>


    <script>
        $(document).ready(function() {

            <?php include 'js/essential.php'; ?>

            var cash_out_fee = <?php echo $cash_out_fee; ?>;
            var minimum_cash_out_amount = <?php echo $minimum_cash_out_amount; ?>;

            var user_id = <?php echo $user_id; ?>;

            $('#walletTransaction').DataTable({
                language: {
                    search: "",
                },

                searching: false,
                info: false,
                paging: false,
                lengthChange: false,
                ordering: false,

                "ajax": {
                    "url": "json_wallet_transaction.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "type"
                    },
                    {
                        "data": "amount"
                    },
                    {
                        "data": "date"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "mode"
                    },
                    {
                        "data": "paypal_transaction_id"
                    },
                ]
            });

            $('#walletAmount').DataTable({
                language: {
                    search: "",
                },

                searching: false,
                info: false,
                paging: false,
                lengthChange: false,
                ordering: false,

                "ajax": {
                    "url": "json_wallet_amount.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                    "data": "item"
                }, ]
            });




            // CASHIN
            $('#walletAmount').on('click', '#cash_in', function() {
                $("#cashIn").modal("show");
                $('#cash_in_amount').val(0);
            });
            $('.amount-button-cash-in').click(function() {
                var buttonValue = $(this).data('value');
                $('#cash_in_amount').val(buttonValue);
            });


            paypal.Buttons({
                style: {
                    color: 'blue',
                    shape: 'pill'
                },
                createOrder: function(data, actions) {
                    var paypal_payment = parseFloat($('#cash_in_amount').val());

                    if (paypal_payment < 10 || paypal_payment === 0 || paypal_payment > 10000) {
                        $('#cash_in_warning').text('Minimum amount is P10 and Maximum of P10,000');
                        return actions.reject();
                    }
                    $('#cash_in_warning').text('');

                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: paypal_payment.toFixed(2),
                            }
                        }],
                        application_context: {
                            shipping_preference: 'NO_SHIPPING'
                        }
                    });
                },
                onApprove: function(data, actions) {
                    return actions.order.capture().then(function(orderData) {
                        console.log(orderData);
                        // successful
                        const transaction = orderData.purchase_units[0].payments.captures[0];

                        var data = {
                            "user_id": user_id,
                            "paypal_payment": parseFloat($('#cash_in_amount').val()),
                            "payment_id": transaction.id,
                            "order_data": orderData,
                        };

                        $.ajax({
                            method: "POST",
                            url: "process_paypal_cash_in.php",
                            data: data,
                            success: function(response) {
                                $('#walletAmount').DataTable().ajax.reload();
                                $('#walletTransaction').DataTable().ajax.reload();
                                $("#cashIn").modal("hide");
                                Swal.fire({
                                    title: "Success",
                                    text: "Cash In Successfully",
                                    icon: "success",
                                });
                            },
                            error: function(error) {
                                alertify.error("An error occurred.");
                            }
                        });
                    });
                },
                onCancel: function(data) {
                    window.location.reload();

                },
            }).render('#paypal-payment-button-cash-in');

            // CASHOUT
            $('#walletAmount').on('click', '#cash_out', function() {
                $("#cashOut").modal("show");
                $('#cash_out_amount').val(0);
                var currentWalletBalance = $('#cash_out').data('current_wallet_balance');
            });



            $('#cashOutForm').submit(function(e) {
                e.preventDefault();

                // Make an initial AJAX request to fetch the wallet balance.
                $.ajax({
                    type: 'GET',
                    url: 'get_wallet_amount.php',
                    success: function(data) {
                        var wallet_amount = parseFloat(data);

                        var cash_out_amount = parseFloat($('#cash_out_amount').val());
                        var cash_out_paypal_email = $('#cash_out_paypal_email').val();

                        var maximum_cash_out_amount = wallet_amount - cash_out_fee;

                        if (
                            isNaN(cash_out_amount) ||
                            cash_out_amount < minimum_cash_out_amount ||
                            cash_out_amount > maximum_cash_out_amount
                        ) {
                            $('#cash_out_warning').text(
                                'Invalid amount. ' +
                                'Wallet Balance: ' + wallet_amount +
                                'Minimum:' + minimum_cash_out_amount +
                                'maximum:' + maximum_cash_out_amount
                            );
                            return;
                        }

                        // Display a SweetAlert confirmation dialog.
                        Swal.fire({
                            title: 'Confirm Cash Out',
                            text: 'Are you sure you want to cash out?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Yes, cash out',
                            cancelButtonText: 'No, cancel',
                        }).then((result) => {
                            if (result.isConfirmed) {

                                // Proceed with the cash-out process here.
                                var data = {
                                    cash_out_amount: cash_out_amount,
                                    cash_out_paypal_email: cash_out_paypal_email,
                                    "user_id": user_id,
                                    "cash_out_fee": cash_out_fee,
                                };

                                $.ajax({
                                    type: 'POST',
                                    url: 'process_paypal_cash_out.php',
                                    data: data,
                                    dataType: 'json',
                                    success: function(response) {
                                        if (response.success) {
                                            $('#walletAmount').DataTable().ajax.reload();
                                            $('#walletTransaction').DataTable().ajax.reload();
                                            $("#cashOut").modal("hide");
                                            Swal.fire('Success', response.message, 'success');
                                        } else {
                                            $("#cashOut").modal("hide");
                                            Swal.fire('Error', response.message, 'error');
                                        }
                                    },
                                    error: function() {
                                        $("#cashOut").modal("hide");
                                        Swal.fire('Error', 'Failed to process the cash out', 'error');
                                    },
                                });
                            }
                        });
                    },
                });
            });








        });
    </script>


</body>

</html>