<?php
include('database/include.php');
if (isset($_POST['check_credentials'])) {
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $pwd = md5($pwd);

    $searchUser = "SELECT * FROM `student_credentials` WHERE `email` = ? AND `active_status` = 1";
    $findUser = $conn->prepare($searchUser);
    $findUser->bind_param("s", $email);
    $findUser->execute();
    $res = $findUser->get_result();
    $userDetails = mysqli_fetch_assoc($res);

    if ($res->num_rows) {

        $databasePWD = $userDetails['password'];
        if ($pwd === $databasePWD) {
            $_SESSION['userId'] = $userDetails['id'];
            echo "<script>alert('Successfully Login !!')</script>";
            echo "<script>window.open('./student_dashboard.php','_self')</script>";
        } else {
            echo "<script>alert('Password is not coorect !!')</script>";
            echo "<script>window.open('./signin.php','_self')</script>";
        }
    } else {
        echo "<script>alert('User Does not Exist !!')</script>";
        echo "<script>window.open('./signin.php','_self')</script>";
    }
}
