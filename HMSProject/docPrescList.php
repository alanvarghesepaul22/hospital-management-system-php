<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$doctor = $_SESSION['dname'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Prescriptions</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">

</head>

<body>
    <?php
    include('./include/navBar.php');
    ?>

    <div class="headingContainer">
        <h2>All Prescriptions</h2>
    </div>
    <?php
    if (isset($_SESSION['ALERT'])) {
    ?>
        <div class="alertContainerCover">
            <div class="alertContainer">
                <p> <?php echo $_SESSION['ALERT']; ?> </p>
            </div>
        </div>
    <?php
    }
    unset($_SESSION['ALERT']);
    ?>


    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Patient ID</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Prescribe</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select pid,fname,lname,ID,appdate,apptime,disease,allergy,prescription from prestb where doctor='$doctor';";

                $result = mysqli_query($con, $query);
                if (!$result) {
                    echo mysqli_error($con);
                }


                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['pid']; ?></td>
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['appdate']; ?></td>
                        <td><?php echo $row['apptime']; ?></td>
                        <td><?php echo $row['disease']; ?></td>
                        <td><?php echo $row['allergy']; ?></td>
                        <td><?php echo $row['prescription']; ?></td>

                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>