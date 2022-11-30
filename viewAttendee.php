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
if(isset($_POST['attandee'])){
    $id = $_POST['evId'];
    $eventDetails = "SELECT * FROM `event_handle` WHERE `id` = '$id'";
    $eventDetailsQuery =  mysqli_query($conn, $eventDetails);
    $eventDetailsResult = mysqli_fetch_assoc($eventDetailsQuery);
    $event_name = $eventDetailsResult['evName'];
    $sdate = $eventDetailsResult['startDate'];
    $edate = $eventDetailsResult['endDate'];
    $eventPlace = $eventDetailsResult['place'];
    $eventPhoto = $eventDetailsResult['campPhoto'];
    $participant = $eventDetailsResult['participant'];
    $showCol = true;
}else{
    header("Location: ./attendance.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attandance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-3" id="nccAttandanceForm">
        <center>
            <h2>
                Event
            </h2>
            <h3><?php echo $event_name; ?></h3>
            <p>Starting Date: <?php echo $sdate; ?></p>
            <p>Ending Date: <?php echo $edate; ?></p>
            
            <?php
            $tdate = date("Y-m-d");
            $date1 = strtotime($edate);
            if($tdate > strtotime($edate)){
                if($eventPhoto != "" || $eventPhoto != NULL){
                    $showCol = false;
                    echo "<div><img src='$eventPhoto' width='600px' height='250px' alt=''><p>Event Name: $event_name</p><p>Event Place: $eventPlace </p></div>";
                }
            }
             ?>
            <h2 class="mt-3 mb-3">Attandance</h2>
            <table class="table table-bordered" style="text-align: center; border: 3px solid black;">

                <tr>
                    <th>Sr. No.</th>
                    <th>Name</th>
                    <th>Reg. No.</th>
                    <th>Mobile No.</th>
                    <?php 
                    if($showCol){
                        echo "<th>Present</th>";
                    }
                     ?>
                </tr>

                <?php 
                $i = 1;
                if($participant != "" || $participant != NULL){
                    $participantArray = explode(",", $participant);
                    foreach($participantArray as $participant){
                        $participantDetails = "SELECT * FROM `personaldetails` WHERE `userID` = '$participant'";
                        $participantDetailsQuery = mysqli_query($conn, $participantDetails);
                        $participantDetailsResult = mysqli_fetch_assoc($participantDetailsQuery);
                        $fname = $participantDetailsResult['fname'];
                        $lname = $participantDetailsResult['lname'];
                        $mobileNo = $participantDetailsResult['contactNo'];
                        $reg = "SELECT * FROM `student_credentials` WHERE `id` = '$participant'";
                        $regQuery = mysqli_query($conn, $reg);
                        $regResult = mysqli_fetch_assoc($regQuery);
                        $regNo = $regResult['regNo'];
                        echo "<tr>
                        <td>$i</td>
                        <td>$fname . $lname</td>
                        <td>$regNo</td>
                        <td>$mobileNo</td>";
                        if($showCol){
                            echo "<td>&nbsp;</td>";
                        }
                        echo "</tr>";
                        $i++;

                    }
                }else{
                    echo "<tr><td colspan='5'>No Participant</td></tr>";

                }
                 ?>
            </table>

        </center>
    </div>

    <center>
        <input type="button" value="Print Attandance Form" onclick="makepdf('nccAttandanceForm')">
    </center>

    <br>
    <br>
    <center> 
    <a class="btn text-center mt-3 text-light" style="background-color: #35b729;" href="attendance.php">Back to Dashboard</a>
</center>
<br>
<br>
    <script>
        function makepdf(nccForm) {
            var regForm = document.getElementById(nccForm).innerHTML;
            var orginalForm = document.body.innerHTML;
            document.body.innerHTML = regForm;
            window.print();
            document.body.innerHTML = orginalForm;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>