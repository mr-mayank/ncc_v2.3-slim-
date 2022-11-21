<?php

include ('database/include.php');
if(!isset($_SESSION['userType'])){
    header("Location: ./signin.php");
}else{
    if($_SESSION['userType'] != 'admin'){
        session_unset();
        session_destroy();
        header("Location: ./signin.php");
    }
}
if(isset($_POST['showDetails'])){
    $uniqueID = $_POST['id'];
    // $uniqueID = $_SESSION['uniqueID'];
    $getApplication = "SELECT * FROM `personaldetails` WHERE `userID` = '$uniqueID'";
    $getApplicationResult = mysqli_query($conn, $getApplication);
    $getApplicationRow = mysqli_fetch_assoc($getApplicationResult);
    $fname = $getApplicationRow['fname'];
    $mname = $getApplicationRow['mname'];
    $lname = $getApplicationRow['lname'];
    $birthday = $getApplicationRow['birthDate'];
    $nationality = $getApplicationRow['nationality'];
    $f_fname = $getApplicationRow['fatherFname'];
    $f_mname = $getApplicationRow['fatherMname'];
    $f_lname = $getApplicationRow['fatherLname'];
    $m_fname = $getApplicationRow['motherFname'];
    $m_mname = $getApplicationRow['motherMname'];
    $m_lname = $getApplicationRow['motherLname'];
    $address = $getApplicationRow['address'];
    $contact = $getApplicationRow['contactNo'];
    $email = $getApplicationRow['email'];
    $gender = $getApplicationRow['gender'];
    $blood = $getApplicationRow['blood'];
    $rstation = $getApplicationRow['nrRailway'];
    $pstation = $getApplicationRow['nrPolice'];

    $getDocument = "SELECT * FROM `studentdocument` WHERE `userID` = '$uniqueID'";
    $getDocumentResult = mysqli_query($conn, $getDocument);
    $getDocumentRow = mysqli_fetch_assoc($getDocumentResult);
    $studentP = $getDocumentRow['userPhoto'];
    $studentS = $getDocumentRow['signPhoto'];
    $studentPa = $getDocumentRow['passPhoto'];
    
    $getAcedemic = "SELECT * FROM `aceddemicdetails` WHERE `userID` = '$uniqueID'";
    $getAcedemicResult = mysqli_query($conn, $getAcedemic);
    $getAcedemicRow = mysqli_fetch_assoc($getAcedemicResult);
    $qualify = $getAcedemicRow['qualify'];
    $marks = $getAcedemicRow['marks'];
    $idMarks = $getAcedemicRow['idMarks'];
    $isCrime = $getAcedemicRow['isCrime'];
    $circumCrime = $getAcedemicRow['circumCrime'];
    $schoolType = $getAcedemicRow['schoolType'];
    $stream = $getAcedemicRow['stream'];
    $schoolName = $getAcedemicRow['schoolName'];

    $getBank = "SELECT * FROM `bankdetails` WHERE `userID` = '$uniqueID'";
    $getBankResult = mysqli_query($conn, $getBank);
    $getBankRow = mysqli_fetch_assoc($getBankResult);
 
    $ifsc = $getBankRow['ifscCode'];
    $accNo = $getBankRow['accountNo'];
    $adharNo = $getBankRow['adharNo'];
    $panNo = $getBankRow['panNo'];

    $getNcc =  "SELECT * FROM `nccinterest` WHERE `userID` = '$uniqueID'";
    $getNccResult = mysqli_query($conn, $getNcc);
    $getNccRow = mysqli_fetch_assoc($getNccResult);
    $nccWill = $getNccRow['nccWill'];
    $nccUnit= $getNccRow['nccUnit'];
    $enrollNcc = $getNccRow['enrollNcc'];
    $enrollment = $getNccRow['enrollment'];
    $dissmissed = $getNccRow['dissmissed'];
    $dissmissedDetails = $getNccRow['dissmissedDetails'];
    $nameKin = $getNccRow['nameKin'];
    $telephoneKin = $getNccRow['telephoneKin'];
    $relationKin = $getNccRow['relationKin'];

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
                <img src="<?php echo $studentP ?>" alt="image" style="height: 12rem; width: 12rem;">
                <h4>
                    <?php echo $fname . " " . $mname . " " . $lname ?>
                </h4>
                <h5>1. PERSONAL DETAILS</h5>
            </center>
            <table style="width:60%">
                <tr>
                    <th>Date Of Birth</th>
                    <td><?php
                        $date = date_create($birthday);
                        echo date_format($date, "d-m-Y");
                        ?></td>
                    
                </tr>
                <tr>
                    <th>Nationality</th>
                    <td>Indian</td>
                </tr>
                <tr>
                    <th>Father's/Guardian's Name</th>
                    <td>
                        <?php 
                        echo $f_fname." ".$f_mname." ".$f_lname;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Mother's Name</th>
                    <td>
                        <?php
                        echo $m_fname." ".$m_mname." ".$m_lname;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Residential Address</th>
                    <td>
                        <?php
                        echo $address;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Mobile No.</th>
                    <td>
                        <?php
                        echo $contact;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td>
                        <?php
                        echo $email;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Sex</th>
                    <td>
                        <?php
                        echo $gender;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Blood Group</th>
                    <td>
                        <?php
                        echo $blood;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Nearest Railway Station</th>
                    <td>
                        <?php
                        echo $rstation;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Nearest Police Station</th>
                    <td>
                        <?php
                        echo $pstation;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Sign Photo</th>
                    <td><a href="<?php echo $studentS ?>" target="_blank"> Click Here</a></td>
                </tr>
                <tr>
                    <th>Passbook Photo</th>
                    <td><a href="<?php echo $studentPa ?>" target="_blank"> Click Here </a></td>
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
                    <td>
                        <?php
                        echo $qualify;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Marks</th>
                    <td>
                        <?php
                        echo $marks;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Identification Marks</th>
                    <td>
                        <?php
                        echo $idMarks;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Have you ever been convicted by a criminal court?</th>
                    <td>
                        <?php
                        echo $isCrime;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Select School/college</th>
                    <td>
                        <?php
                        echo $schoolType;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Stream</th>
                    <td>
                        <?php
                        echo $stream;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Name of School/College</th>
                    <td>
                        <?php
                        echo $schoolName;
                        ?>
                    </td>
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
                    <td>
                        <?php
                        echo $nccWill;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Have you been dismissed from NCC</th>
                    <td>
                        <?php
                        echo $dissmissed;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Next of kin with address</th>
                    <td>
                        <?php
                        echo $nameKin;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Relationship</th>
                    <td>
                        <?php
                        echo $relationKin;
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Telephone No:</th>
                    <td>
                        <?php
                        echo $telephoneKin;
                        ?>
                    </td>
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
                    <td>
                        ****
                        <?php
                        echo substr($ifsc, strlen($ifsc)-4); 
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Bank Acct No. of Cadet/Parent</th>
                    <td>*******
                        <?php
                        echo substr($accNo, strlen($accNo)-4); 
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Aadhaar/UID No.</th>
                    <td>
                        ********
                        <?php
                        echo substr($adharNo, strlen($adharNo)-4);
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>PAN Card No.</th>
                    <td>*******
                        <?php
                        echo substr($panNo, strlen($panNo)-4);
                        ?>
                    </td>
                </tr>

            </table>
        </div>

    </div>
    <br>
    <br>
    <center> 
    <a class="btn text-center mt-3 text-light" style="background-color: #35b729;" href="cadets.php">Back to Dashboard</a>
</center>
<br>
<br>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>