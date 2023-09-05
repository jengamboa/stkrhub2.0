<?php
include 'connection.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Retrieve cart data including games and game components with is_active = 1
$query_cart = "SELECT cart.cart_id, cart.built_game_id, cart.added_component_id, cart.quantity, cart.price,
              built_games.name AS game_name,
              built_games_added_game_components.is_custom_design, built_games_added_game_components.custom_design_file_path,
              built_games_added_game_components.quantity AS component_quantity, built_games_added_game_components.color_id, built_games_added_game_components.size
              FROM cart
              LEFT JOIN built_games ON cart.built_game_id = built_games.built_game_id
              LEFT JOIN built_games_added_game_components ON cart.added_component_id = built_games_added_game_components.added_component_id
              WHERE cart.user_id = '$user_id' AND cart.is_active = 1";
$result_cart = mysqli_query($conn, $query_cart);
?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="CodePixar">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Karma Shop</title>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/linearicons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">

    <style>
        <?php
        include 'css/body.css';
        ?>
    </style>
</head>

<body>

    <?php
    include 'html/page_header2.php';
    ?>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <div class="panel">

        <section class="cart_area">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Checkbox</th>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form id="cartForm" method="post" action="process_purchase_cart.php">
                                    <tr>
                                        <?php
                                        while ($item = mysqli_fetch_assoc($result_cart)) {
                                            // checkbox
                                            echo '<td class="text-center" style="vertical-align: middle;">';
                                            echo '<div class="custom-control custom-checkbox custom-control-xl">';


                                            echo '<input type="checkbox" name="selectedItems[]" value="' . $item['cart_id'] . '" class="custom-control-input item-checkbox"
                                                    id="customCheck1">';
                                            echo '<label class="custom-control-label" for="customCheck1"></label>';
                                            echo '</div>';
                                            echo '</td>';



                                            if (!empty($item['built_game_id'])) {
                                                // Title
                                                echo '<td>';
                                                echo '<div class="media">';
                                                echo '<div class="d-flex">';
                                                echo '<img src="img/cart.jpg" alt="">';
                                                echo '</div>';
                                                echo '<div class="media-body">';
                                                echo '<p>Built Game: ' . $item['game_name'] . '</p>';
                                                echo '</div>';
                                                echo '</div>';
                                                echo '</td>';
                                            }

                                            echo '<td>';
                                            echo '<h5>$360.00</h5>';
                                            echo '</td>';

                                            echo '<td>';
                                            echo '<div class="product_count">';

                                            echo '<input type="hidden" name="' . $item['cart_id'] . '">';

                                            echo '<input type="number" id="quantity_' . $item['cart_id'] . '" value="' . $item['quantity'] . '" onchange="updateQuantity(' . $item['cart_id'] . ', this.value)"
                                                    title="Quantity:" class="input-text qty">';


                                            echo '</div>';
                                            echo '</td>';

                                            echo '<td>';
                                            echo '<h5>$360.00</h5>';
                                            echo '</td>';


                                        }
                                        ?>

                                        <button id="purchaseButton">Purchase Selected</button>
                                    </tr>
                                </form>

                                <tr class="bottom_button">
                                    <td>

                                    </td>
                                    <td>
                                        <button class="gray_btn" id="deleteButton">Delete Selected</button>
                                    </td>

                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="cupon_text d-flex align-items-center">
                                            <input type="text" placeholder="Coupon Code">
                                            <a class="primary-btn" href="#">Apply</a>
                                            <a class="gray_btn" href="#">Close Coupon</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Subtotal</h5>
                                    </td>
                                    <td>
                                        <h5>$2160.00</h5>
                                    </td>
                                </tr>
                                <tr class="shipping_area">
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <h5>Shipping</h5>
                                    </td>
                                    <td>
                                        <div class="shipping_box">
                                            <ul class="list">
                                                <li><a href="#">Flat Rate: $5.00</a></li>
                                                <li><a href="#">Free Shipping</a></li>
                                                <li><a href="#">Flat Rate: $10.00</a></li>
                                                <li class="active"><a href="#">Local Delivery: $2.00</a></li>
                                            </ul>
                                            <h6>Calculate Shipping <i class="fa fa-caret-down" aria-hidden="true"></i>
                                            </h6>
                                            <select class="shipping_select">
                                                <option value="1">Bangladesh</option>
                                                <option value="2">India</option>
                                                <option value="4">Pakistan</option>
                                            </select>
                                            <select class="shipping_select">
                                                <option value="1">Select a State</option>
                                                <option value="2">Select a State</option>
                                                <option value="4">Select a State</option>
                                            </select>
                                            <input type="text" placeholder="Postcode/Zipcode">
                                            <a class="gray_btn" href="#">Update Details</a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="out_button_area">
                                    <td>

                                    </td>

                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <div class="checkout_btn_inner d-flex align-items-center">
                                            <a class="gray_btn" href="#">Continue Shopping</a>
                                            <a class="primary-btn" href="#">Proceed to checkout</a>
                                        </div>
                                    </td>

                                    <td>

                                    </td>

                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--================End Cart Area =================-->

    <?php
    include 'html/page_footer.php';
    ?>

    <script src="js/vendor/jquery-2.2.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
    <script src="js/vendor/bootstrap.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/nouislider.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/main.js"></script>

    <!-- mine -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateQuantity(cartId, newQuantity) {
            // Send AJAX request to update quantity
            $.ajax({
                url: 'process_update_quantity.php', // Replace with your PHP script
                method: 'POST',
                data: { cart_id: cartId, quantity: newQuantity },
                success: function (response) {
                    // Handle success (e.g., display updated cart or refresh page)
                    console.log('Quantity updated successfully');
                    // You can update the cart display here if needed
                },
                error: function (xhr, status, error) {
                    console.error('Error updating quantity:', error);
                }
            });
        }
    </script>
    <script>
        $(document).ready(function () {

            $("#deleteButton").click(function () {
                $.ajax({
                    type: "POST",
                    url: "process_delete_cart.php",
                    data: $("#cartForm").serialize(),
                    success: function (response) {
                        // Handle the response from process_delete_cart.php if needed
                        console.log(response);
                        // For example, you could display a message
                        // alert("Items deleted successfully!");
                    },
                    error: function (xhr, status, error) {
                        // Handle errors if any
                        console.error(error);
                    }
                });
            });
        });
    </script>
</body>

</html>