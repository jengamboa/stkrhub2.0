<!DOCTYPE html>
<html>

<head>
    <title>Simple Bar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <canvas id="myBarChart" width="400" height="200"></canvas>

    <script>
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
    </script>

</body>

</html>