<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$_SESSION['admin'] = 1;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
</head>
<style>
    /* .allCards{
        display: flex;
        flex-direction: row;
    } */
    .cards{
        width: 60%;
    }
</style>
<body>
    <?php
    include('./include/navBar.php');
    ?>
    <div class="container conta3">
        <h3 class="greeting">Welcome Receptionist</h3>

        <div class="allCards">
            <!-- <div class="cardsTop"> -->
                <div class="cards">
                    <div class="iconBlock">
                        <i class="bi bi-card-checklist"></i>
                    </div>
                    <h4> Doctor List</h4>
                    <a href="bookAppo.php">View Doctors</a>
                </div>

                <div class="cards">
                    <div class="iconBlock">
                        <i class="bi bi-card-checklist"></i>
                    </div>
                    <h4> Patient List</h4>
                    <a href="myAppo.php"> View Patients</a>
                </div>

                <div class="cards">
                    <div class="iconBlock">
                        <i class="bi bi-card-checklist"></i>
                    </div>
                    <h4> Appointment Details</h4>
                    <a href="myAppo.php"> View Appointments</a>
                </div>
            <!-- </div> -->

            <!-- <div class="cardsBottom"> -->
                <div class="cards">
                    <div class="iconBlock">
                        <i class="bi bi-card-checklist"></i>
                    </div>
                    <h4> Prescriptions List</h4>
                    <a href="PrescList.php">View Prescription List</a>
                </div>

                <div class="cards">
                    <div class="iconBlock">
                        <i class="bi bi-card-checklist"></i>
                    </div>
                    <h4> Manage Doctors</h4>
                    <a href="PrescList.php">Add Doctors</a>
                    <a href="PrescList.php">Delete Doctors</a>
                </div>
            <!-- </div> -->
        </div>
    </div>



</body>

</html>