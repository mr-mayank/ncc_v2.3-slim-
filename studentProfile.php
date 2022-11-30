<?php

include ('database/include.php');
if(!isset($_SESSION['userType'])){
    header("Location: ./signin.php");
}else{
    if(!isset($_SESSION['userType'])){
        session_unset();
        session_destroy();
        header("Location: ./signin.php");
    }
}
if(isset($_POST['showDetails']) || isset($_SESSION['updateID'])){
    if(!isset($_SESSION['updateID'])){
        $uniqueID = $_POST['id'];
        $_SESSION['updateID'] = $uniqueID;
    } else {
        $uniqueID = $_SESSION['updateID'];
    }
    // $uniqueID = $_SESSION['uniqueID'];
    $searchRank = "SELECT * FROM `student_credentials` WHERE `id` = $uniqueID";
    $resultRank = mysqli_query($conn, $searchRank);
    $rowRank = mysqli_fetch_assoc($resultRank);
    $rank = $rowRank['rank'];
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
        input{
            width: 100%;
            height: 100%;
            padding: 0.5rem;
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
                    <?php echo $fname . " " . $mname . " " . $lname; ?>
                </h4>
                <h5>1. PERSONAL DETAILS</h5>
            </center>
            <form action="updateProfile.php" enctype="multipart/form-data" method="POST">
            <table style="width:60%">
                <tr>
                    <th>Name </th>
                    <td>
                        <input type="text" name="fullSname" value="<?php echo $fname . " " . $mname . " " . $lname; ?>">
                    </td>
                </tr>
                <?php 
                    if($_SESSION['userType'] == 'admin'){
                ?>
                    <tr>
                    <th>Rank</th>
                    <td>
                        <select name="rank" id="rank" class="form-control" required>
                            <option value="" disabled>Select Rank</option>
                            <option <?php if($rank == "0"){echo "Selected";} ?> value="0">SUO</option>
                            <option <?php if($rank == "1"){echo "Selected";} ?> value="1">CUO</option>
                            <option <?php if($rank == "2"){echo "Selected";} ?> value="2">SGT</option>
                            <option <?php if($rank == "3"){echo "Selected";} ?> value="3">CPL</option>
                            <option <?php if($rank == "4"){echo "Selected";} ?> value="4">LPCL</option>
                            <option <?php if($rank == "5"){echo "Selected";} ?> value="5">Cadet</option>
                        </select>
                    </td>
                </tr>
                <?php
                    }
                ?>
                <tr>
                    <th>Date Of Birth</th>
                    <td>
                        <input name="birthday" type="date" value="<?php
                        echo $birthday;
                        ?>">
                    </td>
                    

                </tr>
                <tr>
                    <th>Nationality</th>
                    <td>Indian</td>
                </tr>
                <tr>
                    <th>Father's/Guardian's Name</th>
                    <td>
                        <input type="text" name="fullFname" value="<?php echo $f_fname." ".$f_mname." ".$f_lname; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Mother's Name</th>
                    <td>
                        <input type="text" name="fullMname" value="<?php echo $m_fname." ".$m_mname." ".$m_lname; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Residential Address</th>
                    <td>
                        <textarea name="res" id="" cols="30" rows="10" style="width: 100%;"><?php echo $address; ?></textarea>
                        
                    </td>
                </tr>
                <tr>
                    <th>Mobile No.</th>
                    <td>
                        <input name="contact" type="text" value="<?php echo $contact; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td>
                        <input type="email" name="email" value="<?php echo $email; ?>">
                        
                    </td>
                </tr>
                <tr>
                    <th>Sex</th>
                    <td class="d-flex w-100 border-0">
                    <center class="w-100">
                        <input type="radio" id= "sex"
                        <?php if ($gender == "Male") {
                            echo "checked";
                        }
                        ?> name="sex" value="Male" style="width: auto;margin-right: 1rem;">
                         Male
                        <input type="radio" id="sex" 
                        <?php if ($gender == "Female") {
                            echo "checked";
                        }
                        ?> name="sex" value="female" style="width: auto;margin-right: 1rem;margin-left: 1.5rem" >
                         Female 
                    </center>  
                    </td>
                </tr>
                <tr>
                    <th>Blood Group</th>
                    <td>
                    <select name="bgroup" class="form-control" required>
                                                <option value="" disabled>Select Blood Group</option>
                                                <option <?php if($blood == "A+"){echo "Selected";} ?> value="A+">A+</option>
                                                <option <?php if($blood == "A-"){echo "Selected";} ?>  value="A-">A-</option>
                                                <option <?php if($blood == "B+"){echo "Selected";} ?>  value="B+">B+</option>
                                                <option <?php if($blood == "B-"){echo "Selected";} ?>  value="B-">B-</option>
                                                <option <?php if($blood == "AB+"){echo "Selected";} ?>  value="AB+">AB+</option>
                                                <option <?php if($blood == "AB-"){echo "Selected";} ?>  value="AB-">AB-</option>
                                                <option <?php if($blood == "O+"){echo "Selected";} ?>  value="O+">O+</option>
                                                <option <?php if($blood == "O+"){echo "Selected";} ?>  value="O-">O-</option>
                                            </select>
                    </td>
                </tr>
                <tr>
                    <th>Nearest Railway Station</th>
                    <td>
                        <input type="text" name="rstation" value="<?php echo $rstation; ?>">
                        
                    </td>
                </tr>
                <tr>
                    <th>Nearest Police Station</th>
                    <td>
                        <input type="text" value="<?php echo $pstation; ?>">
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
                    <select name="qua" id="qua" class="form-control" required>
                                    <option disabled>Select
                                        Qualifications
                                    </option>
                                    <option <?php if($qualify == "10th"){echo "Selected";} ?> value="10">10th</option>
                                    <option <?php if($qualify == "12th"){echo "Selected";} ?> value="12">12th</option>
                                </select>
                    </td>
                </tr>
                <tr>
                    <th>Marks</th>
                    <td>
                        <input type="text" name="marks" value="<?php echo $marks; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Identification Marks</th>
                    <td>
                        <input type="text" name="identification" value="<?php echo $idMarks; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Have you ever been convicted by a criminal court?</th>
                    <td class="d-flex w-100 border-0">
                    <center class="w-100">
                        <input type="radio" id="convicted" name="criminal"
                        <?php if ($isCrime == "Yes") {
                            echo "checked";
                        }
                        ?> name="" value="Yes" style="width: auto;margin-right: 1rem;">
                         Yes
                        <input type="radio" id="convicted" name="criminal"
                        <?php if ($isCrime == "No") {
                            echo "checked";
                        }
                        ?> name="" value="No" style="width: auto;margin-right: 1rem;margin-left: 1.5rem">
                         No
                        
                        </center>
                    </td>
                </tr>
                <tr>
                    <th>Select School/college</th>
                    <td>
                        <select name="sclClg" id="school" class="form-control" required>
                            <option value="" disabled>Select School/college</option>
                            <option <?php if($schoolType == "School"){echo "Selected";} ?> value="School">School</option>
                            <option <?php if($schoolType == "College"){echo "Selected";} ?> value="College">College</option>
                        </select>

                    </td>
                </tr>
                <tr>
                    <th>Stream</th>
                    <td>
                        <select name="stream" id="stream" class="form-control" required>
                            <option value="" disabled>Select Stream</option>
                            <option <?php if($stream == "Science"){echo "Selected";} ?> value="Science">Science</option>
                            <option <?php if($stream == "Commerce"){echo "Selected";} ?> value="Commerce">Commerce</option>
                            <option <?php if($stream == "Arts"){echo "Selected";} ?> value="Arts">Arts</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Name of School/College</th>
                    <td>
                        <input type="text" name="school" value="<?php echo $schoolName; ?>">
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
                    <td class="d-flex w-100 border-0">
                        <center class="w-100">
                        <input type="radio" id="ncc"
                        <?php if ($enrollNcc == "Yes") {
                            echo "checked";
                        }
                        ?> name="nccEnroll" value="Yes" style="width: auto;margin-right: 1rem;">
                         Yes
                        <input type="radio" id="ncc"
                        <?php if ($enrollNcc == "No") {
                            echo "checked";
                        }
                        ?> name="nccEnroll" value="No" style="width: auto;margin-right: 1rem;margin-left: 1.5rem">
                         No
                        </center>
                    </td>
                </tr>
                <tr>
                    <th>Have you been dismissed from NCC</th>
                    <td class="d-flex w-100 border-0">
                    <center class="w-100">
                        <input type="radio" id="ncc"
                        <?php if ($dissmissed == "Yes") {
                            echo "checked";
                        }
                        ?> name="isDiss" value="Yes" style="width: auto;margin-right: 1rem;">
                         Yes
                        <input type="radio" id="ncc"
                        <?php if ($dissmissed == "No") {
                            echo "checked";
                        }
                        ?> name="isDiss" value="No" style="width: auto;margin-right: 1rem;margin-left: 1.5rem">
                         No
                        </center>
                    </td>
                </tr>
                <tr>
                    <th>Next of kin with address</th>
                    <td>
                        <input type="text" name="nameKin" value="<?php echo $nameKin; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Relationship</th>
                    <td>
                        <input type="text" name="relationshipKin" value="<?php echo $relationKin; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Telephone No:</th>
                    <td>
                        <input type="text" name="contactKin" value="<?php echo $telephoneKin; ?>">
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
                        <input type="text" name="ifsc" value="<?php echo $ifsc; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Bank Acct No. of Cadet/Parent</th>
                    <td>
                        <input type="text" name="accNo"  value="<?php echo $accNo; ?>">
                    </td>
                </tr>
                <tr>
                    <th>Aadhaar/UID No.</th>
                    <td>
                        <input type="text" name="adharNo" value="<?php echo $adharNo; ?>">
                    </td>
                </tr>
                <tr>
                    <th>PAN Card No.</th>
                    <td>
                        <input type="text" name="panNo" value="<?php echo $panNo; ?>">

                    </td>
                </tr>

            </table>
            
        </div>
        <div class="container">
            <center>
                <h5>Update Document</h5>
            </center>
            <table style="width:60%">
                <tr>
                    <th>Profile Photo</th>
                    <td>
                        <input type="file" name="NewProfile" >
                    </td>
                </tr>
                <tr>
                    <th>Sign Photo</th>
                    <td>
                        <input type="file" name="NewSign" >
                    </td>
                </tr>
                <tr>
                    <th>Passbook Photo</th>
                    <td>
                        <input type="file" name="NewPassbook"  >
                    </td>
                </tr>
            </table>
            
        </div>
    </div>
    <br>
    <br>
    <center><button type="submit" name="updateProfile" class="btn btn-primary">Update</button></center>
    </form>
    <br>
    <br>
    <center> 
    <a class="btn text-center mt-3 text-light" style="background-color: #35b729;" href="<?php if($_SESSION['userType'] == 'admin'){ echo "cadets.php";}else{echo "student_dashboard.php";} ?>">Back to Dashboard</a>
</center>
<br>
<br>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>