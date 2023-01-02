<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$pid = $_SESSION['pid'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$fname = $_SESSION['fname'];
$gender = $_SESSION['gender'];
$lname = $_SESSION['lname'];
$contact = $_SESSION['contact'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>
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

                    <th scope="col">Doctor Name</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Diseases</th>
                    <th scope="col">Allergies</th>
                    <th scope="col">Prescriptions</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select doctor,ID,appdate,apptime,disease,allergy,prescription from prestb where pid='$pid';";

                $result = mysqli_query($con, $query);
                if (!$result) {
                    echo mysqli_error($con);
                }


                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['doctor']; ?></td>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['appdate']; ?></td>
                        <td><?php echo $row['apptime']; ?></td>
                        <td><?php echo $row['disease']; ?></td>
                        <td><?php echo $row['allergy']; ?></td>
                        <td><?php echo $row['prescription']; ?></td>
                        </form>


                    </tr>
                <?php }
                ?>
            </tbody>
        </table>
        <br>

    </div>

</body>

</html>