<?php
include 'connection.php';
include 'html/header.html.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Handle the case where the user is not logged in, e.g., redirect to a login page
    header("Location: login_page.php");
    exit();
}

// Get the user_id from the SESSION
$user_id = $_SESSION['user_id'];

// Check if the required GET parameters are set
if (isset($_GET['order_id']) && isset($_GET['rating_id'])) {
    $order_id = $_GET['order_id'];
    $rating_id = $_GET['rating_id'];

    // Echo the user_id, order_id, and rating_id
    echo "User ID: $user_id<br>";
    echo "Order ID: $order_id<br>";
    echo "Rating ID: $rating_id<br>";

    // Fetch other rating details based on rating_id, user_id, and order_id
    $fetchRatingSQL = "SELECT rating, comment FROM ratings WHERE user_id = $user_id AND order_id = $order_id AND rating_id = $rating_id";
    $ratingResult = mysqli_query($conn, $fetchRatingSQL);

} else {
    echo "Invalid request. Please provide both order ID and rating ID.";
}
?>


<form method="post" action="process_edit_rating.php">
    <!-- Hidden input for user_id -->
    <input type="hidden" name="user_id" value="<?= $user_id ?>">

    <div class="rating">
        <input type="radio" name="rating" value="1" id="1" required><label for="1">1</label>
        <input type="radio" name="rating" value="2" id="2" required><label for="2">2</label>
        <input type="radio" name="rating" value="3" id="3" required><label for="3">3</label>
        <input type="radio" name="rating" value="4" id="4" required><label for="4">4</label>
        <input type="radio" name="rating" value="5" id="5" required><label for="5">5</label>
    </div>

    <div class="comment-area">
        <textarea class="form-control" name="comment" placeholder="What is your view?" rows="4" required></textarea>
    </div>

    <button type="submit">Update</button>

    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
    <input type="hidden" name="rating_id" value="<?php echo $rating_id; ?>">
</form>