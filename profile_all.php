<?php
session_start();
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/icon.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">

    <title>STKR HUB</title>

    <!--CSS================================= -->
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



    <style>
        <?php include 'css/header.css'; ?><?php include 'css/body.css'; ?>table .odd {
            background-color: transparent;
        }

        table thead {
            display: none;

        }

        .odd,
        .even {
            background-color: transparent !important;
        }

        table.dataTable.no-footer {
            border-bottom: none;
        }




        .sticky-wrapper {
            top: 20px !important;
        }

        .header_area .main_menu .main_box {
            background: #fff;
            margin: 0px auto 0;
            max-width: 1200px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            -webkit-transition: all 0.3s ease 0s;
            -moz-transition: all 0.3s ease 0s;
            -o-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }

        .features-inner {
            box-shadow: none !important;
            padding: 40px 0;
        }

        #allOrders tbody tr {
            margin-bottom: 0;
            padding-bottom: 0;
        }

        table.dataTable tbody th,
        table.dataTable tbody td {
            padding: 0px 0px;
        }

        table.dataTable thead th,
        table.dataTable thead td {
            padding: 0px 0px;
            border-bottom: none;
        }

        .mask1 img{
            -webkit-mask-image: linear-gradient(to left, transparent 25%, black 75%);
            mask-image: linear-gradient(to bottom, transparent 25%, black 75%);
        }
    </style>


</head>

<body>
    <?php
    include 'connection.php';
    include 'html/page_header.php';
    ?>

    <section class="sample-text-area">
        <div class="container">

            <div class="row">
                <div class="col-3">
                    <div class="nav flex-column nav-pills">
                        <a class="nav-link " href="profile_index.php">My Account</a>

                        <a class="nav-link active" href="profile_all.php">My Purchase</a>

                        <a class="nav-link " href="process_logout.php">Logout</a>


                    </div>
                </div>

                <div class="col-9">
                    <div class="tab-content" id="v-pills-tabContent">

                        <div class="tab-pane fade " id="v-pills-myaccount" role="tabpanel" aria-labelledby="v-pills-myaccount-tab">

                            <!-- laman -->
                            <nav>
                                <div class="nav nav-tabs">
                                    <a class="nav-item nav-link " href="profile_index.php">Profasdile</a>

                                    <a class="nav-item nav-link " href="profile_addresses.php">Addresses</a>

                                    <a class="nav-item nav-link active" href="profile_password.php">Change Password</a>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">


                            </div>
                            <!-- /laman -->

                        </div>

                        <div class="tab-pane fade show active" id="v-pills-mypurchase" role="tabpanel" aria-labelledby="v-pills-mypurchase-tab">
                            <!-- laman -->
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" href="profile_all.php">All</a>

                                    <a class="nav-item nav-link " href="profile_pending.php">Pending</a>

                                    <a class="nav-item nav-link " href="profile_in_production.php">In Production</a>

                                    <a class="nav-item nav-link " href="profile_to_deliver.php">To Deliver</a>

                                    <a class="nav-item nav-link " href="profile_received.php">Received</a>

                                    <a class="nav-item nav-link " href="profile_canceled.php">Canceled</a>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">


                                <div class="tab-pane fade show active">
                                    <section style="padding: 20px;">

                                        <table id="allOrders" class="hover" style="width: 100%;">
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </section>
                                </div>

                                <div class="mask1">
                                    <img src="img/i1.jpg" alt="">
                                </div>



                            </div>
                            <!-- /laman -->
                        </div>

                        <div class="tab-pane fade" id="v-pills-logout" role="tabpanel" aria-labelledby="v-pills-logout-tab">
                            logout
                        </div>


                    </div>
                </div>
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

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Include DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <!-- sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Filepond JavaScript -->
    <script src="https://unpkg.com/filepond@4.23.1/dist/filepond.min.js"></script>

    <!-- Include DataTables JavaScript -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>


    <script>
        $(document).ready(function() {
            var monkeyList = new List('test-list', {
                valueNames: ['name'],
                page: 7,
                pagination: true
            });


            var options = {
                valueNames: ['name', 'born']
            };

            var userList = new List('game_components_table', options);

            var user_id = <?php echo $user_id; ?>;

            $('#allOrders').DataTable({
                searching: true,
                info: false,
                ordering: false,
                pagination: true,
                paging: true,
                scrollX: true,
                responsive: true,


                "ajax": {
                    "url": "json_all_orders.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                    "data": "item"
                }, ]
            });
        });
    </script>





</body>

</html>