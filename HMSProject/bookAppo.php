<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "myhmsdb");
function display_specs()
{
    global $con;
    $query = "select distinct(spec) from doctb";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $spec = $row['spec'];
        echo '<option data-value="' . $spec . '">' . $spec . '</option>';
    }
}

function display_docs()
{
    global $con;
    $query = "select * from doctb";
    $result = mysqli_query($con, $query);
    while ($row = mysqli_fetch_array($result)) {
        $username = $row['username'];
        $price = $row['docFees'];
        $spec = $row['spec'];
        echo '<option value="' . $username . '" data-value="' . $price . '" data-spec="' . $spec . '">' . $username . '</option>';
    }
}

if (isset($_POST['app-submit'])) {
    $pid = $_SESSION['pid'];
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $gender = $_SESSION['gender'];
    $contact = $_SESSION['contact'];
    $doctor = $_POST['doctor'];
    $email = $_SESSION['email'];
    # $fees=$_POST['fees'];
    $docFees = $_POST['docFees'];

    $appdate = $_POST['appdate'];
    $apptime = $_POST['apptime'];
    $cur_date = date("Y-m-d");
    date_default_timezone_set('Asia/Kolkata');
    $cur_time = date("H:i:s");
    $apptime1 = strtotime($apptime);
    $appdate1 = strtotime($appdate);

    if (date("Y-m-d", $appdate1) >= $cur_date) {
        if ((date("Y-m-d", $appdate1) == $cur_date and date("H:i:s", $apptime1) > $cur_time) or date("Y-m-d", $appdate1) > $cur_date) {
            $check_query = mysqli_query($con, "select apptime from appointmenttb where doctor='$doctor' and appdate='$appdate' and apptime='$apptime'");

            if (mysqli_num_rows($check_query) == 0) {
                $query = mysqli_query($con, "insert into appointmenttb(pid,fname,lname,gender,email,contact,doctor,docFees,appdate,apptime,userStatus,doctorStatus) values($pid,'$fname','$lname','$gender','$email','$contact','$doctor','$docFees','$appdate','$apptime','1','1')");

                if ($query) {
                    $_SESSION['ALERT'] = 'Your appointment successfully booked. <br>
                    More details will be informed soon..';
                    header("Location:./extras/bookAppoConf.php");
                } else {
                    echo "<script>alert('Unable to process your request. Please try again!');</script>";
                }
            } else {
                echo "<script>alert('We are sorry to inform that the doctor is not available in this time or date. Please choose different time or date!');</script>";
            }
        } else {
            echo "<script>alert('Select a time or date in the future!');</script>";
        }
    } else {
        echo "<script>alert('Select a time or date in the future!');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

</head>

<body>

    <?php
    include('./include/navBar.php');
    ?>
    <div class="container cont4">
        <div class="card">
            <div class="card-body">
                <center>
                    <h4>Create an appointment</h4>
                </center><br>
                <form class="form-group" method="post" action="#">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="spec">Specialization:</label>
                        </div>
                        <div class="col-md-8">
                            <select name="spec" class="form-control" id="spec">
                                <option value="" disabled selected>Select Specialization</option>
                                <?php
                                display_specs();
                                ?>
                            </select>
                        </div>

                        <br><br>

                        <script>
                            document.getElementById('spec').onchange = function foo() {
                                let spec = this.value;
                                console.log(spec)
                                let docs = [...document.getElementById('doctor').options];

                                docs.forEach((el, ind, arr) => {
                                    arr[ind].setAttribute("style", "");
                                    if (el.getAttribute("data-spec") != spec) {
                                        arr[ind].setAttribute("style", "display: none");
                                    }
                                });
                            };
                        </script>

                        <div class="col-md-4"><label for="doctor">Doctors:</label></div>
                        <div class="col-md-8">
                            <select name="doctor" class="form-control" id="doctor" required="required">
                                <option value="" disabled selected>Select Doctor</option>

                                <?php display_docs(); ?>
                            </select>
                        </div><br /><br />


                        <script>
                            document.getElementById('doctor').onchange = function updateFees(e) {
                                var selection = document.querySelector(`[value=${this.value}]`).getAttribute('data-value');
                                document.getElementById('docFees').value = selection;
                            };
                        </script>



                        <div class="col-md-4"><label for="consultancyfees">
                                Consultancy Fees
                            </label></div>
                        <div class="col-md-8">
                            <!-- <div id="docFees">Select a doctor</div> -->
                            <input class="form-control" type="text" name="docFees" id="docFees" readonly="readonly" />
                        </div><br><br>

                        <div class="col-md-4"><label>Appointment Date</label></div>
                        <div class="col-md-8"><input type="date" class="form-control datepicker" name="appdate"></div><br><br>

                        <div class="col-md-4"><label>Appointment Time</label></div>
                        <div class="col-md-8">
                            <!-- <input type="time" class="form-control" name="apptime"> -->
                            <select name="apptime" class="form-control" id="apptime" required="required">
                                <option value="" disabled selected>Select Time</option>
                                <option value="08:00:00">8:00 AM</option>
                                <option value="10:00:00">10:00 AM</option>
                                <option value="12:00:00">12:00 PM</option>
                                <option value="14:00:00">2:00 PM</option>
                                <option value="16:00:00">4:00 PM</option>
                            </select>

                        </div><br><br>

                        <div class="col-md-4">
                            <input type="submit" name="app-submit" value="Add Appointment" class="btn btn-primary" id="inputbtn">
                        </div>
                        <div class="col-md-8"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>