<?php
session_start();
include 'connection.php';

if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
} else {
    header("Location: admin_login.php");
    exit;
}

// SQL query to calculate the sum of desired_markup, manufacturer_profit, creator_profit, and marketplace_price
$sqlA = "SELECT
            SUM(desired_markup) AS total_desired_markup,
            SUM(manufacturer_profit) AS total_manufacturer_profit,
            SUM(creator_profit) AS total_creator_profit,
            SUM(marketplace_price) AS total_marketplace_price
        FROM
            orders";
$resultA = $conn->query($sqlA);

if ($resultA) {
    $rowA = $resultA->fetch_assoc();
    $totalDesiredMarkup = $rowA['total_desired_markup'];
    $totalManufacturerProfit = $rowA['total_manufacturer_profit'];
    $totalCreatorProfit = $rowA['total_creator_profit'];
    $totalMarketplacePrice = $rowA['total_marketplace_price'];
}

// SQL query to count the rows in the table
$sqlB = "SELECT COUNT(*) AS total_count FROM published_built_games";
$resultB = $conn->query($sqlB);
if ($resultB) {
    $rowB = $resultB->fetch_assoc();
    $published_games_total_count = $rowB['total_count'];
}

// SQL query to count the rows in the table
$sqlC = "SELECT COUNT(*) AS total_count FROM users";
$resultC = $conn->query($sqlC);
if ($resultC) {
    $rowC = $resultC->fetch_assoc();
    $users_total_count = $rowC['total_count'];
}

// SQL query to count the rows in the table
$sqlD = "SELECT COUNT(*) AS total_count FROM orders";
$resultD = $conn->query($sqlD);
if ($resultD) {
    $rowD = $resultD->fetch_assoc();
    $orders_total_count = $rowD['total_count'];
}

$sqlBuiltGames = "SELECT COUNT(built_game_id) AS total_built_games FROM built_games";
$sqlPublishedGames = "SELECT COUNT(published_game_id) AS total_published_games FROM published_built_games";
$resultBuiltGames = $conn->query($sqlBuiltGames);
$resultPublishedGames = $conn->query($sqlPublishedGames);

if ($resultBuiltGames && $resultPublishedGames) {
    $rowBuiltGames = $resultBuiltGames->fetch_assoc();
    $rowPublishedGames = $resultPublishedGames->fetch_assoc();

    $totalBuiltGames = $rowBuiltGames['total_built_games'];
    $totalPublishedGames = $rowPublishedGames['total_published_games'];
}

// Query to count the total number of rows with added_component_id
$sqlTotalComponents = "SELECT COUNT(*) AS total_components
                       FROM orders
                       WHERE in_production = 1
                       AND added_component_id IS NOT NULL";
$resultTotalComponents = $conn->query($sqlTotalComponents);
$rowTotalComponents = $resultTotalComponents->fetch_assoc();
$total_component_produced = $rowTotalComponents['total_components'];

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



</head>


