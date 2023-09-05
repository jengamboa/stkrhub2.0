<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List.js UI with External JSON</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

    <style>
        .pagination {
            margin-top: 10px;
            text-align: center;
        }

        .pagination li {
            display: inline-block;
            padding: 5px;
            margin: 0 5px;
            background-color: #e0e0e0;
            border: 1px solid #ccc;
            border-radius: 3px;
            cursor: pointer;
        }

        .pagination li.active {
            background-color: #007bff;
            color: #fff;
        }

        .pagination li:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <div id="test-list">
        <input type="text" class="search" />
        <ul class="list"></ul>
        <div class="pagination">
        </div>
    </div>


    <script>
        $.ajax({
            url: 'json_list.php',
            dataType: 'json',
            success: function (data) {

                var itemTemplate =
                    '<li style="">' +
                    '    <p class="published_game_id"></p>' +
                    '    <p class="game_name"></p>' +
                    '    <img class="image" src="" alt="Image" />' +
                    '    <p class="marketplace_price"></p>' +
                    '</li>';

                var monkeyList = new List('test-list', {
                    valueNames: [
                        'published_game_id',
                        'game_name',
                        'image',
                        'marketplace_price',
                    ],
                    page: 3,
                    pagination: {
                        left:1,
                        right:1,
                        center: true,
                    },
                    item: itemTemplate

                });

                // Add data to the list
                monkeyList.add(data);

                // Set the image source based on the data using jQuery
                $('.image').each(function (index) {
                    $(this).attr('src', data[index].image); // Set the src attribute
                });
            },
        });
    </script>
</body>

</html>