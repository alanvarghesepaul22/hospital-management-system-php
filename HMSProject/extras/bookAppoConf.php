<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Successfull!</title>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        body {
            display: flex;
            justify-content: center;

        }
    </style>
</head>

<body>
    <div class="confTitle">
        <div class=""><i class="bi bi-check-circle doneIcon"></i></div>
        <!-- <h2>Your appointment successfully booked. <br>
            More details will be informed soon..
        </h2> -->
        <h2>
            <?php
            echo $_SESSION['ALERT'];
            unset($_SESSION['ALERT']);
            ?>
        </h2>
        <a href="../patient-dash.php"><button class="commonBtn">Go back</button></a>
    </div>

</body>

</html>