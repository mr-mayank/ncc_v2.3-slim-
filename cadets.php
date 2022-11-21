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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cadets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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
            border-bottom: 2px solid #f2f2f2;

        }

        td:hover {
            background-color: #b6d5f5;
        }

        #table-wrapper {
            position: relative;
        }

        #table-scroll {
            height: 590px;
            overflow: auto;
            margin-top: 20px;
        }

        #table-wrapper table {
            width: 100%;
            padding-top: 1rem;
        }
    </style>
</head>

<body>
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
                            <a class="nav-link text-light" href="attendance.php">Attendance</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </section>
    <div id="table-wrapper" class="container">
        <div class="main mt-5" id="table-scroll">
            <table id="myTable" class="myTable">
                <thead style="background-color: #003975; color:white">
                    <tr>
                        <th scope="col" class="text-center">Sr No.</th>
                        <th scope="col" class="text-center">Register Number</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Mobile</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `student_credentials` where `anoID` = '$_SESSION[anoID]'";
                    $result = mysqli_query($conn, $sql);
                    $srno = 0;

                    while ($row = mysqli_fetch_assoc($result)) {
                        $srno = $srno + 1;
                        $sql1 = "SELECT * FROM `personaldetails` where `userID` = '$row[id] '";
                        $result1 = mysqli_query($conn, $sql1);
                        if($row['regNo']== NULL){
                            $regNo = "Not Assigned";
                        }
                        else{
                            $regNo = $row['regNo'];
                        }
                        if(mysqli_num_rows($result1) > 0){
                            $row1 = mysqli_fetch_assoc($result1);

                            echo "<tr>
                            <th scope='row'>" . $srno . "</th>
                            <td>" . $regNo . "</td>
                            <td>" . $row1['fname'] ." ". $row1['lname'] ."</td>
                            <td>" . $row1['contactNo'] . "</td>
                            <td>" . $row1['email'] . "</td>
                            <td><form action='details.php' method='post'> <input type='hidden' name='id' value='" . $row['id'] . "'> <button name='showDetails' type='submit' class='btn text-center mt-3 text-light' style='background-color: #35b729;'>View</button> </form></td>
                        </tr>";
                        }
                      else{
                        echo "<tr>
                        <th scope='row'>" . $srno . "</th>
                        <td>" . $regNo . "</td>
                        <td>Not Updated</td>
                        <td>Not Updated</td>
                        <td>".$row['email']."</td>
                        <td><form action='details.php' method='post'> <input type='hidden' name='id' value='" . $row['id'] . "'> <button name='showDetails' type='submit' class='btn text-center mt-3 text-light' style='background-color: #35b729;' disabled >View</button> </form></td>
                    </tr>";

                      }
                    }

                    ?>
                </tbody>
            </table>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

</body>

</html>