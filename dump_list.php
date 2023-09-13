<?php
    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <title>Document</title>

    <style>
        .pagination li {
            display: inline-block;
            padding: 5px;
        }

        
    </style>
</head>

<body>


    <div id="test-list">
        <input type="text" class="search" />
        <ul class="list">

            <?php
            include 'connection.php';

            $sql = "SELECT * FROM games WHERE user_id = $user_id";
            $result = $conn->query($sql);

            while ($fetched = $result->fetch_assoc()) {
                $game_id = $fetched['game_id'];
                $name = $fetched['name'];
                $description = $fetched['description'];
                $user_id = $fetched['user_id'];
                $created_at = $fetched['created_at'];

                echo '
                <li style="background-color: red;">
                    <p class="name">'. $name .'</p>
                </li>
                ';
            }

            ?>

            
        </ul>
        <ul class="pagination"></ul>
    </div>

    <script>
        var monkeyList = new List('test-list', {
            valueNames: ['name'],
            page: 3,
            pagination: true
        });
    </script>
</body>

</html>