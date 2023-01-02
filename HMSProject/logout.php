<?php
session_start();
// if (!isset($_SESSION['user_name'])) {
//     header('location:error404.php');
// } else {
session_unset();
session_destroy();
header('location: index.php');
// }
