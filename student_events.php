<?php
session_start();
if(!isset($_SESSION['userType'])){
    header("Location: ./signin.php");
}else{
    if($_SESSION['userType'] != 'student'){
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

            <div class="col-md-4">
                <div class="card" style="margin: 0 auto;">
                    <div class="row">
                        <label for="" class="col-md-4 col-form-label">Event name:</label>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control-plaintext" id="eventName" name="eventName" value="xyz">
                        </div>
                    </div>

                    <div class="row">
                        <label for="" class="col-md-4 col-form-label">Event Details:</label>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control-plaintext" id="eventDetails" name="eventDetails" value="xyz">
                        </div>
                    </div>

                    <div class=" row">
                        <label for="" class="col-md-4 col-form-label">Starting Date:</label>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control-plaintext" id="startDate" name="startDate" value="1/12/2022">
                        </div>
                    </div>

                    <div class="row">
                        <label for="" class="col-md-4 col-form-label">Event Details:</label>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control-plaintext" id="endDate" name="endDate" value="12/12/2022">
                        </div>
                    </div>

                    <div class="btn_group" style="display: flex;margin:0 auto;">
                        <form action="" class="m-3">
                            <input type="hidden" id="yes" name="yes" value="yes">
                            <input type="Submit" value="Yes" class="btn btn-lg text-light m-2" style="background-color: #35b729;">
                        </form>
                        <form action="" class="m-3">
                            <input type="hidden" id="no" name="no" value="no">
                            <input type="Submit" value="no" class="btn btn-lg text-light m-2" style="background-color: #35b729;">
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-md-4">
                <div class="card" style="margin: 0 auto;">
                    <div class="row">
                        <label for="" class="col-md-4 col-form-label">Event name:</label>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control-plaintext" id="eventName" name="eventName" value="xyz">
                        </div>
                    </div>

                    <div class="row">
                        <label for="" class="col-md-4 col-form-label">Event Details:</label>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control-plaintext" id="eventDetails" name="eventDetails" value="xyz">
                        </div>
                    </div>

                    <div class=" row">
                        <label for="" class="col-md-4 col-form-label">Starting Date:</label>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control-plaintext" id="startDate" name="startDate" value="1/12/2022">
                        </div>
                    </div>

                    <div class="row">
                        <label for="" class="col-md-4 col-form-label">Event Details:</label>
                        <div class="col-md-8">
                            <input type="text" readonly class="form-control-plaintext" id="endDate" name="endDate" value="12/12/2022">
                        </div>
                    </div>

                    <div class="btn_group" style="display: flex;margin:0 auto;">
                        <form action="" class="m-3">
                            <input type="hidden" id="yes" name="yes" value="yes">
                            <input type="Submit" value="Yes" class="btn btn-lg text-light m-2" style="background-color: #35b729;">
                        </form>
                        <form action="" class="m-3">
                            <input type="hidden" id="no" name="no" value="no">
                            <input type="Submit" value="no" class="btn btn-lg text-light m-2" style="background-color: #35b729;">
                        </form>
                    </div>

                </div>
            </div>

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
                    <tr>
                        <td>1</td>
                        <td>xyz</td>
                        <td>
                            1/12/22
                        </td>
                        <td>
                            12/12/22
                        </td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td>xyz</td>
                        <td>
                            1/12/22
                        </td>
                        <td>
                            12/12/22
                        </td>
                    </tr>
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