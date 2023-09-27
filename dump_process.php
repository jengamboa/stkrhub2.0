<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Number Form</title>
</head>
<body>
    <h2>Enter a Number:</h2>
    <form action="process.php" method="post">
        <label for="number">Number:</label>
        <input type="number" id="number" name="number" min="1" max="100" required>
        <br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
