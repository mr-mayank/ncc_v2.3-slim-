<?php 
// session_start();
include ('database/include.php');
$uniqueId =  $_SESSION['updateID'];
if(isset($_POST['updateProfile'])){
    $fullSname = $_POST['fullSname'];
    $arrayOfname = explode(" ", $fullSname);
    $fname = $arrayOfname[0];
    $mname = $arrayOfname[1];
    $lname = $arrayOfname[2];
    $birthday = $_POST['birthday'];
    $national = $_POST['national'];
    $fullFname = $_POST['fullFname'];
    $arrayOffname = explode(" ", $fullFname);
    $f_fname = $arrayOffname[0];
    $f_mname = $arrayOffname[1];
    $f_lname = $arrayOffname[2];
    $fullMname = $_POST['fullMname'];
    $arrayOfmname = explode(" ", $fullMname);
    $m_fname = $arrayOfmname[0];
    $m_mname = $arrayOfmname[1];
    $m_lname = $arrayOfmname[2];
    $address = $_POST['res'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $gender = $_POST['sex'];
    $blood= $_POST['bgroup'];
    $rstation = $_POST['rstation'];
    $pstation = $_POST['pstation'];

    $rank = $_POST['rank'];
    $updateRank = "UPDATE `student_credentials` SET `rank` = '$rank' WHERE `id`='$uniqueId'";
    $updateRankQuery = mysqli_query($conn, $updateRank);
    
    $updatePersonal = "UPDATE `personaldetails` SET `fname`='$fname', `lname`='$lname', `mname`='$mname', `birthDate`='$birthday', `nationality`='$national', `fatherFname`='$f_fname', `fatherLname`='$f_lname', `fatherMname`='$f_mname', `motherFname`='$m_fname', `motherLname`='$m_lname', `motherMname`='$m_mname', `address`='$address', `contactNo`='$contact', `email`='$email', `gender`='$gender', `blood`='$blood', `nrRailway`='$rstation', `nrPolice`='$pstation' WHERE `userID`='$uniqueId'";

    $addPersonalResult = mysqli_query($conn, $updatePersonal);
   
    // if(empty($_FILES['studentphoto']['name'])) {
    //     $studentP = "";

    // }else{
    //     $studentphoto = $_FILES['studentphoto']['name'];
    //     $studentphoto = time().$studentphoto;
    //     $studentP = "uploads/".basename($studentphoto);
    //     move_uploaded_file($_FILES['studentphoto']['tmp_name'], $studentP);
    // }

    // if(empty($_FILES['studentsign']['name'])) {
    //     $studentS = "";
    // }else{
    //     $studentsign = $_FILES['studentsign']['name'];
    //     $studentsign = time().$studentsign;
    //     $studentS = "uploads/".basename($studentsign);
    //     move_uploaded_file($_FILES['studentsign']['tmp_name'], $studentS);
    // }
    // if(empty($_FILES['studentpass']['name'])) {
    //     $studentPa = "";
    // }else{
    //     $studentpass = $_FILES['studentpass']['name'];
    //     $studentpass = time().$studentpass;
    //     $studentPa = "uploads/".basename($studentpass);
    //     move_uploaded_file($_FILES['studentpass']['tmp_name'], $studentPa);
    // }

    // $addPhoto = "INSERT INTO `studentdocument` (`userPhoto`, `signPhoto`, `passPhoto`, `userID`) VALUES ('$studentP','$studentS','$studentPa','$uniqueId')";

    // $addPersonal = mysqli_query($conn,$addPhoto);


    $qua = $_POST['qua'];
    $marks = $_POST['marks'];
    $identification = $_POST['identification'];
    $criminal = $_POST['criminal'];
    $sentence = $_POST['sentence'];
    $sclClg = $_POST['sclClg'];
    $stream = $_POST['stream'];
    $scName = $_POST['scName'];

    $updateAcademic = "UPDATE `aceddemicdetails` SET `qualify`='$qua', `marks`='$marks', `idMarks`='$identification', `isCrime`='$criminal', `circumCrime`='$sentence', `schoolType`='$sclClg', `stream`='$stream', `schoolName`='$scName' WHERE `userID`='$uniqueId'";

    $addAcademic = mysqli_query($conn,$updateAcademic);

    $willEnroll = $_POST['willEnroll'];
    $unit = $_POST['unit'];
    $nccEnroll = $_POST['nccEnroll'];
    $enroll = $_POST['enroll'];
    $isDiss = $_POST['isDiss'];
    $dissDetails = $_POST['dissDetails'];
    $nameKin = $_POST['nameKin'];
    $relationKin = $_POST['relationshipKin'];
    $contactKin = $_POST['contactKin'];


    $updateEnroll = "UPDATE `nccinterest` SET `nccWill`='$willEnroll', `nccUnit`='$unit', `enrollNcc`='$nccEnroll', `enrollment`='$enroll', `dissmissed`='$isDiss', `dissmissedDetails`='$dissDetails', `nameKin`='$nameKin', `telephoneKin`='$contactKin', `relationKin`='$relationKin' WHERE `userID`='$uniqueId'";

    $addEnroll = mysqli_query($conn,$updateEnroll);

    $ifsc = $_POST['ifsc'];
    $accNo = $_POST['accNo'];
    $adharNo = $_POST['adharNo'];
    $panNo = $_POST['panNo'];

    $updateBank = "UPDATE `bankdetails` SET `ifscCode`='$ifsc', `accountNo`='$accNo', `adharNo`='$adharNo', `panNo`='$panNo' WHERE `userID`='$uniqueId'";

    $addBank = mysqli_query($conn,$updateBank);

    if($addPersonal && $addPhoto && $addAcademic && $addEnroll && $addBank){
        header("Location: studentProfile.php");
    }else{
        echo "<script>alert('Something went wrong!')</script>";
        header("Location: studentProfile.php");
    }
}


?>
