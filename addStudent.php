<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
include ('database/include.php');
if (isset($_POST['addStudent'])) {
   
    $email = $_POST['email'];
    $searchUser = "SELECT * FROM `student_credentials` WHERE `email` = ? AND `active_status` =  1";
    $queryForUser = $conn->prepare($searchUser);
    $queryForUser->bind_param("s", $email);
    $queryForUser->execute();
    $userFound = $queryForUser->get_result();

    if ($userFound->num_rows < 1) {
        
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
            $response = 1;
        } catch (Exception $e) {
            $response = 0;
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
        if ($response) {
            $sql = $conn->prepare("INSERT INTO `student_credentials`(`email`, `password`, `active_status`) VALUES (?,?,?)");
            $password = md5($password);
            $sql->bind_param("ssi", $email, $password, $status);
            if ($sql->execute()) {
                echo "<script>alert('Check your mail for login credentials.')</script>";
                echo "<script>window.open('./signin.php','_self')</script>";
            } else {
                echo "<script>alert('Error in adding details')</script>";
                echo "<script>window.open('./signup.php','_self')</script>";
            }
        }
    } else {
        echo "<script>alert(`User already exits 🛑\nCheck your mail for login credentials if forgotten and then login to portal.`)</script>";
        echo "<script>window.open('./signup.php','_self')</script>";
    }
}

