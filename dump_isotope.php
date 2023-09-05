<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isotope Sample with jQuery</title>
    <!-- Include jQuery and Isotope libraries -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
</head>

<body>
    <!-- Your content with filterable items -->
    <div class="grid">
        <div class="grid-item filter-class1">Item 1</div>
        <div class="grid-item filter-class2">Item 2</div>
        <div class="grid-item filter-class1">Item 3</div>
        <!-- Add more items with different classes as needed -->
    </div>

    <!-- Filter buttons -->
    <button data-filter="*">All</button>
    <button data-filter=".filter-class1">Category 1</button>
    <button data-filter=".filter-class2">Category 2</button>

    <script>
        $(document).ready(function () {
            var $grid = $('.grid');

            // Function to load JSON data and populate the grid
            function loadJSONData() {
                $.ajax({
                    url: 'json_isotope.php', // URL to your JSON data source
                    dataType: 'json',
                    success: function (data) {
                        // Initialize Isotope with jQuery
                        $grid.isotope({
                            itemSelector: '.grid-item',
                            layoutMode: 'fitRows'
                        });

                        // Loop through the JSON data and create grid items
                        $.each(data, function (index, item) {
                            var $gridItem = $("<div>").addClass("grid-item " + item.category).text(item.name);
                            $grid.append($gridItem);
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error("Error loading JSON data: " + error);
                    }
                });
            }

            // Load JSON data and populate the grid
            loadJSONData();

            // Button click event to filter items
            $('button').on('click', function () {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
            });
        });
    </script>

</body>

</html>