<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$doctor = $_SESSION['dname'];
if (isset($_GET['cancel'])) {
    $query = mysqli_query($con, "update appointmenttb set userStatus='0' where ID = '" . $_GET['ID'] . "'");
    if ($query) {
      $_SESSION['ALERT']='Your appointment successfully cancelled';
      header('Location:./docAppoList.php');
    }
  }
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
        <h2>All Appointments</h2>
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
                    <!-- <th scope="col">Appointment ID</th> -->
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Gender</th>
                    <!-- <th scope="col">Email</th> -->
                    <th scope="col">Contact</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Current Status</th>
                    <th scope="col">Action</th>
                    <th scope="col">Prescribe</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $con = mysqli_connect("localhost", "root", "", "myhmsdb");
                global $con;
                $dname = $_SESSION['dname'];
                $query = "select pid,ID,fname,lname,gender,email,contact,appdate,apptime,userStatus,doctorStatus from appointmenttb where doctor='$dname';";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $row['pid']; ?></td>
                        <!-- <td><?php echo $row['ID']; ?></td> -->
                        <td><?php echo $row['fname']; ?></td>
                        <td><?php echo $row['lname']; ?></td>
                        <td><?php echo $row['gender']; ?></td>
                        <!-- <td><?php echo $row['email']; ?></td> -->
                        <td><?php echo $row['contact']; ?></td>
                        <td><?php echo $row['appdate']; ?></td>
                        <td><?php echo $row['apptime']; ?></td>
                        <td>
                            <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                                echo "Active";
                            }
                            if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                                echo "Cancelled by Patient";
                            }

                            if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                                echo "Cancelled by You";
                            }
                            ?></td>

                        <td>
                            <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>


                                <a href="./docAppoList.php?ID=<?php echo $row['ID'] ?>&cancel=update" onClick="return confirm('Are you sure you want to cancel this appointment ?')" title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
                            <?php } else {

                                echo "Cancelled";
                            } ?>

                        </td>

                        <td>

                            <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>

                                <a href="prescribe.php?pid=<?php echo $row['pid'] ?>&ID=<?php echo $row['ID'] ?>&fname=<?php echo $row['fname'] ?>&lname=<?php echo $row['lname'] ?>&appdate=<?php echo $row['appdate'] ?>&apptime=<?php echo $row['apptime'] ?>" tooltip-placement="top" tooltip="Remove" title="prescribe">
                                    <button class="btn btn-success">Prescibe</button></a>
                            <?php } else {

                                echo "-";
                            } ?>

                        </td>


                    </tr></a>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>