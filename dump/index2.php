<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/filepond@4.28.2/dist/filepond.min.css" rel="stylesheet">
    <title>FilePond Example</title>
</head>

<body>
    <h2>Simple Form with Dropzone</h2>

    <form action="process_form.php" method="post" enctype="multipart/form-data">
        Final Game Name:
        <input type="text" name="final_game_name">

        Edition:
        <input type="text" name="edition">

        <input type="file" name="multiple_files[]" class="filepond">

        <input type="submit" value="Submit">
    </form>

    <script src="https://unpkg.com/filepond@4.28.2/dist/filepond.min.js"></script>
    <script>
        // Initialize FilePond with allowMultiple and maxFiles options
        const inputElement = document.querySelector('.filepond');
        FilePond.create(inputElement, {
            allowMultiple: true,
            maxFiles: 2,
            allowReplace: true,
            allowRemove: true,
            required: true,
            allowDrop: true,
            allowBrowse: true,
            storeAsFile: true,
        });
    </script>
</body>

</html>