<?php
include 'connection.php';
include 'html/header.html.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cancel'])) {

    // Get the user_id from the session
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        // Handle the case where the user is not logged in, e.g., redirect to a login page
        header("Location: login.php");
        exit();
    }

    $order_id = $_POST['order_id'];
    $published_game_id = $_POST['published_game_id'];

    echo $order_id . '<br>';
    echo $published_game_id;

    $checkRatedSQL = "SELECT is_rated FROM orders WHERE order_id = $order_id";
    $result = mysqli_query($conn, $checkRatedSQL);

    if ($result) {
        $order = mysqli_fetch_assoc($result);
        $isRated = $order['is_rated'];

        if ($isRated == 1) {
            // Order is already rated, redirect to edit_rating_page.php
            header("Location: view_rating_page.php?order_id=$order_id");
            exit();
        }
    }
}


?>

<form method="post" action="process_rating.php">
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

    <button type="submit">Confirm</button>

    <input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
    <input type="hidden" name="published_game_id" value="<?php echo $published_game_id; ?>">
</form>