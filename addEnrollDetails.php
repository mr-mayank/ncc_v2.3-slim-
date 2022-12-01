<?php 
// session_start();
include ('database/include.php');
$uniqueId =  $_SESSION['userId'];
if(isset($_POST['addEnrollDetails'])){
    $fname = $_POST['s_fname'];
    $mname = $_POST['s_mname'];
    $lname = $_POST['s_lname'];
    $birthday = $_POST['birthday'];
    $national = $_POST['national'];
    $f_fname = $_POST['f_fname'];
    $f_mname = $_POST['f_mname'];
    $f_lname = $_POST['f_lname'];
    $m_fname = $_POST['m_fname'];
    $m_mname = $_POST['m_mname'];
    $m_lname = $_POST['m_lname'];
    $address = $_POST['res'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $gender = $_POST['sex'];
    $blood= $_POST['bgroup'];
    $rstation = $_POST['rstation'];
    $pstation = $_POST['pstation'];
    

    $addPersonal = "INSERT INTO `personaldetails`(`fname`, `lname`, `mname`, `birthDate`, `nationality`, `fatherFname`, `fatherLname`, `fatherMname`, `motherFname`, `motherLname`, `motherMname`, `address`, `contactNo`, `email`, `gender`, `blood`, `nrRailway`, `nrPolice`, `userID`) VALUES ('$fname','$lname','$mname','$birthday','$national','$f_fname','$f_lname','$f_mname','$m_fname','$m_lname','$m_mname','$address','$contact','$email','$gender','$blood','$rstation','$pstation','$uniqueId')";

    $addPersonalResult = mysqli_query($conn, $addPersonal);
   
    if(empty($_FILES['studentphoto']['name'])) {
        $studentP = "";

    }else{
        $studentphoto = $_FILES['studentphoto']['name'];
        $studentphoto = time().$studentphoto;
        $studentP = "uploads/".basename($studentphoto);
        move_uploaded_file($_FILES['studentphoto']['tmp_name'], $studentP);
    }

    if(empty($_FILES['studentsign']['name'])) {
        $studentS = "";
    }else{
        $studentsign = $_FILES['studentsign']['name'];
        $studentsign = time().$studentsign;
        $studentS = "uploads/".basename($studentsign);
        move_uploaded_file($_FILES['studentsign']['tmp_name'], $studentS);
    }
    if(empty($_FILES['studentpass']['name'])) {
        $studentPa = "";
    }else{
        $studentpass = $_FILES['studentpass']['name'];
        $studentpass = time().$studentpass;
        $studentPa = "uploads/".basename($studentpass);
        move_uploaded_file($_FILES['studentpass']['tmp_name'], $studentPa);
    }

    $addPhoto = "INSERT INTO `studentdocument` (`userPhoto`, `signPhoto`, `passPhoto`, `userID`) VALUES ('$studentP','$studentS','$studentPa','$uniqueId')";

    $addPersonal = mysqli_query($conn,$addPhoto);


    $qua = $_POST['qua'];
    $marks = $_POST['marks'];
    $identification = $_POST['identification'];
    $criminal = $_POST['criminal'];
    $sentence = $_POST['sentence'];
    $sclClg = $_POST['sclClg'];
    $stream = $_POST['stream'];
    $scName = $_POST['scName'];

    $addAcademic = "INSERT INTO `aceddemicdetails` (`qualify`, `marks`, `idMarks`, `isCrime`, `circumCrime`, `schoolType`, `stream`, `schoolName`, `userID`) VALUES ('$qua','$marks','$identification','$criminal','$sentence','$sclClg','$stream','$scName','$uniqueId')";


    $addAcademic = mysqli_query($conn,$addAcademic);

    $willEnroll = $_POST['willEnroll'];
    $unit = $_POST['unit'];
    $nccEnroll = $_POST['nccEnroll'];
    $enroll = $_POST['enroll'];
    $isDiss = $_POST['isDiss'];
    $dissDetails = $_POST['dissDetails'];
    $nameKin = $_POST['nameKin'];
    $relationKin = $_POST['relationshipKin'];
    $contactKin = $_POST['contactKin'];

    $addEnroll = "INSERT INTO `nccinterest` (`nccWill`, `nccUnit`, `enrollNcc`, `enrollment`, `dissmissed`, `dissmissedDetails`, `nameKin`, `telephoneKin`, `relationKin`, `userID`) VALUES ('$willEnroll','$unit','$nccEnroll','$enroll','$isDiss','$dissDetails','$nameKin','$contactKin','$relationKin','$uniqueId')";

    $addEnroll = mysqli_query($conn,$addEnroll);

    $ifsc = $_POST['ifsc'];
    $accNo = $_POST['accNo'];
    $adharNo = $_POST['adharNo'];
    $panNo = $_POST['panNo'];

    $addBank = "INSERT INTO `bankdetails` (`ifscCode`, `accountNo`, `adharNo`, `panNo`, `userID`) VALUES ($ifsc,$accNo,$adharNo,$panNo,$uniqueId)";

    $addBank = mysqli_query($conn,$addBank);

    if($addPersonal && $addPhoto && $addAcademic && $addEnroll && $addBank){
        header("Location: alreadyEnroled.php");
    }else{
        echo "<script>alert('Something went wrong!')</script>";
    }
}


?>
