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

if(isset($_POST['CATCattandee'])){
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
    <title>CTC Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .grid-item .para {
            text-align: left;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 3rem 30rem auto;
            text-align: left;
            line-height: 2rem;
        }

        .scl {
            display: grid;
            grid-template-columns: 7rem 40rem auto;
            text-align: left;
        }

        .name {
            display: grid;
            grid-template-columns: 20rem auto;
            text-align: left;
        }

        .space {
            display: grid;
            grid-template-columns: 100rem 5rem !important;
            text-align: center;
        }

        .parts {
            display: grid;
            grid-template-columns: 5rem 30rem 4rem 19rem !important;
        }

        .sixparts {
            display: grid;
            grid-template-columns: 5rem 14rem 5rem 15rem 2rem 13rem !important;
            text-align: left;

        }

        .sixparts2 {
            display: grid;
            grid-template-columns: 5rem 18rem 3rem 13rem 6rem 13rem !important;
            text-align: left;

        }

        .parts2 {
            display: grid;
            grid-template-columns: 3rem auto !important;
            text-align: left;
        }

        .parts3 {
            display: grid;
            grid-template-columns: 35rem 5rem 10rem !important;
            text-align: left;
        }

        .telephone {
            display: grid;
            grid-template-columns: 14rem auto !important;
            text-align: left;
        }

        .image {
            display: grid;

            grid-template-columns: 40rem 20rem;
            text-align: left;

        }

        .grid-item {
            /* text-align: center; */
            /* margin-bottom: 1rem; */
        }
    </style>
</head>

<body>
<center>
        <input type="button" value="Print Registration Form" onclick="makepdf('form')">
    </center>
    
                    <?php
                if($participant != "" || $participant != NULL){
                    $participantArray = explode(",", $participant);
                    foreach($participantArray as $participant){
                        $participantDetails = "SELECT * FROM `personaldetails` WHERE `userID` = '$participant'";
                        $participantDetailsQuery = mysqli_query($conn, $participantDetails);
                        $participantDetailsResult = mysqli_fetch_assoc($participantDetailsQuery);
                        $fname = $participantDetailsResult['fname'];
                        $lname = $participantDetailsResult['lname'];
                        $dob = $participantDetailsResult['birthDate'];
                        $mobileNo = $participantDetailsResult['contactNo'];
                        $address = $participantDetailsResult['address'];
                        $fatherFname = $participantDetailsResult['fatherFname'];
                        $fatherLname = $participantDetailsResult['fatherLname'];
                        $reg = "SELECT * FROM `student_credentials` WHERE `id` = '$participant'";
                        $regQuery = mysqli_query($conn, $reg);
                        $regResult = mysqli_fetch_assoc($regQuery);
                        $rank = $regResult['rank'];
                        $regNo = $regResult['regNo'];
                        $aceddemicdetailsDetails = "SELECT * FROM `aceddemicdetails` WHERE `userID` = '$participant'";
                        $aceddemicdetailsDetailsQuery = mysqli_query($conn, $aceddemicdetailsDetails);
                        $aceddemicdetailsDetailsResult = mysqli_fetch_assoc($aceddemicdetailsDetailsQuery);
                        $school = $aceddemicdetailsDetailsResult['schoolType'];
                        $nccinterestDetails = "SELECT * FROM `nccinterest` WHERE `userID` = '$participant'";  
                        $nccinterestDetailsQuery = mysqli_query($conn, $nccinterestDetails);
                        $nccinterestDetailsResult = mysqli_fetch_assoc($nccinterestDetailsQuery);
                        $relation = $nccinterestDetailsResult['relationKin'];

                        echo '
                        <center>
        <div id="form">
            <div class="container">

                <center>
                    <h2><u>1 GUJARAT COMPO TECH COY NCC, AHMEDABAD</u></h2>
                </center>
                <center>
                    <h3><u>RISK, VOLUNTEERING, SAFETY PRECAUTION & MEDICAL CERTIFICATE</u></h3>
                </center>
                <br>
                <div class="grid-container name">
                    <div class="grid-item">Name of Camp/Courses/Expendition:</div>

                    <div class="grid-item" style="border-bottom:1px solid black ;">
                        ';
                        ?>
                        <?php 

                        echo $event_name;
                        ?>
                       <?php 
                        echo '
                    </div>
                </div>

                <div class="grid-container sixparts ">
                    <div class="grid-item">
                        Place:
                    </div>
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                       ';
                          ?>
                        <?php
                        echo $eventPlace;
                        ?>
                        <?php
                        echo '
                    </div>
                    <div class="grid-item">
                        From:
                    </div>
                    <div class="grid-item" >
                        ';
                        ?>
                        <?php
                        echo $sdate;
                        ?>
                        <?php
                        echo '

                    </div>
                    <div class="grid-item">
                        To:
                    </div>
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                        ';
                        ?>
                        <?php
                        echo $edate;
                        ?>
                        <?php
                        echo '
                    </div>
                </div>
                <div class="grid-container sixparts2">
                    <div class="grid-item">
                        Regtl No:
                    </div>
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                        ';
                        ?>
                        <?php
                        echo $regNo;
                        ?>
                        <?php
                        echo '
                    </div>

                    <div class="grid-item">
                        Rank:
                    </div>
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                        ';
                        ?>
                        <?php
                        if($rank == 0){
                            echo "SUO";
                        }
                        else if($rank == 1){
                            echo "CUO";
                        }else if($rank == 2){
                            echo "SGT";
                        }else if($rank == 3){
                            echo "CPL";
                        }else if($rank == 4){
                            echo "LCPL";
                        }else if($rank == 5){
                            echo "Cadet";
                        }
                        
                        ?>
                        <?php
                        echo '
                    </div>

                    <div class="grid-item">
                        Date of birth:
                    </div>
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                        ';
                        ?>
                        <?php
                        echo $dob;
                        ?>
                        <?php
                        echo '
                    </div>

                </div>
                <div class="grid-container">
                    <div class="grid-item">
                        Name:
                    </div>
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                        ';
                        ?>
                        <?php
                        echo $fname . " " . $lname;
                        ?>
                        <?php
                        echo '
                    </div>
                </div>
                <div class="grid-container scl">
                    <div class="grid-item">
                        School/College:
                    </div>
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                        ';
                        ?>
                        <?php
                        echo $school;
                        ?>
                        <?php
                        echo '  
                    </div>
                </div>
                <div class="grid-container parts2">
                    <div class="grid-item">
                        Unit:
                    </div>
                    <div class="grid-item">
                        <u style="font-weight: bold; font-size:large">1 Gujarat CTC NCC, Ahmedabad___________(Tele: 079-26300904)</u>
                    </div>
                </div>
                <br>
                <center>
                    <u style="font-weight: bold; font-size:larger">RISK VOLUNTEERING & SAFETY PRECAUTION CERTIFICATE</u>
                </center>
                <br>    
                ';
                   
                ?>
                <p class="para" style="font-size: larger;">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; Volunteer to attend the above Camp/Course/Competition at my own risk. I also know that their may be<br> deep &nbsp; water &nbsp; near the Camp site & area near the &nbsp; water edge is 'OUT OF BOUNDS' to cadets.&nbsp; &nbsp; I shall be doing <br> so entirely at my own risk.</p>
                <div class="grid-container space">
                    <div class="grid-item ">
                        <p><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem;visibility:hidden;"></p>
                        <p>(Signature of cadet)</p>
                    </div>
                </div>
                <br>
                <center><u style="font-weight: bold; font-size:large">COUNTERSIGNATURE OF CADETS PARENTS/GUARDIAN</u></center>
                <center>
                    <p style="font-size: larger;">I agree to my son/ward attending the above Camp/Course/Traning Event at own risk.</p>
                </center>
                <div class="grid-container space">

                    <div class="grid-item">
                        <p><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem; visibility:hidden;"></p>
                        <p>(Signature of Parents/Guardian)</p>
                    </div>
                </div>
                <br>
                <div class="grid-container parts">
                    <div class="grid-item" >
                        Address:
                    </div>
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                      <?php 
                        echo $address;
                        ?>
                    </div>
                    <div class="grid-item">
                        Name:
                    </div>
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                       <?php 

                        echo $fatherFname . " " . $fatherLname;
                        ?>
                    </div>
                </div>
                <div class="grid-container parts3">
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                     
                    </div>
                    <div class="grid-item">
                        Relation:
                    </div>
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                       <?php 

                        echo $relation;
                        ?>
                    </div>

                </div>
                <div class="grid-container telephone">
                    <div class="grid-item">
                        Telephone No. (Res/Mob/P.P)
                    </div>
                    <div class="grid-item" style="border-bottom:1px solid black ;">
                        <?php 

                        echo $mobileNo;
                 
                        ?>
                    </div>
                </div>
                <br>

                <center><u style="font-weight: bold; font-size:large">ATTESTED BY THE PRINCIPAL/HEAD MASTER OF THE INSTITUTION</u></center>


                <div class="grid-container image">
                    <div class="grid-item">
                        <p>Round Seal</p>
                    </div>
                    <div class="grid-item" style="text-align: center;">
                        <p><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem; visibility:hidden;"></p>
                        <p>(Signature of Principle/Head Master)</p>
                    </div>
                </div>
                <div class="grid-container scl">
                    <div class="grid-item">
                        <p>Appendix 'B'</p>
                    </div>
                    <div class="grid-item">
                        <p>(Ref DG NCC New Delhi letter No. 4180/COC/DG/NCC/Trg dated 6 Oct 2004)</p>
                    </div>
                </div>
                <br>

                <center><u style="font-weight: bold; font-size:large">MEDICAL CERTIFICATE</u></center>

                <p class="para" style="font-size: larger;">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;Certified that I have examined the above signed cadet in accordance with standard laid down in NCC act <br> & Rules and found him/her fit to undergo training strenuous nature of Camp/Course/expendition/Traning event at <br> the place and on the dates shown above.</p>
                <center style="font-size: larger;">I also certify that the above mentioned cadet has been inculcated and vaccinated.</center>
                <br>

                <div class="grid-container image">
                    <div class="grid-item">Station:<br></div>
                    <div class="grid-item" style="text-align: center;"><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem; visibility:hidden;"><br>Signature of Medical Officer/Doctor(MBBS)<br>(Name in Capital letter Regtl No & seal)</div>
                    <br>

                </div>
                <div class="grid-container">
                    <div class="grid-item">Date:</div><br><br>
                </div>
            </div>
            <?php
               }
            }else{
                echo "<script>alert('No Record Found')</script>
                <script>window.location.href='attendance.php'</script>";
                
            }
            ?>


            <!--############################################### second time form  ######################################################-->


            <!-- <div class="container">

                <center>
                    <h2><u>1 GUJARAT COMPO TECH COY NCC, AHMEDABAD</u></h2>
                </center>
                <center>
                    <h3><u>RISK, VOLUNTEERING, SAFETY PRECAUTION & MEDICAL CERTIFICATE</u></h3>
                </center>
                <br>
                <div class="grid-container name">
                    <div class="grid-item">Name of Camp/Courses/Expendition:</div>
                    <div class="grid-item">

                        ________________________________
                    </div>
                </div>

                <div class="grid-container sixparts ">
                    <div class="grid-item">
                        Place:
                    </div>
                    <div class="grid-item">
                        ____________
                    </div>
                    <div class="grid-item">
                        From:
                    </div>
                    <div class="grid-item">
                        ____________
                    </div>
                    <div class="grid-item">
                        To:
                    </div>
                    <div class="grid-item">
                        ______________
                    </div>
                </div>
                <div class="grid-container sixparts2">
                    <div class="grid-item">
                        Regtl No:
                    </div>
                    <div class="grid-item">
                        ______________
                    </div>

                    <div class="grid-item">
                        Rank:
                    </div>
                    <div class="grid-item">
                        ___________
                    </div>

                    <div class="grid-item">
                        Date of birth:
                    </div>
                    <div class="grid-item">
                        ____________
                    </div>

                </div>
                <div class="grid-container">
                    <div class="grid-item">
                        Name:
                    </div>
                    <div class="grid-item">
                        ______________________________________________
                    </div>
                </div>
                <div class="grid-container scl">
                    <div class="grid-item">
                        School/College:
                    </div>
                    <div class="grid-item">
                        __________________________________________
                    </div>
                </div>
                <div class="grid-container parts2">
                    <div class="grid-item">
                        Unit:
                    </div>
                    <div class="grid-item">
                        <u style="font-weight: bold; font-size:large">1 Gujarat CTC NCC, Ahmedabad___________(Tele: 079-26300904)</u>
                    </div>
                </div>
                <br>
                <center>
                    <u style="font-weight: bold; font-size:larger">RISK VOLUNTEERING & SAFETY PRECAUTION CERTIFICATE</u>
                </center>
                <br>
                <p class="para" style="font-size: larger;">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; Volunteer to attend the above Camp/Course/Competition at my own risk. I also know that their may be<br> deep &nbsp; water &nbsp; near the Camp site & area near the &nbsp; water edge is 'OUT OF BOUNDS' to cadets.&nbsp; &nbsp; I shall be doing <br> so entirely at my own risk.</p>
                <div class="grid-container space">
                    <div class="grid-item ">
                        <p><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem;visibility:hidden;" ></p>
                        <p>(Signature of cadet)</p>
                    </div>
                </div>
                <br>
                <center><u style="font-weight: bold; font-size:large">COUNTERSIGNATURE OF CADETS PARENTS/GUARDIAN</u></center>
                <center>
                    <p style="font-size: larger;">I agree to my son/ward attending the above Camp/Course/Traning Event at own risk.</p>
                </center>
                <div class="grid-container space">

                    <div class="grid-item">
                        <p><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem; visibility:hidden;"></p>
                        <p>(Signature of Parents/Guardian)</p>
                    </div>
                </div>
                <br>
                <div class="grid-container parts">
                    <div class="grid-item">
                        Address:
                    </div>
                    <div class="grid-item">
                        ___________
                    </div>
                    <div class="grid-item">
                        Name:
                    </div>
                    <div class="grid-item">
                        _______________
                    </div>
                </div>
                <div class="grid-container parts3">
                    <div class="grid-item">
                        ____________
                    </div>
                    <div class="grid-item">
                        Relation:
                    </div>
                    <div class="grid-item">
                        _______________
                    </div>

                </div>
                <div class="grid-container telephone">
                    <div class="grid-item">
                        Telephone No. (Res/Mob/P.P)
                    </div>
                    <div class="grid-item">
                        ______________
                    </div>
                </div>
                <br>

                <center><u style="font-weight: bold; font-size:large">ATTESTED BY THE PRINCIPAL/HEAD MASTER OF THE INSTITUTION</u></center>


                <div class="grid-container image">
                    <div class="grid-item">
                        <p>Round Seal</p>
                    </div>
                    <div class="grid-item" style="text-align: center;">
                        <p><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem; visibility:hidden;"></p>
                        <p>(Signature of Principle/Head Master)</p>
                    </div>
                </div>
                <div class="grid-container scl">
                    <div class="grid-item">
                        <p>Appendix 'B'</p>
                    </div>
                    <div class="grid-item">
                        <p>(Ref DG NCC New Delhi letter No. 4180/COC/DG/NCC/Trg dated 6 Oct 2004)</p>
                    </div>
                </div>
                <br>

                <center><u style="font-weight: bold; font-size:large">MEDICAL CERTIFICATE</u></center>

                <p class="para" style="font-size: larger;">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;Certified that I have examined the above signed cadet in accordance with standard laid down in NCC act <br> & Rules and found him/her fit to undergo training strenuous nature of Camp/Course/expendition/Traning event at <br> the place and on the dates shown above.</p>
                <center style="font-size: larger;">I also certify that the above mentioned cadet has been inculcated and vaccinated.</center>
                <br>

                <div class="grid-container image">
                    <div class="grid-item">Station:<br></div>
                    <div class="grid-item" style="text-align: center;"><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem; visibility:hidden;"><br>Signature of Medical Officer/Doctor(MBBS)<br>(Name in Capital letter Regtl No & seal)</div>
                    <br>

                </div>
                <div class="grid-container">
                    <div class="grid-item">Date:</div>
                </div>
            </div> -->

    </center>
    </div>
   

    <script>
        function makepdf(form) {
            var regForm = document.getElementById(form).innerHTML;
            var orginalForm = document.body.innerHTML;
            document.body.innerHTML = regForm;
            window.print();
            document.body.innerHTML = orginalForm;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>