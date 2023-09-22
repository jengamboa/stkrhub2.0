<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include jQuery library from a CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <select id="mySelect">
        <option value="x">x</option>
        <option value="y">y</option>
    </select>

    <script>

        $("#mySelect").change(function () {

            var selectedValue = $(this).val();

            $.ajax({
                type: "POST",
                url: "dump_process_purchase_cart.php",
                data: { value: selectedValue },
                success: function (response) {
                    console.log("AJAX request successful!");
                },
            });
        });
    </script>
</body>

</html>
