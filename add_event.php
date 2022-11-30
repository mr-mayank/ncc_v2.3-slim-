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

$eventDetails = "SELECT * FROM `event_handle`";
$eventDetailsQuery =  mysqli_query($conn, $eventDetails);



?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <style>
        table {
            border-collapse: collapse;
            table-layout: fixed;
        }

        th {
            text-align: center !important;

        }

        td {
            text-align: center;
            word-wrap: break-word !important;
            width: 200px !important;
        }
    </style>
</head>

<body>


    <!-- navigation bar  -->
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
                            <a class="nav-link text-light" href="admin_home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="cadets.php">Cadets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="add_event.php">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="attendance.php">Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </section>
    
            <?php
            if(isset($_POST['editEvent'])){
                $evId = $_POST['evId'];

                $sql = "SELECT * FROM `event_handle` WHERE `id` = '$evId'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_assoc($result);
                $evName = $row['evName'];
                $evDetails = $row['evDetails'];
                $startDate = $row['startDate'];
                $endDate = $row['endDate'];
                echo "<div class='container events'>
                <section class='mt-4'>
                    <center>
                        <h4 class='heading'>Edit Event</h4>
                    </center>
                <form action='EditEvent.php' method='POST'>
                <div class='data p-2 mt-4' style='border: 1px solid black;'>
                <div class='form-group mt-3'>
                <div class='row' style='justify-content:center'>
                <div class='col-sm-3'>
                    <label for=' class='col-form-label'>Event Name:</label>
                </div>

                <div class='col-sm-6'>
                    <input type='text' name='eventName' value='$evName' class='form-control' id='eventName'>
                </div>
            </div>
        </div>
        <div class='form-group mt-3'>
            <div class='row' style='justify-content:center'>
                <div class='col-sm-3'>
                    <label for=' class='col-form-label'>Event Details:</label>
                </div>
                <div class='col-sm-6'>
                    <textarea name='eventDetails' class='form-control' id='eventDetails' rows='3'>$evDetails</textarea>
                </div>
            </div>
        </div>
        <div class='form-group mt-3'>
            <div class='row' style='justify-content:center'>
                <div class='col-sm-3'>
                    <label for=' class='col-form-label'>Start Date:</label>
                </div>
                <div class='col-sm-6'>
                    <input type='date' name='startDate' value='$startDate' class='form-control' id='startDate'>
                </div>
            </div>
        </div>
        <div class='form-group mt-3'>
            <div class='row' style='justify-content:center'>
                <div class='col-sm-3'>
                    <label for=' class='col-form-label'>End Date:</label>
                </div>
                <div class='col-sm-6'>
                    <input type='date' name='endDate' value='$endDate' class='form-control' id='endDate'>
                </div>
            </div>
        </div>
                <input type='hidden' name='evId' value='$evId'>
                <center>
                <button type='submit' class='btn btn-lg mt-3 text-light' style='background-color: #35b729;' name='EditEvent'>Edit Event</button>
                </center>
            </form>";
            }else{
                echo "

                <div class='container events'>
                <section class='mt-4'>
                    <center>
                        <h4 class='heading'>Add New Event</h4>
                    </center>
                <form action='AddEvent.php' method='post'>
                <div class='data p-2 mt-4' style='border: 1px solid black;'>

                <div class='form-group mt-3'>
                <div class='row' style='justify-content:center'>
                    <div class='col-sm-3'>
                        <label for=' class='col-form-label'>Event Type</label>
                    </div>

                    <div class='col-sm-6'>
                        <input type='radio' name='eventType' value='0'> Normal Event
                        <input type='radio' name='eventType' style='margin-left: 0.5rem;'  value='1'> Camp Event
                    </div>
                </div>
            </div>
                    <div class='form-group mt-3'>
                        <div class='row' style='justify-content:center'>
                            <div class='col-sm-3'>
                                <label for=' class='col-form-label'>Event Name:</label>
                            </div>

                            <div class='col-sm-6'>
                                <input type='text' name='eventName' class='form-control' id='eventName'>
                            </div>
                        </div>
                    </div>

                    <div class='form-group mt-3'>
                        <div class='row' style='justify-content:center'>
                            <div class='col-sm-3'>
                                <label for=' class='col-form-label'>Event Details:</label>
                            </div>
                            <div class='col-sm-6'>
                                <textarea class='form-control' id='eventDetails' rows='3' name='eventDetails'></textarea>
                            </div>
                        </div>
                    </div>
                    <div class='form-group mt-3'>
                    <div class='row' style='justify-content:center'>
                        <div class='col-sm-3'>
                            <label for=' class='col-form-label'>Event Place</label>
                        </div>

                        <div class='col-sm-6'>
                            <input type='text' name='eventPlace' class='form-control' id='eventName'>
                        </div>
                    </div>
                </div>

                    <div class='form-group mt-3'>
                        <div class='row' style='justify-content:center'>
                            <div class='col-sm-3'>
                                <label for=' class='col-form-label'>Starting Date:</label>
                            </div>
                            <div class='col-sm-6'>
                                <input id='startDate' class='form-control' type='date' name='startDate'>
                            </div>
                        </div>
                    </div>

                    <div class='form-group mt-3'>
                        <div class='row' style='justify-content:center'>
                            <div class='col-sm-3'>
                                <label for=' class='col-form-label'>Ending Date:</label>
                            </div>
                            <div class='col-sm-6'>
                                <input id='endDate' class='form-control' type='date' name='endDate'>
                            </div>
                        </div>
                    </div>
                    <center>
                        <button type='submit' class='btn btn-lg mt-3 text-light' style='background-color: #35b729;' name='addEvent'>Add Event</button>
                    </center>
                </div>
            </form> ";
            }
            ?>
            
        </section>

        <section>
            <center class="mt-5">
                <h4 class="heading">Current Events</h4>
            </center>
            <div id="table-wrapper">
                <div class="main mt-3" id="table-scroll">
                    <table class="table" id="myTable" class="myTable">
                        <thead style="background-color: #003975; color:white;">
                            <tr>
                                <th scope="col">Event Name</th>
                                <th scope="col">Event Details</th>
                                <th scope="col">Starting Date</th>
                                <th scope="col">Ending Date</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                         
                                <?php
                                    while($eventDetailsQueryDetails = mysqli_fetch_array($eventDetailsQuery)){
                                        $eventName = $eventDetailsQueryDetails['evName'];
                                        $eventDetails = $eventDetailsQueryDetails['evDetails'];
                                        $tdate = date("Y-m-d");
                                        $startDate = $eventDetailsQueryDetails['startDate'];
                                        $sdate = date_create($startDate);
                                        $endDate = $eventDetailsQueryDetails['endDate'];
                                        $edate = date_create($endDate);
                                        $eventID = $eventDetailsQueryDetails['id'];
                                        if($tdate < $startDate){
                                        echo "<tr id='$eventID'>";
                                        echo "<td>$eventName</td>";
                                        echo "<td>$eventDetails</td>";
                                        echo "<td>".date_format($sdate, "d-m-Y")."</td>";
                                        echo "<td>".date_format($edate, "d-m-Y")."</td>";
                                        echo"<td> <form method='post'> <input type='hidden' name='evId' value='$eventID'> <button type='submit' id='editEvent' class='btn btn-sm text-light' name='editEvent' style='background-color: #35b729;'>Edit</button> </form> </td>";
                                        echo "</tr>";
                                    }
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
    <section>
        <footer style="background-color: #003975;color:white;padding:2rem">
            <center>
                <p>Content Owned by NCC</p>
                <p>Developed and hosted by National Informatics Centre,</p>
                <p>Ministry of Electronics & Information Technology, Government of India
                </p>
                <p> Last Updated: Nov 19, 2022</p>
                <hr>
                <div style="background-color: #003975;">
                    Copyright &#169; 2022 All Rights Reserved
                </div>
            </center>
        </footer>
    </section>
    <!-- <script>
        function fun(eventID){
            alert(eventID);
        }
         function editEv (event) {
                console.log(event);
                var eventID = event;
                var Name = document.getElementById(eventID).cells[0].innerHTML;
                var Details = document.getElementById(eventID).cells[1].innerHTML;
                var StartDate = document.getElementById(eventID).cells[2].innerHTML;
                var EndDate = document.getElementById(eventID).cells[3].innerHTML;
                var sdate = Date(StartDate);
                // var edate = Date(EndDate);
            
                document.getElementById("eventName").value = Name;
                document.getElementById("eventDetails").value = Details;
                document.getElementById("startDate").value = StartDate;
                document.getElementById("endDate").value =  EndDate;
            
        };
    </script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>