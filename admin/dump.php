<!DOCTYPE html>
<html>

<head>
    <title>Simple Bar Chart</title>
    
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Include DataTables CSS and JS files -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>

</head>

<body>
    <table id="myDataTable" class="display">
        <thead>
            <tr>
                <th>Name</th>
                <th>Age</th>
                <th>City</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>John</td>
                <td>30</td>
                <td>New York</td>
            </tr>
            <tr>
                <td>Alice</td>
                <td>25</td>
                <td>Los Angeles</td>
            </tr>
            <!-- Add more rows as needed -->
        </tbody>
    </table>





    
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>


    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                "paging": true, // Enable pagination
                "searching": true // Enable search bar
                // Add more options as needed
            });
        });
    </script>


</body>

</html>