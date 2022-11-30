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

if(isset($_POST['addEvent'])){
    $eventName = $_POST['eventName'];
    $eventDetails = $_POST['eventDetails'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
    $place = $_POST['eventPlace'];
    $type = $_POST['eventType'];
    $anoId = $_SESSION['anoID'];

    $insertEvent = "INSERT INTO `event_handle`(`evName`, `evDetails`, `startDate`, `endDate`,`anoId`, `place`, `typeOfEvent`) VALUES (?,?,?,?,?,?,?)";
    $insertEventQuery = $conn->prepare($insertEvent);
    $insertEventQuery->bind_param("ssssisi", $eventName, $eventDetails, $startDate, $endDate, $anoId, $place, $type);
    $insertEventQuery->execute();
    if($insertEventQuery){
        echo "<script>alert('Event Added Successfully !!')</script>";
        echo "<script>window.open('./add_event.php','_self')</script>";
    }else{
        echo "<script>alert('Something went wrong !!')</script>";
        echo "<script>window.open('./add_event.php','_self')</script>";
    }


}
?>