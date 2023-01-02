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
        <h2>My Appointments</h2>
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
                    <th scope="col">Consultancy Fees</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;

                $query = "select ID,doctor,docFees,appdate,apptime,userStatus,doctorStatus from appointmenttb where fname ='$fname' and lname='$lname';";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {

                    #$fname = $row['fname'];
                    #$lname = $row['lname'];
                    #$email = $row['email'];
                    #$contact = $row['contact'];
                ?>
                    <tr>
                        <td><?php echo $row['doctor']; ?></td>
                        <td><?php echo $row['docFees']; ?></td>
                        <td><?php echo $row['appdate']; ?></td>
                        <td><?php echo $row['apptime']; ?></td>

                        <td>
                            <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                                echo "Active";
                            }
                            if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                                echo "Cancelled by You";
                            }

                            if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                                echo "Cancelled by Doctor";
                            }
                            ?></td>

                        <td>
                            <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>


                                <a href="./extras/cancelAppoConf.php?ID=<?php echo $row['ID'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger cancelBtn">Cancel</button></a>
                            <?php } else {

                                echo "Cancelled";
                            } ?>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>