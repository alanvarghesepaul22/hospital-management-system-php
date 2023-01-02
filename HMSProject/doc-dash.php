<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
$_SESSION['doctor'] = 1;
$doctor = $_SESSION['dname'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Dashboard</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
</head>

<body>
    <?php
    include('./include/navBar.php');
    ?>
    <div class="container conta3">
        <h3 class="greeting">Welcome &nbsp<?php echo strtoupper($doctor) ?></h3>

        <div class="allCards">
            <div class="cards">
                <div class="iconBlock">
                    <i class="bi bi-card-checklist"></i>
                </div>
                <h4> View Appointments</h4>
                <a href="docAppoList.php">Appointment List</a>
            </div>

            <div class="cards">
                <div class="iconBlock">
                    <i class="bi bi-card-checklist"></i>
                </div>
                <h4> Prescriptions</h4>
                <a href="docPrescList.php"> View Prescription List</a>
            </div>
        </div>
    </div>

</body>

</html>