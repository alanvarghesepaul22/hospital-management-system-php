<?php
// session_start();
$patientLog=$doctorLog=$adminLog=0;
if (isset($_SESSION['patient'])) {
    $patientLog = $_SESSION['patient'];
}

if (isset($_SESSION['doctor'])) {
    $doctorLog = $_SESSION['doctor'];
}

if (isset($_SESSION['admin'])) {
    $adminLog = $_SESSION['admin'];
}

?>

<head>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>

<nav class="navbar navbar-dark fixed-top ">
    <div class="navClass">
        <?php
        if ($patientLog == 1) {
        ?>
            <a class="navbar-brand navTitle" href="patient-dash.php">Hospital Management System</a>
            <div class="homeIconDiv">
                <a href="patient-dash.php"> <i class="bi bi-house-door homeIcon"></i></a>
            </div>
        <?php
        } elseif ($doctorLog == 1) {
        ?>
            <a class="navbar-brand" href="doc-dash.php">Hospital Management System</a>
            <div class="homeIconDiv">
                <a href="doc-dash.php"> <i class="bi bi-house-door homeIcon"></i></a>
            </div>
        <?php
        } elseif ($adminLog == 1) {
        ?>
            <a class="navbar-brand" href="#">Hospital Management System</a>
            <div class="homeIconDiv">
                <a href=""> <i class="bi bi-house-door homeIcon"></i></a>
            </div>
        <?php
        }
        ?>
    </div>

    <div>
        <a class="nav-link" href="logout.php">
            <div class="logBtn"><i class="bi bi-box-arrow-right logoutIcon"></i> Logout</div>
        </a>
    </div>
</nav>