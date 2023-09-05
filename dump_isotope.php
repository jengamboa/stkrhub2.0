<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isotope.js Sample</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Your custom CSS for styling -->
</head>

<body>
    <header>
        <h1>Isotope.js Sample</h1>
        <div class="filters">
            <button data-filter="*">All</button>
            <button data-filter=".category1">Category 1</button>
            <button data-filter=".category2">Category 2</button>
            <!-- Add more filter buttons as needed -->
        </div>
    </header>
    <main>
        <div class="grid">
            <!-- Isotope.js will populate this with grid items -->
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
    <script src="app.js"></script> <!-- Your custom JavaScript for Isotope.js -->

    <script>
        $(document).ready(function () {
            // Initialize Isotope.js
            var $grid = $('.grid').isotope({
                itemSelector: '.grid-item',
                layoutMode: 'fitRows'
            });

            // Load data from json_isotope.php using AJAX
            $.ajax({
                url: 'json_isotope.php', // Replace with the correct path
                dataType: 'json',
                success: function (data) {
                    // Iterate through the data and create grid items
                    $.each(data, function (index, item) {
                        var $gridItem = $('<div class="grid-item ' + item.category + '"></div>');
                        $gridItem.append('<h3>' + item.name + '</h3>');
                        $gridItem.append('<img src="' + item.image + '" alt="' + item.name + '">');
                        $grid.append($gridItem).isotope('appended', $gridItem);
                    });

                    // Filter items when filter buttons are clicked
                    $('.filters button').on('click', function () {
                        var filterValue = $(this).attr('data-filter');
                        $grid.isotope({ filter: filterValue });
                    });
                },
                error: function (xhr, status, error) {
                    console.error('Error loading data:', status, error);
                }
            });
        });

    </script>
</body>

</html>