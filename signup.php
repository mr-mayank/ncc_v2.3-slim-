<?php

include 'database/include.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body style=" background-image: url(./ncc.jpg);background-repeat: no-repeat;background-size: cover;background-attachment: fixed;background-position:center;">
    <div class="signup_page">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="sign_up_card">
                        <form action="addStudent.php" method="post">
                            <center>
                                <h3>Sign Up</h3>
                            </center><br>
                            <div class="email_div">
                                <!-- <label for="email">Email:</label> -->
                                <input size="30" type="email" id="email" name="email" placeholder="Enter your Email Address">
                            </div>
                            <p>Have Account? <a href="signin.php">Sign in</a></p>

                            <center> <button type="submit" class="btn mt-2" name="addStudent">Submit</button></center>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>