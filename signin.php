<?php

include 'database/include.php';

if (isset($_SESSION['userType'])) {
    $userType = $_SESSION['userType'];
    if ($userType == 'student') {
        header("Location: ./student_dashboard.php");
    } elseif ($userType == 'admin') {
        header("Location: ./admin_home.php");
    }
}

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signin</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body style=" background-image: url(./ncc.jpg);background-repeat: no-repeat;background-size: cover;background-attachment: fixed;background-position:center;">
    <div class="signin_page">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="sign_in_card">
                        <form action="check_credentials.php" method="post">
                            <center>
                                <h3>Sign In</h3>
                            </center><br>
                            <div class="mb-3 text-center text-white">
                                <input type="radio" name="user_type" value="student" id="student" checked>
                                <label for="student">Student</label>
                                <input type="radio" name="user_type" value="admin" id="admin">
                                <label for="admin">Admin</label>
                            </div>
                            <div class="email_div">
                                <input size="30" type="email" id="email" name="email" placeholder="Enter your Email Address">
                            </div>
                            <br>
                            <div class="pass_div">
                                <input size="30" type="password" id="pwd" name="password" placeholder="Enter your Password">
                            </div>
                            <a href="signin.php" style="float: right !important">Forgot Password?</a>
                            <br>
                            <center><button type="submit" name="check_credentials" class="btn">Submit</button></center>
                            <br>
                            <p>Need an Account? <a href="signup.php">Sign up</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>