<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTC Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .grid-item .para {
            text-align: left;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 5rem 30rem auto;
            text-align: left;
        }

        .name {
            display: grid;
            grid-template-columns: 20rem !important;
        }

        .space {
            display: grid;
            grid-template-columns: 100rem 5rem !important;
        }

        .parts {
            display: grid;
            grid-template-columns: 5rem 90rem !important;
        }

        .grid-item {
            text-align: center;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <center>
        <h2><u>1 GUJARAT COMPO TECH COY NCC, AHMEDABAD</u></h2>
        <h3><u>RISK, VOLUNTEERING, SAFETY PRECAUTION & MEDICAL CERTIFICATE</u></h3>
        <div id="form">
            <div class="container">
                <div class="grid-container name">
                    <div class="grid-item">Name of Camp/Courses/Expendition:</div>

                </div>

                <div class="grid-container">
                    <div class="grid-item">
                        Place:
                    </div>
                    <div class="grid-item">
                        From:
                    </div>
                    <div class="grid-item">
                        To:
                    </div>
                </div>
                <div class="grid-container">
                    <div class="grid-item">
                        <p>Regtl No:</p>
                    </div>

                    <div class="grid-item">
                        <p>Rank:</p>
                    </div>

                    <div class="grid-item">
                        <p>Date of birth:</p>
                    </div>

                </div>
                <div class="grid-container">
                    <div class="grid-item">
                        <p>Name:</p>
                    </div>
                </div>
                <div class="grid-container">
                    <div class="grid-item">
                        <p>School/College:</p>
                    </div>
                </div>
                <div class="grid-container">
                    <div class="grid-item">
                        <p>Unit:</p>
                    </div>
                    <div class="grid-item">
                        <p><u style="font-weight: bold; font-size:large">1 Gujarat CTC NCC, Ahmedabad (Tele: 079-26300904)</u></p>
                    </div>
                </div>
                <center><u style="font-weight: bold; font-size:large">RISK VOLUNTEERING & SAFETY PRECAUTION CERTIFICATE</u></center>
                <p class="para">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; Volunteer to attend the above Camp/Course/Competition at my own risk. I also know that their may be deep water near the Camp site & area near the water edge is 'OUT OF BOUNDS' to cadets. I shall be doing so entirely at my own risk.</p>
                <div class="grid-container space">
                    <div class="grid-item ">
                        <p><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem;"></p>
                        <p>(Signature of cadet)</p>
                    </div>
                </div>
                <center><u style="font-weight: bold; font-size:large">COUNTERSIGNATURE OF CADETS PARENTS/GUARDIAN</u></center>
                <center>
                    <p>I agree to my son/ward attending the above Camp/Course/Traning Event at own risk.</p>
                </center>
                <div class="grid-container space">

                    <div class="grid-item">
                        <p><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem;"></p>
                        <p>(Signature of Parents/Guardian)</p>
                    </div>
                </div>
                <div class="grid-container parts">
                    <div class="grid-item">
                        Address:azjkmcxnjsxn dsjxn sx sm jsygsyavgvagvsgavgvssauiuoiajkanzjhjzhxvg
                    </div>
                    <div class="grid-item">
                        Name:
                    </div>
                </div>
                <div class="grid-container parts">
                    <div class="grid-item">
                        <p>Relation:</p>
                    </div>
                    <div class="grid-item">
                        <p>Telephone No. (Res/Mob/P.P)</p>
                    </div>
                </div>
                <div class="grid-container parts">
                    <div class="grid-item">
                        <p>Round Seal</p>
                    </div>
                    <div class="grid-item">
                        <p><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem;"></p>
                        <p>(Signature of Principle/Head Master)</p>
                    </div>
                </div>
                <div class="grid-container parts">
                    <div class="grid-item">
                        <p>Appendix 'B'</p>
                    </div>
                    <div class="grid-item">
                        <p>(Ref DG NCC New Delhi letter No. 4180/COC/DG/NCC/Trg dated 6 Oct 2004)</p>
                    </div>
                </div>
                <p class="para">&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;Certified that I have examined the above signed cadet in accordance with standard laid down in NCC act & Rules and found him/her fit to undergo training strenuous nature of Camp/Course/expendition/Traning event at the place and on the dates shown above.</p>
                <center>I also certify that the above mentioned cadet has been inculcated and vaccinated.</center>
                <div class="grid-container parts">
                    <div class="grid-item">Station:</div>
                    <div class="grid-item"><img src="images/logo.png" alt="" style="height: 3rem; width: 3rem;"><br>Signature of Medical Officer/Doctor(MBBS)<br>(Name in Capital letter Regtl No & seal)</div>

                </div>
                <div class="grid-container">
                    <div class="grid-item">Date:</div>
                </div>
            </div>

    </center>
    </div>
    <center>
        <input type="button" value="Print Registration Form" onclick="makepdf('form')">
    </center>

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