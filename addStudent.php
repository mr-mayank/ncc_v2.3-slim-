<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include ('database/include.php');
if (isset($_POST['addStudent'])) {
   
    $email = $_POST['email'];
    $searchUser = "SELECT * FROM `student_credentials` WHERE `email` = '$email' AND `active_status` =  1";
    $queryForUser = mysqli_query($conn, $searchUser);
    $row = mysqli_fetch_array($queryForUser);
    // $queryForUser = $conn->prepare($searchUser);
    // $queryForUser->bind_param("s", $email);
    // $queryForUser->execute();
    // $userFound = $queryForUser->get_result();

    if (mysqli_num_rows($queryForUser) < 1) {
        
        $chars =  'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $number = '0123456789';
        $specialChar = '@#$!';

        $str = '';
        $maxChar = strlen($chars) - 1;
        $maxNumber = strlen($number) - 1;
        $maxSpecial = strlen($specialChar) - 1;


        for ($i = 0; $i < 8; $i++) {
            if ($i > 3) {
                $str .= $number[random_int(0, $maxNumber)];
            } else if ($i == 3) {
                $str .= $specialChar[random_int(0, $maxSpecial)];
            } else {
                $str .= $chars[random_int(0, $maxChar)];
            }
        }
        $password = $str;
        $status = 1;
        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com;';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'parekhpriyanka177@gmail.com';
            $mail->Password   = 'yxsxznmubavbafrb';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('parekhpriyanka177@gmail.com', 'Priyanka');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'Welcome New Cadet In NCC';
            $mail->Body    =  "Here is your login credentials please don't share with anyone and keep it save for last moment.\n\n Email : " . $email . "\n Password : " . $password . "\n\nYou can use this login credentials to login to the NCC portal.";

            $mail->send();
            echo "Mail has been sent successfully!";
            $password = md5($password);
            $anoId = $_POST['anoId'];
            $insertCadet = "INSERT INTO `student_credentials`(`email`, `password`, `anoID`, `active_status`) VALUES ('$email', '$password', '$anoId', '$status')";
            if (mysqli_query($conn, $insertCadet)) {
                echo "<script>alert('Check your mail for login credentials.')</script>";
                header("Location: ./signin.php");
            } else {
                echo "<script>alert('Error in adding details')</script>";
                header("Location: ./signup.php");
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "<script>alert(`User already exits 🛑\nCheck your mail for login credentials if forgotten and then login to portal.`)</script>";
        echo "<script>window.open('./signup.php','_self')</script>";
    }
}

