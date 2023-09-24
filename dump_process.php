<!DOCTYPE html>
<html>

<head>
    <title>jQuery Form Example</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
</head>

<body>
    <div class="col-sm-6 col-sm-offset-3">
        <h1>Processing an AJAX Form</h1>

        <form id="uploadForm" enctype="multipart/form-data">
            <input type="file" name="logo[]" accept="image/*" required multiple>
            <input type="text" name="description" placeholder="Description">
            <input type="file" name="singleLogo" accept="image/*" required>
            <input type="submit" value="Upload Images">
        </form>



    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function () {
            $('#uploadForm').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                // Create a FormData object to send the file
                var formData = new FormData(this);

                $.ajax({
                    url: 'dump_process_form.php', // Your server-side script to handle the upload
                    type: 'POST',
                    data: formData,
                    processData: false, // Important: Don't process data
                    contentType: false, // Important: Don't set content type
                    success: function (response) {
                        // Handle the response from the server (e.g., display a success message)
                        console.log(response);
                    },
                });
            });
        });

    </script>

</body>

</html>