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

if(isset($_POST['EditEvent'])){
    $eventName = $_POST['eventName'];
    $eventDetails = $_POST['eventDetails'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $id = $_POST['evId'];

    $insertEvent = "UPDATE `event_handle` SET `evName`=?,`evDetails`=?,`startDate`=?,`endDate`=? WHERE `id`=?";
    $insertEventQuery = $conn->prepare($insertEvent);
    $insertEventQuery->bind_param("ssssi", $eventName, $eventDetails, $startDate, $endDate, $id);
    $insertEventQuery->execute();
    if($insertEventQuery){
        echo "<script>alert('Event Updated Successfully !!')</script>";
        echo "<script>window.open('./add_event.php','_self')</script>";
    }else{
        echo "<script>alert('Something went wrong !!')</script>";
        echo "<script>window.open('./add_event.php','_self')</script>";
    }
}
?>