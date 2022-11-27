<?php
    
    include ('database/include.php');
    $uniqueID = $_SESSION['userId'];
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


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .t1 {
            border: none;
        }

        .index-code {
            padding-right: 1rem;
            font-size: large;
        }

        table,
        tr,
        td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 0.3rem;
        }

        .rowTitle {
            font-size: large;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 0.1rem 25rem auto;
        }

        .grid-item {
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container main" id="nccRegForm">
        <center>
            <div class="content" style="display: flex;">
                <div class="row1 ms-auto" style="text-transform: uppercase;">
                    <h4><u>FORM I</u></h4>
                    <h4><u>National Cadet corps</u></h4>
                    <h4><u>senior devision/wing enrolment form</u></h4>
                    <h4>(See Rules 7 and 11 of NCC Act, 1948)</h4>
                </div>
                <div class="image ms-auto">
                    <img src="<?php 
                        echo $studentP;
                    ?>" height="100rem" width="100rem">
                </div>
            </div>
        </center>

        <div class="row">

            <div class="grid-container">
                <div class="grid-item">1.</div>
                <div class="grid-item">Name &nbsp;(IN BLOCK LETTERS)</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                            $rowChar = 20;
                            $name = $fname . " " . $mname . " " . $lname;
                            $nameLength = strlen($name);
                            $nameChar = str_split($name);
                            for($i = 0; $i < $rowChar; $i++) {
                                if ($i < $nameLength) {
                                    echo "<td>" . $nameChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            echo "<tr>";
                            $rowChar += $rowChar;
                            for($i = $rowChar-20; $i < $rowChar; $i++) {
                                if ($i < $nameLength) {
                                    echo "<td>" . $nameChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            ?>
                        <!-- </tr>
                                for($i=0; $i<strlen($lname); $i++){
                                    echo "<td>". $lname[$i] ."</td>";
                                }
                                echo "<td>&nbsp;</td>";
                                for($i=0; $i<strlen($fname); $i++){
                                    echo "<td>". $fname[$i] ."</td>";
                                }
                                echo "<td>&nbsp;</td>";
                                for($i=0; $i<strlen($mname); $i++){
                                    echo "<td>". $mname[$i] ."</td>";
                                }


                            ?> -->
                    </table>
                </div>
            </div>

            <br>

            <div class="grid-container">
                <div class="grid-item">2.</div>
                <div class="grid-item">Nationality & Date <br> Of Birth <br> (DD/MM/YYYY)</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <td>I</td>
                            <td>N</td>
                            <td>D</td>
                            <td>I</td>
                            <td>A</td>
                            <td>N</td>
                            <td>&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;</td>
                            <td>&nbsp;&nbsp;</td>
                            <td class="t1">&nbsp;&nbsp;</td>
                            <?php 
                                $dob = $birthday;
                                $dob = explode("-", $dob);
                                $dob = array_reverse($dob);
                                $dob = implode(" ", $dob);
                                for($i=0; $i<strlen($dob); $i++){
                                    if($dob[$i] == " "){
                                        echo "<td class='t1'>&nbsp;</td>";
                                    } else {
                                        echo "<td>". $dob[$i] ."</td>";
                                    }
                                }
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
            <br>
            <div class="grid-container">
                <div class="grid-item">3.</div>
                <div class="grid-item">Father's/Guardian's Name</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php 
                                
                                $rowChar = 20;
                                $fatherName = $f_fname . " " . $f_mname . " " . $f_lname;
                                $name = $fatherName;
                                $nameLength = strlen($name);
                                $nameChar = str_split($name);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $nameLength) {
                                        echo "<td>" . $nameChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                                echo "<tr>";
                                $rowChar += $rowChar;
                                for($i = $rowChar-20; $i < $rowChar; $i++) {
                                    if ($i < $nameLength) {
                                        echo "<td>" . $nameChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                            ?>

                        </tr>
                        
                    </table>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item">4.</div>
                <div class="grid-item">Mother's Name</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>

                        <?php 

                            $rowChar = 20;
                            $motherName = $m_fname . " " . $m_mname . " " . $m_lname;
                            $name = $motherName;
                            $nameLength = strlen($name);
                            $nameChar = str_split($name);
                            for($i = 0; $i < $rowChar; $i++) {
                                if ($i < $nameLength) {
                                    echo "<td>" . $nameChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            echo "<tr>";
                            $rowChar += $rowChar;
                            for($i = $rowChar-20; $i < $rowChar; $i++) {
                                if ($i < $nameLength) {
                                    echo "<td>" . $nameChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                        ?>
                   
                    </table>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item">5.</div>
                <div class="grid-item">Residential Address <br>(Landmark, State, Distt <br> Taluka, City/Vill, Pin Code)</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                          <?php
                            $rowChar = 20;
                            $add = $address;
                            $addLength = strlen($add);
                            $addChar = str_split($add);
                            for($i = 0; $i < $rowChar; $i++) {
                                if ($i < $addLength) {
                                    echo "<td>" . $addChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            echo "<tr>";
                            $rowChar += $rowChar;
                            for($i = $rowChar-20; $i < $rowChar; $i++) {
                                if ($i < $addLength) {
                                    echo "<td>" . $addChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            echo "<tr>";
                            $rowChar = $rowChar+20;
                            for($i = $rowChar-20; $i < $rowChar; $i++) {
                                if ($i < $addLength) {
                                    echo "<td>" . $addChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                          ?>

                    </table>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item">6.</div>
                <div class="grid-item">Mobile No.</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr><?php
                            $contact = $contact;
                            $contactLength = strlen($contact);
                            $contactChar = str_split($contact);
                            for($i = 0; $i < $contactLength; $i++) {
                                echo "<td>" . $contactChar[$i] . "</td>";
                            }
                        ?>
                        
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>

                        </tr>


                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">7.</div>
                <div class="grid-item">E-mail ID</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                                $rowChar = 20;
                                $email = $email;
                                $emailLength = strlen($email);
                                $emailChar = str_split($email);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $emailLength) {
                                        echo "<td>" . $emailChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                                echo "<tr>";
                                $rowChar += $rowChar;
                                for($i = $rowChar-20; $i < $rowChar; $i++) {
                                    if ($i < $emailLength) {
                                        echo "<td>" . $emailChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                            ?>

                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">8.</div>
                <div class="grid-item">Blood Group</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                                $blood = $blood;
                                $bloodLength = strlen($blood);
                                $bloodChar = str_split($blood);
                                for($i = 0; $i < $bloodLength; $i++) {
                                    echo "<td>" . $bloodChar[$i] . "</td>";
                                }
                                echo "<td>&nbsp;</td>";
                                echo "</tr>";
                            ?>
                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">9.</div>
                <div class="grid-item">Sex</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                               
                                $sex = $gender;
                                $sexLength = strlen($sex);
                                $sexChar = str_split($sex);
                                for($i = 0; $i < 6; $i++) {
                                  if($i<$sexLength) {
                                    echo "<td>" . $sexChar[$i] . "</td>";
                                  } else {
                                    echo "<td>&nbsp;</td>";
                                  }
                                }
                                echo "</tr>";
                            ?>
                        </tr>


                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">10.</div>
                <div class="grid-item">Nearest Railway Station</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php 
                                $rowChar = 20;
                                $station = $rstation;
                                $stationLength = strlen($station);
                                $stationChar = str_split($station);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $stationLength) {
                                        echo "<td>" . $stationChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                            ?>

                        </tr>


                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">11.</div>
                <div class="grid-item">Nearest Police Station</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                                $rowChar = 20;
                                $police = $pstation;
                                $policeLength = strlen($police);
                                $policeChar = str_split($police);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $policeLength) {
                                        echo "<td>" . $policeChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                            ?>

                        </tr>

                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">12.</div>
                <div class="grid-item">Educational <br> Qualifications <br> & Marks in (%)</div>
                <div class="grid-item">
                    <table cellspacing="0">
                    <tr>
                            <td>C</td>
                            <td>L</td>
                            <td>A</td>
                            <td>S</td>
                            <td>S</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>M</td>
                            <td>A</td>
                            <td>R</td>
                            <td>K</td>
                            <td>S</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>

                        </tr>
                        <tr>
                           <?php
                                $edu = $qualify;
                                $eduLength = strlen($edu);
                                $eduChar = str_split($edu);
                                for($i = 0; $i < 5; $i++) {
                                    if ($i < $eduLength) {
                                        echo "<td>" . $eduChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";

                                $marks = $marks;
                                $marksLength = strlen($marks);
                                $marksChar = str_split($marks);
                                for($i = 0; $i < 4; $i++) {
                                    if ($i < $marksLength) {
                                        echo "<td>" . $marksChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";echo "<td>&nbsp;</td>";
                                echo "</tr>";
                            ?>
                    </table>
                </div>
            </div>


            <div class="grid-container">
                <div class="grid-item">13.</div>
                <div class="grid-item">Identification Marks <br> (at least two) </div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                                $rowChar = 20;
                                $marks = $idMarks;
                                $marksLength = strlen($marks);
                                $marksChar = str_split($marks);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $marksLength) {
                                        echo "<td>" . $marksChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                                echo "<tr>";
                                $rowChar += 20;
                                for($i = $rowChar -20;$i<$rowChar;$i++) {
                                    if ($i < $marksLength) {
                                        echo "<td>" . $marksChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                                echo "<tr>";
                                $rowChar += 20;
                                for($i = $rowChar -20;$i<$rowChar;$i++) {
                                    if ($i < $marksLength) {
                                        echo "<td>" . $marksChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                                
                            
                            ?>
                    </table>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item">14.</div>
                <div class="grid-item">Have you ever been <br> convicted by a criminal <br> court & if so in what <br> circumstances and what <br> was the sentence? <br> Attach relevant documents </div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                           <?php
                            $rowChar = 20;
                            $convicted = $isCrime;
                            $convictedLength = strlen($convicted);
                            $convictedChar = str_split($convicted);
                            for($i = 0; $i < $rowChar; $i++) {
                                if ($i < $convictedLength) {
                                    echo "<td>" . $convictedChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            echo "<tr>";
                            $rowChar += 20;
                            for($i = $rowChar -20;$i<$rowChar;$i++) {
                                if ($i < $convictedLength) {
                                    echo "<td>" . $convictedChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            echo "<tr>";
                            $rowChar += 20;
                            for($i = $rowChar -20;$i<$rowChar;$i++) {
                                if ($i < $convictedLength) {
                                    echo "<td>" . $convictedChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            echo "<tr>";
                            $rowChar += 20;
                            for($i = $rowChar -20;$i<$rowChar;$i++) {
                                if ($i < $convictedLength) {
                                    echo "<td>" . $convictedChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                           ?>
                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">15.</div>
                <div class="grid-item">Name of School/College <br> and Stream (Arts/ <br> Science/Commerce) </div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                            $rowChar = 23;
                            $school = $schoolName;
                            $schoolLength = strlen($school);
                            $schoolChar = str_split($school);
                            for($i = 0; $i < $rowChar; $i++) {
                                if ($i < $schoolLength) {
                                    echo "<td>" . $schoolChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            echo "<tr>";
                            $rowChar += 23;
                            for($i = $rowChar -23;$i<$rowChar;$i++) {
                                if ($i < $schoolLength) {
                                    echo "<td>" . $schoolChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            echo "<tr>";
                            $rowChar = 23;
                            $stream = $stream;
                            $streamLength = strlen($stream);
                            $streamChar = str_split($stream);
                            for($i = 0;$i<$rowChar;$i++) {
                                if ($i < $streamLength) {
                                    echo "<td>" . $streamChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                        
                            ?>

                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">16.</div>
                <div class="grid-item">Willing to be enrolled <br> and undergo training <br> under the National Cadet <br>Corps Act, 1948</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                         <?php
                            $nccWill = $nccWill;
                            $nccWillLength = strlen($nccWill);
                            $nccWillChar = str_split($nccWill);
                            for($i = 0; $i < 4; $i++) {
                                if ($i < $nccWillLength) {
                                    echo "<td>" . $nccWillChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                         ?>

                        </tr>

                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">17.</div>
                <div class="grid-item">NCC unit to be <br> enrolled in </div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                                $rowChar = 13;
                                $nccUnit = $nccUnit;
                                $nccUnitLength = strlen($nccUnit);
                                $nccUnitChar = str_split($nccUnit);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $nccUnitLength) {
                                        echo "<td>" . $nccUnitChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                                echo "<tr>";
                                $rowChar += 13;
                                for($i = $rowChar -13;$i<$rowChar;$i++) {
                                    if ($i < $nccUnitLength) {
                                        echo "<td>" . $nccUnitChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                            ?>

                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">18.</div>
                <div class="grid-item">Have you been <br> enrolled in NCC <br> earlier. If
                    yes, Your Enrolment No.</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                            $enrollNcc = $enrollNcc;
                            $enrollNccLength = strlen($enrollNcc);
                            $enrollNccChar = str_split($enrollNcc);
                            for($i = 0; $i < 4; $i++) {
                                if ($i < $enrollNccLength) {
                                    echo "<td>" . $enrollNccChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            echo "<tr>";
                            $rowChar = 19;
                            $enrollment = $enrollment;
                            $enrollmentLength = strlen($enrollment);
                            $enrollmentChar = str_split($enrollment);
                            for($i = 0; $i < $rowChar; $i++) {
                                if ($i < $enrollmentLength) {
                                    echo "<td>" . $enrollmentChar[$i] . "</td>";
                                } else {
                                    echo "<td>&nbsp;</td>";
                                }
                            }
                            echo "</tr>";
                            ?>
                    
                        </tr>
                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">19.</div>
                <div class="grid-item">Have you been <br> dismissed form NCC/<br>the Territorial Army/ <br> the Indian Armed Forces; <br> Please provide details :-</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                           <?php
                                $rowChar = 20;
                                $dismissed = $dissmissed;
                                $dismissedLength = strlen($dismissed);
                                $dismissedChar = str_split($dismissed);
                                for($i = 0; $i < 4; $i++) {
                                    if ($i < $dismissedLength) {
                                        echo "<td>" . $dismissedChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                $dissmissedDetails = $dissmissedDetails;
                                $dissmissedDetailsLength = strlen($dissmissedDetails);
                                $dissmissedDetailsChar = str_split($dissmissedDetails);
                                for($i = 5; $i < $rowChar; $i++) {
                                    if ($i < $dissmissedDetailsLength) {
                                        echo "<td>" . $dissmissedDetailsChar[$i-5] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                
                                echo "</tr>";
                                echo "<tr>";
                                $rowChar += 20;
                                for($i = $rowChar -20;$i<$rowChar;$i++) {
                                    if ($i < $dismissedLength) {
                                        echo "<td>" . $dismissedChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                                echo "<tr>";
                                $rowChar += 20;
                                for($i = $rowChar -20;$i<$rowChar;$i++) {
                                    if ($i < $dismissedLength) {
                                        echo "<td>" . $dismissedChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";

                           ?>
                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">20.</div>
                <div class="grid-item">Next of Kin with address <br> (wiht relationship) Telephone No. (O)/(R) <br> (as applicable) </div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                                $rowChar = 20;
                                $nextOfKin = $nameKin;
                                $nextOfKinLength = strlen($nextOfKin);
                                $nextOfKinChar = str_split($nextOfKin);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $nextOfKinLength) {
                                        echo "<td>" . $nextOfKinChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                                echo "<tr>";
                                
                                for($i = 0;$i<10;$i++) {
                                    if ($i < $nextOfKinLength) {
                                        echo "<td>" . $nextOfKinChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                               
                                $relationshipKin = $relationKin;
                                $relationshipKinLength = strlen($relationshipKin);
                                $relationshipKinChar = str_split($relationshipKin);
                                for($i = 0; $i < 10; $i++) {
                                    if ($i < $relationshipKinLength) {
                                        echo "<td>" . $relationshipKinChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                                echo "<tr>";
                                $rowChar = 20;
                                $telephoneKin = $telephoneKin;
                                $telephoneKinLength = strlen($telephoneKin);
                                $telephoneKinChar = str_split($telephoneKin);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $telephoneKinLength) {
                                        echo "<td>" . $telephoneKinChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";

                            ?>

                    </table>
                </div>
            </div>

            <div class="grid-container">
                <div class="grid-item">21.</div>
                <div class="grid-item">Banker's detail/ <br> IFSC Code </div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                                $rowChar = 22;
                                $bankerIFSC = $ifsc;
                                $bankerIFSCLength = strlen($bankerIFSC);
                                $bankerIFSCChar = str_split($bankerIFSC);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $bankerIFSCLength) {
                                        echo "<td>" . $bankerIFSCChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                            ?>  
                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">22.</div>
                <div class="grid-item">Bank Acct No. of<br>Cadet/Parent</div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                                $rowChar = 22;
                                $bankAcctNo = $accNo;
                                $bankAcctNoLength = strlen($bankAcctNo);
                                $bankAcctNoChar = str_split($bankAcctNo);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $bankAcctNoLength) {
                                        echo "<td>" . $bankAcctNoChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                            ?>
                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">23.</div>
                <div class="grid-item">Adhaar/UID No. <br> (if alloted) </div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                            <?php
                                $rowChar = 22;
                                $adhaarNo = $adharNo;
                                $adhaarNoLength = strlen($adhaarNo);
                                $adhaarNoChar = str_split($adhaarNo);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $adhaarNoLength) {
                                        echo "<td>" . $adhaarNoChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                            ?>
                    </table>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-item">24.</div>
                <div class="grid-item">PAN Card No. <br> (if alloted) </div>
                <div class="grid-item">
                    <table cellspacing="0">
                        <tr>
                           <?php
                                $rowChar = 22;
                                $panNo = $panNo;
                                $panNoLength = strlen($panNo);
                                $panNoChar = str_split($panNo);
                                for($i = 0; $i < $rowChar; $i++) {
                                    if ($i < $panNoLength) {
                                        echo "<td>" . $panNoChar[$i] . "</td>";
                                    } else {
                                        echo "<td>&nbsp;</td>";
                                    }
                                }
                                echo "</tr>";
                            ?>
                          
                    </table>
                </div>
            </div>
        </div>
    </div>

    <center>
        <input type="button" value="Print Registration Form" onclick="makepdf('nccRegForm')">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>

</html>