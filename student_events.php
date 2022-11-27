<?php
include ('database/include.php');
if(!isset($_SESSION['userType'])){
    header("Location: ./signin.php");
}else{
    if($_SESSION['userType'] != 'student'){
        session_unset();
        session_destroy();
        header("Location: ./signin.php");
    }
}

if(isset($_POST['yes'])){
    $event_id = $_POST['eventId'];
    $student_id = $_SESSION['userId'];
    $searchEvent = "SELECT * FROM `event_handle` WHERE `id` = ?";
    $findEvent = $conn->prepare($searchEvent);
    $findEvent->bind_param("i", $event_id);
    $findEvent->execute();
    $res = $findEvent->get_result();
    $eventDetails = mysqli_fetch_assoc($res);
    $participant = $eventDetails['participant'];
    if($participant == NULL || $participant == ''){
        $participant = $student_id;
    }else{
        $participant = $participant .','. $student_id;
    }
    $updateEvent = "UPDATE `event_handle` SET `participant` = ? WHERE `id` = ?";
    $updateEvent = $conn->prepare($updateEvent);
    $updateEvent->bind_param("si", $participant, $event_id);
    if($updateEvent->execute()){
        echo "<script>alert('Successfully Registered !!')</script>";
        echo "<script>window.open('./student_events.php','_self')</script>";
    }else{
        echo "<script>alert('Something went wrong !!')</script>";
        echo "<script>window.open('./student_events.php','_self')</script>";
    }
}

if(isset($_POST['no'])){
    $event_id = $_POST['eventId'];
    $student_id = $_SESSION['userId'];
    $searchEvent = "SELECT * FROM `event_handle` WHERE `id` = ?";
    $findEvent = $conn->prepare($searchEvent);
    $findEvent->bind_param("i", $event_id);
    $findEvent->execute();
    $res = $findEvent->get_result();
    $eventDetails = mysqli_fetch_assoc($res);
    $participant = $eventDetails['notInterested'];
    if($participant == NULL || $participant == ''){
        $participant = $student_id;
    }else{
        $participant = $participant .','. $student_id;
    }
    $updateEvent = "UPDATE `event_handle` SET `notInterested` = ? WHERE `id` = ?";
    $updateEvent = $conn->prepare($updateEvent);
    $updateEvent->bind_param("si", $participant, $event_id);
    if($updateEvent->execute()){
        echo "<script>alert('Your response has been submited !!')</script>";
        echo "<script>window.open('./student_events.php','_self')</script>";
    }else{
        echo "<script>alert('Something went wrong !!')</script>";
        echo "<script>window.open('./student_events.php','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <style>
        th {
            text-align: center !important;
        }

        body {
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>

<body>
    <section>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="images/logo.png" width="70" height="70" alt=""></a>
                <button justify-content-end class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="justify-content-end collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-light" href="student_dashboard.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="EnrollForm.php">Enroll Form</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="student_events.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <section>
        <center>
            <h4 class="heading mt-4">New Events</h4>
        </center>
        <div class="row mt-3" style="width: 100%;text-align:center;margin: 0 auto;">

            
                <?php
                $sql = "SELECT * FROM `event_handle`" ;
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)){
                    $tdate = date("Y-m-d");
                    $edate = $row['startDate'];
                    $participate = false;
                    $arrayParticipate = explode(",",$row['participant']);
                    $arrayNotInterested = explode(",",$row['notInterested']);
                    foreach($arrayNotInterested as $value){
                        if($value == $_SESSION['userId']){
                            $participate = true;
                        }
                    }
                    foreach($arrayParticipate as $value){
                        if($value == $_SESSION['userId']){
                            $participate = true;
                        }
                    }

                    if($tdate <= $edate && $participate == false){
                        echo '
                        <div class="col-md-4">
                <div class="card" style="margin: 0 auto; padding: 1rem;">
                            <div class="row">
                        <label for="" class="col-md-4 col-form-label">Event name:</label>
                        <div class="col-md-8">
                        <p>
                        '.$row['evName'].'
                        </p>
                        </div>
                    </div>

                    <div class="row">
                        <label for="" class="col-md-4 col-form-label">Event Details:</label>
                        <div class="col-md-8">
                        <p style="text-align: justify; "> 
                        '.$row['evDetails'].'
                        </p>
                           
                        </div>
                    </div>

                    <div class=" row">
                        <label for="" class="col-md-4 col-form-label">Starting Date:</label>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control-plaintext" id="startDate" name="startDate" value="'.$row['startDate'].'">
                        </div>
                    </div>

                    <div class="row">
                        <label for="" class="col-md-4 col-form-label">Ending Date:</label>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control-plaintext" id="endDate" name="endDate" value="'.$row['endDate'].'">
                        </div>
                    </div>

                    <div class="btn_group" style="display: flex;margin:0 auto;">
                    ';
                    ?>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="m-3">
                            <input type="hidden" id="yes" name="eventId" value="<?php echo $row['id'] ?>">
                            <input type="Submit" value="Yes" name="yes" class="btn btn-lg text-light m-2" style="background-color: #35b729;">
                        </form>
                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="m-3">
                            <input type="hidden" id="no" name="eventId" value="<?php echo $row['id'] ?>">
                            <input type="Submit" value="no" name="no" class="btn btn-lg text-light m-2" style="background-color: #35b729;">
                        </form>
                        <?php
                        echo '
                    </div>
                    </div>
                    </div>
                            
                    ';
                    }
                }
                ?>
            </div>
    </section>

    <section class="mt-4">
        <center>
            <h4 class="heading">Attended Events</h4>
        </center>
    </section>

    <div id="table-wrapper" class="p-5 mt-3">
        <div class="main" id="table-scroll">
            <table class="table text-center" id="myTable" class="myTable">
                <thead style="background-color: #003975; color:white;">
                    <tr>
                        <th scope="col">Sr. No</th>
                        <th scope="col">Event name</th>
                        <th scope="col">Starting Date</th>
                        <th scope="col">Ending Date</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `event_handle`" ;
                    $result = mysqli_query($conn, $sql);
                    $i = 1;
                    while($row = mysqli_fetch_assoc($result)){
                        $tdate = date("Y-m-d");
                        $edate = $row['endDate'];
                        $participate = false;
                        $arrayParticipate = explode(",",$row['participant']);
                        foreach($arrayParticipate as $value){
                            if($value == $_SESSION['userId']){
                                $participate = true;
                            }
                        }
                        if($tdate >= $edate && $participate == true){
                            echo '
                            <tr>
                                <th scope="row">'.$i.'</th>
                                <td>'.$row['evName'].'</td>
                                <td>'.$row['startDate'].'</td>
                                <td>'.$row['endDate'].'</td>
                            </tr>
                            ';
                        }
                        $i++;
                    }
                    ?>
                </tbody>
        </div>
    </div>
   
            
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

</body>

</html>