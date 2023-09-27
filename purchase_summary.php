<?php
session_start();
include 'connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
}
?>

<!DOCTYPE html>
<html lang="en">

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
        <?php include 'css/body.css'; ?>#infoTable tbody tr {
            background-color: transparent !important;
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

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">

                <!-- DataTables Game Components -->
                <table id="purchaseTable" class="display" style="width: 100%;">
                    <thead>
                        <tr>
                            <th>Item</th>

                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>


            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->




    <nav class="navbar fixed-bottom navbar-expand-lg bg-primary navbar-dark">

        <div class="container">
            <div class="row">

                <div class="col">
                    <!-- DataTables Build Game  -->
                    <table id="infoTable" class="display">

                        <tbody>
                        </tbody>
                    </table>
                </div>


            </div>
        </div>


    </nav>









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

    <script>
        $(document).ready(function() {


            var user_id = <?php echo $user_id; ?>;

            $('#infoTable').DataTable({
                searching: false, // Disable search bar
                info: false, // Disable info (i.e., "Showing X of Y entries")
                paging: false, // Disable paging
                ordering: false, // Disable column sorting
                ajax: {
                    url: "json_cart_info.php",
                    data: {
                        user_id: user_id,
                    },
                    dataSrc: ""
                },
                columns: [{
                        data: "sub_total"
                    },
                    {
                        "data": "actions"
                    }
                ]
            });

            // Listen for changes to quantity input using event delegation
            $('#infoTable').on('click', '.delete-selected', function() {

                Swal.fire({
                    title: 'Delete Cart',
                    text: 'Are you sure you want to delete these items?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'POST',
                            url: 'process_delete_selected_cart.php',
                            data: {},
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Success', response.message, 'success');

                                    $('#infoTable').DataTable().ajax.reload();
                                    $('#purchaseTable').DataTable().ajax.reload();

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


            // Listen for changes to quantity input using event delegation
            $('#infoTable').on('click', '.purchase-selected', function() {
                var checkedCartIds = [];
                $('input[data-cart_id]:checked').each(function() {
                    checkedCartIds.push($(this).data('cart_id'));
                });

                if (checkedCartIds.length === 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'You don\'t have any selected!',
                    });
                } else {
                    var form = $('<form>', {
                        method: 'POST',
                        action: 'purchase_summary.php',
                    });

                    checkedCartIds.forEach(function(cartId) {
                        $('<input>', {
                            type: 'hidden',
                            name: 'cart_id[]',
                            value: cartId,
                        }).appendTo(form);
                    });

                    // Append the form to the document and submit it
                    form.appendTo('body').submit();
                }
            });






            $('#purchaseTable').DataTable({
                "ajax": {
                    "url": "json_cart.php",
                    data: {
                        user_id: user_id,
                    },
                    "dataSrc": ""
                },
                "columns": [{
                    "data": "item"
                }, ]
            });


            // Listen for changes to quantity input using event delegation
            $('#purchaseTable').on('change', '.quantity-input', function() {
                var cart_id = $(this).data('cart_id');
                var quantity = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: 'process_update_cart_quantity.php',
                    data: {
                        cart_id: cart_id,
                        quantity: quantity
                    },
                    success: function(response) {
                        $('#infoTable').DataTable().ajax.reload();
                        $('#purchaseTable').DataTable().ajax.reload();
                    }
                });
            });


            // Add click event handler for "delete" buttons
            $('#purchaseTable').on('click', '.delete-cart-item', function() {
                var cart_id = $(this).data('cart_id');

                Swal.fire({
                    title: 'Delete Cart (ID: ' + cart_id + ')',
                    text: 'Are you sure you want to delete this item?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Delete',
                    cancelButtonText: 'Cancel',
                }).then(function(result) {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: 'POST',
                            url: 'process_delete_cart.php',
                            data: {
                                cart_id: cart_id
                            },
                            dataType: 'json',
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire('Success', response.message, 'success');

                                    $('#infoTable').DataTable().ajax.reload();
                                    $('#purchaseTable').DataTable().ajax.reload();

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




            // Add click event handler for "delete" buttons
            $('#purchaseTable').on('click', '#checkbox-active', function() {
                var cart_id = $(this).data('cart_id');

                $.ajax({
                    type: 'POST',
                    url: 'process_change_is_active.php',
                    data: {
                        cart_id: cart_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#infoTable').DataTable().ajax.reload();
                            $('#cartTable').DataTable().ajax.reload();
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Failed to delete the game', 'error');
                    }
                });

            });





        });
    </script>
</body>

</html>