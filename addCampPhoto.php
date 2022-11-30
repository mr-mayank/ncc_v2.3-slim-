<?php
include('database/include.php');
if(!isset($_SESSION['userType'])){
    header("Location: ./signin.php");
}else{
    if($_SESSION['userType'] != 'admin'){
        session_unset();
        session_destroy();
        header("Location: ./signin.php");
    }
}

if(isset($_POST['addCampPhoto'])){
    $campId = $_POST['evId'];
    
    if(!empty($_FILES['campPhoto']['name'])) {
        $campphoto = $_FILES['campPhoto']['name'];
        $campphoto = time().$campphoto;
        $campP = "uploads/".basename($campphoto);
        move_uploaded_file($_FILES['campPhoto']['tmp_name'], $campP);
        $updatePhoto = "UPDATE `event_handle` SET `campPhoto`='$campP' WHERE `id`='$campId'";
        $updatePhotoResult = mysqli_query($conn, $updatePhoto);

        if($updatePhotoResult){
            echo "<script>alert('Camp Added Successfully !!')</script>";
            echo "<script>window.open('./attendance.php','_self')</script>";
        }else{
            echo "<script>alert('Something went wrong !!')</script>";
            echo "<script>window.open('./attendance.php','_self')</script>";
        }

    }else{
        echo "<script>alert('Please Select a Photo !!')</script>";
        echo "<script>window.open('./attendance.php','_self')</script>";
    }

}
?>