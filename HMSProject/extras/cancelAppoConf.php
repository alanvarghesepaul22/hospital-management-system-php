<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
if (isset($_GET['cancel'])) {
    $query = mysqli_query($con, "update appointmenttb set userStatus='0' where ID = '" . $_GET['ID'] . "'");
    if ($query) {
      $_SESSION['ALERT']='Your appointment successfully cancelled';
      header('Location:../myAppo.php');
    }
  }


  