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


?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendance</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <style>
        th,
        td {
            text-align: center !important;
        }

        body {
            font-family: 'Raleway', sans-serif;
        }
    </style>
</head>

<body>

    <!-- navigation bar  -->
    <section>
        <nav class="navbar navbar-expand-lg ">
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
    <br>
    <br>
    <center><h3>
        Current Events
    </h3></center>
    <div id="table-wrapper" class="p-5 mt-3">
        <div class="main mt-5" id="table-scroll">
            <table class="table" id="myTable" class="myTable">
                <thead style="background-color: #003975; color:white">
                    <tr>
                        <th scope="col">Sr. No</th>
                        <th scope="col">Event</th>
                        <th scope="col">Report Generation</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                    $eventDetails = "SELECT * FROM `event_handle`";
                    $eventDetailsQuery =  mysqli_query($conn, $eventDetails);
                    $i = 1;
                    while($row = mysqli_fetch_array($eventDetailsQuery)){
                        $tdate = date('Y-m-d');
                        $date = $row['endDate'];
                        if($date > $tdate){
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row['evName']."</td>";
                            echo "<td>"; ?>  <form action="viewAttendee.php" method="post"><input type="hidden" name="evId" value="<?php echo $row['id']; ?>" > <button style="padding: 0.5rem 0.7rem; background-color: #35b729;" type="submit" class="btn btn-sm text-light" name="attandee" >Report</button></form> <?php echo "</td>";
                            echo "</tr>";
                            $i++;
                        }
                    }  
            ?>                 
                </tbody>
            </table>
        </div>

    </div>
    <br>
    <br>

    <center><h3>
        Previous Events
    </h3></center>
    <div id="table-wrapper" class="p-5 mt-3">
        <div class="main mt-5" id="table-scroll">
            <table class="table" id="myTable2" class="myTable">
                <thead style="background-color: #003975; color:white">
                    <tr>
                        <th scope="col">Sr. No</th>
                        <th scope="col">Event</th>
                        <th scope="col">Camp Photo</th>
                        <th scope="col">Add Photo</th>

                    </tr>
                </thead>
                <tbody>
                <?php
                    $eventDetails = "SELECT * FROM `event_handle`";
                    $eventDetailsQuery =  mysqli_query($conn, $eventDetails);
                    $i = 1;
                    while($row = mysqli_fetch_array($eventDetailsQuery)){
                        $tdate = date('Y-m-d');
                        $date = $row['endDate'];
                        if($date < $tdate && ($row['campPhoto'] == NULL || $row['campPhoto'] == '')) {
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row['evName']."</td>";

                            ?>
                            <form enctype="multipart/form-data" method="POST" action="addCampPhoto.php">
                                <td>
                                    <input type="hidden" name="evId" value="<?php echo $row['id']; ?>" >
                                    <input type="file" name="campPhoto" id="campPhoto" required>
                                </td>
                                <td>
                                    <button style="padding: 0.5rem 0.7rem; background-color: #35b729;" type="submit" class="btn btn-sm text-light" name="addCampPhoto" >Add</button>
                                </td>

                            </form>
                             <?php
                            
                            echo "</tr>";
                            $i++;
                        }
                    }  
            ?>                 
                </tbody>
            </table>
        </div>

    </div>
    <div id="table-wrapper" class="p-5 mt-3">

        <div class="main mt-5" id="table-scroll1">
            <table class="table" id="myTable1" class="myTable">
                <thead style="background-color: #003975; color:white">
                    <tr>
                        <th scope="col">Sr. No</th>
                        <th scope="col">Event</th>
                        <th scope="col">Event Details</th>
                        <!-- <th scope="col">Attendance sheet</th> -->

                    </tr>
                </thead>
                <tbody>
                <?php
                 $eventDetails = "SELECT * FROM `event_handle`";
                 $eventDetailsQuery =  mysqli_query($conn, $eventDetails);
                    $i = 1;
                    while($row = mysqli_fetch_array($eventDetailsQuery)){
                        $tdate = date('Y-m-d');
                        $date = $row['endDate'];
                        if($date < $tdate){
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td>".$row['evName']."</td>";
                            echo "<td> " .$row['evDetails']. "</td>";
                            echo "</tr>";
                            $i++;
                        }
                
                    }  
            ?>                 
                </tbody>
            </table>
        </div>

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
    
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
        $(document).ready(function() {
            $('#myTable1').DataTable();
        });
        $(document).ready(function() {
            $('#myTable2').DataTable();
        });
    </script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
   
</body>

</html>