<body>

    <div id="main-wrapper">
        <?php
        include 'html/admin_header.php';
        include 'html/admin_sidebar.php';
        ?>

        <div class="content-body">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-money text-success border-success"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">STKRHub Earnings</div>
                                    <div class="stat-digit"><?php echo $totalManufacturerProfit ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-user text-primary border-primary"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Players (<?php echo $users_total_count ?>) Earnings</div>
                                    <div class="stat-digit"><?php echo $totalManufacturerProfit ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-layout-grid2 text-pink border-pink"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Published Games</div>
                                    <div class="stat-digit"><?php echo $published_games_total_count ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-one card-body">
                                <div class="stat-icon d-inline-block">
                                    <i class="ti-link text-danger border-danger"></i>
                                </div>
                                <div class="stat-content d-inline-block">
                                    <div class="stat-text">Orders</div>
                                    <div class="stat-digit"><?php echo $orders_total_count ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <canvas id="myBarChart" width="400" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">

                        <div class="card">

                            <div class="widget-card-circle mt-5 mb-5" id="info-circle-card">
                                <canvas id="pieChart"></canvas>
                            </div>


                            <div class="card text-center">
                                <ul class="widget-line-list m-b-15">
                                    <li class="border-right"> <?php echo $totalPublishedGames ?>
                                        <br>
                                        <span class="text-success">Published Games</span>
                                    </li>
                                    <li><?php echo $totalBuiltGames ?>
                                        <br><span class="text-danger">Games Not Published</span>
                                    </li>
                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Best Seller</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">

                                    <table id="bestSeller" class="display" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Creator</th>
                                                <th>Status</th>
                                                <th>Bought</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 col-xxl-6 col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Most Earnings</h4>
                            </div>
                            <div class="card-body">
                                <div class="widget-timeline">

                                    <ul class="timeline">

                                        <table id="bestEarnings" class="display" style="width: 100%;">
                                            <thead>
                                                <tr>
                                                    <th>Avatar</th>
                                                    <th>Name</th>
                                                    <th>Earnings</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-xxl-6 col-md-6">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">Most Spent and Orders</h4>
                            </div>

                            <div class="card-body">
                                <div class="recent-comment m-t-15">



                                    <table id="bestOrders" class="display" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Avatar</th>
                                                <th>Name</th>
                                                <th>Spent</th>
                                                <th>Orders</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-xxl-6 col-md-6">
                        <div class="card">

                            <div class="card-header">
                                <h4 class="card-title">Most Published</h4>
                            </div>

                            <div class="card-body">
                                <div class="recent-comment m-t-15">


                                    <table id="bestPublished" class="display" style="width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Avatar</th>
                                                <th>Name</th>
                                                <th>Published</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-xl-12 col-xxl-6 col-lg-6 col-md-12">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                                <div class="card">
                                    <div class="social-graph-wrapper widget-facebook">
                                        <span class="s-icon"><i class="fa fa-facebook"></i></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 border-right">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1"><span class="counter"><?php echo $total_component_produced ?></span> k</h4>
                                                <p class="m-0">Friends</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1"><span class="counter">119</span> k</h4>
                                                <p class="m-0">Followers</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                                <div class="card">
                                    <div class="social-graph-wrapper widget-linkedin">
                                        <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 border-right">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1"><span class="counter">89</span> k</h4>
                                                <p class="m-0">Friends</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1"><span class="counter">119</span> k</h4>
                                                <p class="m-0">Followers</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                                <div class="card">
                                    <div class="social-graph-wrapper widget-googleplus">
                                        <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 border-right">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1"><span class="counter">89</span> k</h4>
                                                <p class="m-0">Friends</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1"><span class="counter">119</span> k</h4>
                                                <p class="m-0">Followers</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                                <div class="card">
                                    <div class="social-graph-wrapper widget-twitter">
                                        <span class="s-icon"><i class="fa fa-twitter"></i></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-6 border-right">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1"><span class="counter">89</span> k</h4>
                                                <p class="m-0">Friends</p>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                                <h4 class="m-1"><span class="counter">119</span> k</h4>
                                                <p class="m-0">Followers</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="year-calendar"></div>
                            </div>
                        </div>
                        <!-- /# card -->
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">All Expense</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table student-data-table m-t-20">
                                        <thead>
                                            <tr>
                                                <th>Expense Type</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th>Email</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>

                                                <td>
                                                    Salary
                                                </td>
                                                <td>
                                                    $2000
                                                </td>
                                                <td>
                                                    <span class="badge badge-primary">Paid</span>
                                                </td>
                                                <td>
                                                    edumin@gmail.com
                                                </td>
                                                <td>
                                                    10/05/2017
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    Salary
                                                </td>
                                                <td>
                                                    $2000
                                                </td>
                                                <td>
                                                    <span class="badge badge-warning">Pending</span>
                                                </td>
                                                <td>
                                                    edumin@gmail.com
                                                </td>
                                                <td>
                                                    10/05/2017
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    Salary
                                                </td>
                                                <td>
                                                    $2000
                                                </td>
                                                <td>
                                                    <span class="badge badge-primary">Paid</span>
                                                </td>
                                                <td>
                                                    edumin@gmail.com
                                                </td>
                                                <td>
                                                    10/05/2017
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    Salary
                                                </td>
                                                <td>
                                                    $2000
                                                </td>
                                                <td>
                                                    <span class="badge badge-danger">Due</span>
                                                </td>
                                                <td>
                                                    edumin@gmail.com
                                                </td>
                                                <td>
                                                    10/05/2017
                                                </td>
                                            </tr>
                                            <tr>

                                                <td>
                                                    Salary
                                                </td>
                                                <td>
                                                    $2000
                                                </td>
                                                <td>
                                                    <span class="badge badge-primary">Paid</span>
                                                </td>
                                                <td>
                                                    edumin@gmail.com
                                                </td>
                                                <td>
                                                    10/05/2017
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
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

            $('#bestPublished').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_best_published.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "avatar"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "game_count"
                    },

                ]
            });




            $('#bestEarnings').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_best_earnings.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "avatar"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "earnings"
                    },

                ]
            });






            $('#bestSeller').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_best_seller.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "title"
                    },
                    {
                        "data": "category"
                    },
                    {
                        "data": "price"
                    },
                    {
                        "data": "creator"
                    },
                    {
                        "data": "status"
                    },
                    {
                        "data": "frequency"
                    },

                ],
                order: [[5, 'desc']] 
            });



            $('#bestOrders').DataTable({
                searching: true,
                info: false,
                paging: true,
                ordering: true,

                "ajax": {
                    "url": "admin_json_best_order.php",
                    data: {},
                    "dataSrc": ""
                },
                "columns": [{
                        "data": "avatar"
                    },
                    {
                        "data": "name"
                    },
                    {
                        "data": "spent"
                    },
                    {
                        "data": "orders"
                    },
                ]
            });




            // Load JSON data
            $.getJSON('admin_json_built_vs_published_chart.php', function(data) {
                var labels = [];
                var values = [];

                // Extract labels and values from JSON
                data.forEach(function(item) {
                    labels.push(item.label);
                    values.push(item.value);
                });

                // Create a pie chart
                var ctx = document.getElementById('pieChart').getContext('2d');
                var pieChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: labels,
                        datasets: [{
                            data: values,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                            ],
                        }],
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                    },
                });
            });




            // Get the canvas element
            var ctx = document.getElementById('myBarChart').getContext('2d');

            $.getJSON('admin_monthly_manufacturer_earning.php', function(data) {
                // Define chart data using JSON data
                var chartData = {
                    labels: data.labels,
                    datasets: [{
                        label: 'Sample Data',
                        data: data.data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)',
                            'rgba(153, 102, 255, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)'
                        ],
                        borderWidth: 1
                    }]
                };

                // Define chart options
                var options = {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                };

                // Create the bar chart
                var myBarChart = new Chart(ctx, {
                    type: 'bar',
                    data: chartData,
                    options: options
                });
            });




        });
    </script>

</body>

</html>