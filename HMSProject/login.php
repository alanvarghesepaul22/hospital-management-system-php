<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="./css/index.css">
</head>
<style>
    .formco {
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        align-items: center;
    }

    .container {
        width: fit-content;
        margin-top: 5rem;

    }

    .form-control {
        padding: 11px;
        width: 500px;
        box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
    }

    .btnRegister {
        margin-top: 5px;
        margin-left: 0;
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color: #15062E;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Hospital Management System</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link  js-scroll-trigger" style="margin-right: 40px;" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" style="margin-right: 40px;" href="contact.php">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" style="margin-right: 40px;" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active js-scroll-trigger" style="margin-right: 40px;" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
        <h3>Patient Login</h3>
        <form method="POST" action="./formPhp/patientLog.php">
            <div class="formco">
                <div class="form-group">
                    <label>Email-ID</label>
                    <input type="text" name="email" class="form-control" placeholder="Enter Email ID" required />
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password2" placeholder="Enter Password" required />
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <input type="submit" id="inputbtn" name="patsub" value="Login" class="btnRegister">
                    </div>
                </div>
            </div>

    </div>
    </form>
    </div>


    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>

</html>