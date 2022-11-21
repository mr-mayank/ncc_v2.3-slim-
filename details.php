<?php
session_start();
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
    <title>details</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <style>
        body {
            font-family: 'Raleway', sans-serif;

        }

        table {
            margin-top: 1rem;
            border-collapse: collapse;
            width: 100%;
            overflow-x: auto;
            margin: 0 auto;
            border: 1px solid black;
        }

        th {
            vertical-align: middle;
            background-color: #003975;
            color: white;
            width: 60%;
        }

        td {
            width: 40%;
        }

        th,
        td {
            text-align: center;
            padding: 8px;
            border: 1px solid black;
        }

        tr:nth-child(even) {
            background-color: #dddddd !important;
        }

        td:hover {
            background-color: #b6d5f5;
        }

        h5 {
            margin-top: 2rem;
            font-weight: 500;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="container mt-4">
            <center>
                <img src="images/img.jpg" alt="image" style="height: 12rem; width: 12rem;">
                <h4>Raman</h4>
                <h5>1. PERSONAL DETAILS</h5>
            </center>
            <table style="width:60%">
                <tr>
                    <th>Date Of Birth</th>
                    <td>19-11-2022</td>
                </tr>
                <tr>
                    <th>Nationality</th>
                    <td>Indian</td>
                </tr>
                <tr>
                    <th>Father's/Guardian's Name</th>
                    <td>Rameshkumar</td>
                </tr>
                <tr>
                    <th>Mother's Name</th>
                    <td>Ramilaben</td>
                </tr>
                <tr>
                    <th>Residential Address</th>
                    <td>Motera</td>
                </tr>
                <tr>
                    <th>Mobile No.</th>
                    <td>9090909090</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td>abc@gmail.com</td>
                </tr>
                <tr>
                    <th>Sex</th>
                    <td>Male</td>
                </tr>
                <tr>
                    <th>Blood Group</th>
                    <td>O+</td>
                </tr>
                <tr>
                    <th>Nearest Railway Station</th>
                    <td>-</td>
                </tr>
                <tr>
                    <th>Nearest Police Station</th>
                    <td>-</td>
                </tr>
                <tr>
                    <th>Sign Photo</th>
                    <td><a href="#"></a></td>
                </tr>
                <tr>
                    <th>Passbook Photo</th>
                    <td><a href="#"></a></td>
                </tr>
            </table>
        </div>

        <div class="container">
            <center>
                <h5>2. ACADEMIC DETAILS</h5>
            </center>
            <table style="width:60%">
                <tr>
                    <th>Educational Qualifications</th>
                    <td>12th</td>
                </tr>
                <tr>
                    <th>Marks</th>
                    <td>90%</td>
                </tr>
                <tr>
                    <th>Identification Marks</th>
                    <td>-</td>
                </tr>
                <tr>
                    <th>Have you ever been convicted by a criminal court?</th>
                    <td>No</td>
                </tr>
                <tr>
                    <th>Select School/college</th>
                    <td>College</td>
                </tr>
                <tr>
                    <th>Stream</th>
                    <td>Science</td>
                </tr>
                <tr>
                    <th>Name of School/College</th>
                    <td>VGEC</td>
                </tr>

            </table>
        </div>
        <div class="container">
            <center>
                <h5>3. NCC INTERESET</h5>
            </center>
            <table style="width:60%">
                <tr>
                    <th>Have you been enrolled in NCC earlier.</th>
                    <td>No</td>
                </tr>
                <tr>
                    <th>Have you been dismissed from NCC</th>
                    <td>No</td>
                </tr>
                <tr>
                    <th>Next of kin with address</th>
                    <td>-</td>
                </tr>
                <tr>
                    <th>Relationship</th>
                    <td>-</td>
                </tr>
                <tr>
                    <th>Telephone No:</th>
                    <td>9090909090</td>
                </tr>

            </table>
        </div>
        <div class="container">
            <center>
                <h5>4. BANKING DETAILS</h5>
            </center>
            <table style="width:60%">
                <tr>
                    <th>Banker's detail/ IFSC Code </th>
                    <td>*******1111</td>
                </tr>
                <tr>
                    <th>Bank Acct No. of Cadet/Parent</th>
                    <td>****1111</td>
                </tr>
                <tr>
                    <th>Aadhaar/UID No.</th>
                    <td>******1111</td>
                </tr>
                <tr>
                    <th>PAN Card No.</th>
                    <td>******1111</td>
                </tr>

            </table>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>