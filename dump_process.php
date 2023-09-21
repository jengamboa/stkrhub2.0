<!DOCTYPE html>
<html>

<head>
  <title>Sample Form</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>

  <h2>Sample Form</h2>
  <form id="createGameForm">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>
    <br>

    <label for="description">Description:</label>
    <textarea id="description" name="description" required></textarea> <!-- Added closing tag </textarea> -->
    <br>

    <input type="submit" value="Submit">
  </form>


  <script>
    $(document).ready(function() {
      $("#createGameForm").submit(function(event) {
        var formData = {
          name: $("#name").val(),
          description: $("#description").val(),
        };

        console.log("Form Data:", formData); // Log formData for debugging

        $.ajax({
          type: "POST",
          url: "process_create_game.php",
          data: formData,
          dataType: "json",
          encode: true,
        }).done(function(data) {
          console.log("Response Data:", data); // Log the response data for debugging
          alert('asd');
        });

        event.preventDefault();
      });
    });
  </script>
</body>

</html>