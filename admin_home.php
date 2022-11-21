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
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
    <!-- navigation bar  -->
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
    <section>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/image2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/image1.jpeg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="images/image3.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    <section class="mt-1 p-5">
        <center>
            <h4 class="heading"> AIM OF NCC</h4>
        </center>
        <p style="text-align: justify;">The ‘Aims’ of the NCC laid out in 1988 have stood the test of time and continue to meet the requirements expected of it in the current socio–economic scenario of the country. The NCC aims at developing character, comradeship, discipline, a secular outlook, the spirit of adventure and ideals of selfless service amongst young citizens. Further, it aims at creating a pool of organized, trained and motivated youth with leadership qualities in all walks of life, who will serve the Nation regardless of which career they choose. Needless to say, the NCC also provides an environment conducive to motivating young Indians to join the armed forces.</p>

        <div class="row" style="width: 100%;">
            <div class="col-md-4  text-center p-3 ">
                <div class="card p-3" style="border-radius: 1rem;">
                    <img src="https://cdnbbsr.s3waas.gov.in/s307811dc6c422334ce36a09ff5cd6fe71/uploads/2020/01/2020011464.jpg">
                    <p class="text-justify mt-3">To Create a Human Resource of Organized, Trained and Motivated Youth, To Provide Leadership in all Walks of life and be Always Available for the Service of the Nation.</p>
                </div>
            </div>
            <div class="col-md-4  text-center  p-3">
                <div class="card p-3" style="border-radius: 1rem;">
                    <img src="https://cdnbbsr.s3waas.gov.in/s307811dc6c422334ce36a09ff5cd6fe71/uploads/2020/01/2020011471.jpg">
                    <p class="text-justify mt-3"> To Provide a Suitable Environment to Motivate the Youth to Take Up a Career in the Armed Forces.<br><br></p>
                </div>
            </div>
            <div class="col-md-4  text-center  p-3 ">
                <div class="card p-3" style="border-radius: 1rem;">
                    <img src="https://cdnbbsr.s3waas.gov.in/s307811dc6c422334ce36a09ff5cd6fe71/uploads/2020/01/2020011493.jpg">
                    <p class="text-justify mt-3">To Develop Character, Comradeship, Discipline, Leadership, Secular Outlook, Spirit of Adventure, and Ideals of Selfless Service amongst the Youth of the Country.</p>
                </div>
            </div>
        </div>
    </section>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>