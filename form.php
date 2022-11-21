<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;1,100&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" />

    <!-- <link rel="stylesheet" href="css/style.css"> -->
    <link rel="stylesheet" href="css/mycss.css">

    <script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/umd-popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <title>Vishwakarma Government Engineering College</title>

    <style>
        /*
    *
    * ==========================================
    * CUSTOM UTIL CLASSES
    * ==========================================
    *
    */
        /* body {
            font-family: 'Poppins', sans-serif;

        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>a:after {
            content: "\f0da";
            float: right;
            border: none;
            font-family: "FontAwesome";
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: 0px;
            margin-left: 0px;
        } */

        /*
    *
    * ==========================================
    * FOR DEMO PURPOSES
    * ==========================================
    *
    */

        /* @media (min-width: 992px) {
            .dropdown-menu {
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
            margin-left: -1px;
            -webkit-border-radius: 0 6px 6px 6px;
            -moz-border-radius: 0 6px 6px;
            border-radius: 0 6px 6px 6px;
        }

        .dropdown-submenu:hover>.dropdown-menu {
            display: block;
        }

        .dropdown-submenu>a:after {
            display: block;
            content: " ";
            float: right;
            width: 0;
            height: 0;
            border-color: transparent;
            border-style: solid;
            border-width: 5px 0 5px 5px;
            border-left-color: #ccc;
            margin-top: 5px;
            margin-right: -10px;
        }

        .dropdown-submenu:hover>a:after {
            border-left-color: #fff;
        }

        .dropdown-submenu.pull-left {
            float: none;
        }

        .dropdown-submenu.pull-left>.dropdown-menu {
            left: -100%;
            margin-left: 10px;
            -webkit-border-radius: 6px 0 6px 6px;
            -moz-border-radius: 6px 0 6px 6px;
            border-radius: 6px 0 6px 6px;
        } */
    </style>
    <script>
        $(function() {
            // ------------------------------------------------------- //
            // Multi Level dropdowns
            // ------------------------------------------------------ //
            $("ul.dropdown-menu [data-toggle='dropdown']").on(
                "click",
                function(event) {
                    event.preventDefault();
                    event.stopPropagation();

                    $(this).siblings().toggleClass("show");

                    if (!$(this).next().hasClass("show")) {
                        $(this)
                            .parents(".dropdown-menu")
                            .first()
                            .find(".show")
                            .removeClass("show");
                    }
                    $(this)
                        .parents("li.nav-item.dropdown.show")
                        .on("hidden.bs.dropdown", function(e) {
                            $(".dropdown-submenu .show").removeClass("show");
                        });
                }
            );
        });
    </script>
</head>

<body>

    <section id="cor"></section>
    <form action="#" method="post" enctype="multipart/form-data">
        <div id="page">
            <div class="col-md-8 mx-auto my-5">
                <h2 class="dept-title">1. PERSONAL DETAILS</h2>
                <div class="px-3 mb-4 pt-3 apply" style="border: 1px solid #003865">
                    <!-- <h4 class="headingsall bg-light"></h4> -->
                    <form action="#" method="post" enctype="multipart/form-data">

                        <!------------------------------- names ----------------------------------------->
                        <!-- oninput="validateText(this)" -->
                        <div class="row">
                            <div class="headingsall col-md-4">
                                <label for="s_fname" class="col-form-label">Your Name:*</label>
                                <input type="text" class="form-control" placeholder="First Name" name="s_fname" id="s_fname" required="true" pattern="[a-zA-Z][a-zA-Z\s]*" required title="First Name contains only character(s)." maxlength="30" />
                            </div>
                            <div class="headingsall col-md-4">
                                <label for="s_mname" class="col-form-label">&nbsp;</label>
                                <input type="text" class="form-control" placeholder="Middle Name" name="s_mname" id="s_mname" required="true" pattern="[a-zA-Z\s][a-zA-Z\s]*" required title="Middle Name contains only character(s)." maxlength="30" />
                            </div>
                            <div class="headingsall col-md-4">
                                <label for="s_lname" class="col-form-label">&nbsp;</label>
                                <input type="text" class="form-control" placeholder="Last Name" name="s_lname" id="s_lname" required="true" pattern="[a-zA-Z\s][a-zA-Z\s]*" required title="Last Name contains only character(s)." maxlength="30" />
                            </div>
                        </div>

                        <!------------------------ Birthday ----------------------------------------->
                        <div class="row">
                            <div class="headingsall col-md-6 my-2">
                                <label for="birthday">Birthday:</label><br>
                                <input type="date" class="form-control" id="birthday" name="birthday" style="width: inherit;color: #495057; border: 1px solid #ced4da;" required="true" />
                            </div>


                            <!------------------------ nationality ----------------------------------------->

                            <div class=" headingsall col-md-6">
                                <label for="national" class="col-form-label">Nationality:*</label>
                                <select name="national" class="form-control" required>
                                    <option value="indian" disabled selected>Indian</option>
                                </select>
                            </div>
                        </div>

                        <!------------------------------- father's name ----------------------------------------->
                        <div class="row">
                            <div class="headingsall col-md-4">
                                <label for="f_fname" class="col-form-label">Father's Name:*</label>
                                <input type="text" class="form-control" placeholder="Father's Name" name="f_fname" id="f_name" required="true" pattern="[a-zA-Z][a-zA-Z\s]*" required title="First Name contains only character(s)." maxlength="30" />
                            </div>
                            <div class="headingsall col-md-4">
                                <label for="f_mname" class="col-form-label">&nbsp;</label>
                                <input type="text" class="form-control" placeholder="Middle Name" name="f_mname" id="f_mname" required="true" pattern="[a-zA-Z\s][a-zA-Z\s]*" required title="Middle Name contains only character(s)." maxlength="30" />
                            </div>
                            <div class="headingsall col-md-4">
                                <label for="f_lname" class="col-form-label">&nbsp;</label>
                                <input type="text" class="form-control" placeholder="Last Name" name="f_lname" id="f_lname" required="true" pattern="[a-zA-Z\s][a-zA-Z\s]*" required title="Last Name contains only character(s)." maxlength="30" />
                            </div>
                        </div>

                        <!------------------------------- mother's name ----------------------------------------->
                        <!-- oninput="validateText(this)" -->
                        <div class="row">
                            <div class="headingsall col-md-4">
                                <label for="m_fname" class="col-form-label">Mother's Name:*</label>
                                <input type="text" class="form-control" placeholder="Mother's Name" name="m_fname" id="m_name" required="true" pattern="[a-zA-Z][a-zA-Z\s]*" required title="First Name contains only character(s)." maxlength="30" />
                            </div>
                            <div class="headingsall col-md-4">
                                <label for="m_mname" class="col-form-label">&nbsp;</label>
                                <input type="text" class="form-control" placeholder="Middle Name" name="m_mname" id="m_mname" required="true" pattern="[a-zA-Z\s][a-zA-Z\s]*" required title="Middle Name contains only character(s)." maxlength="30" />
                            </div>
                            <div class="headingsall col-md-4">
                                <label for="m_lname" class="col-form-label">&nbsp;</label>
                                <input type="text" class="form-control" placeholder="Last Name" name="m_lname" id="m_lname" required="true" pattern="[a-zA-Z\s][a-zA-Z\s]*" required title="Last Name contains only character(s)." maxlength="30" />
                            </div>
                        </div>

                        <!------------------------ Residential Address:* ----------------------------------------->
                        <div class="row">
                            <div class="headingsall col-md-12">
                                <label for="email" class="mt-4">Residential Address: (Landmark, State, Distt,
                                    Taluka, City/Vill, Pin Code)
                                    *</label><br>
                                <textarea id="res" class="form-control" name="res" required maxlength="200" style="width: inherit;color: #495057; border: 1px solid #ced4da;" placeholder="Enter Residential Address">

                                </textarea>

                                <!------------------------ Contact No:*----------------------------------------->
                                <div class="headingsall">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="usr">Contact No:*</label>
                                            <input type="text" class="form-control" id="contact" pattern="[6-9]{1}[0-9]{9}" required title="Enter valid Contact No." maxlength="10" placeholder="Enter Contact No">
                                        </div>
                                        <!------------------------ Email ----------------------------------------->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email address:*</label>
                                                <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required title="Enter valid Email Id." class="form-control" maxlength="50" id="email" placeholder="Enter Email ID">
                                            </div>
                                        </div>
                                    </div>


                                    <!------------------------ Sex ----------------------------------------->
                                    <div class="row">
                                        <div class="radio d-md-flex col-md-6" style="align-items: center;">
                                            <label for="sex" class="col-form-label">Sex:*</label>
                                            <div class="form-check mx-md-3 my-1">
                                                <input type="radio" class="mx-md-1" name="sex" checked id="maleRadio" value="Male">Male
                                            </div>
                                            <div class="form-check mx-mf-3 my-1">
                                                <input type="radio" class="mx-md-1" name="sex" id="femaleRadio" value="Female">Female
                                            </div>
                                        </div>


                                        <!------------------------ Blood Group ----------------------------------------->
                                        <div class="col-md-6">
                                            <label for="bgroup" class="col-form-label">Blood Group:*</label>
                                            <select name="bgroup" class="form-control" required>
                                                <option value="" disabled selected>Select Blood Group</option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <!------------------------------- station ----------------------------------------->

                                <div class="row  mb-5">
                                    <div class="mt-3 headingsall col-md-6">
                                        <label for="station" class="col-form-label">Nearest Railway Station:*</label>
                                        <input type="text" class="form-control" placeholder="Enter Nearest Railway Station" name="rstation" id="rstation" required="true" maxlength="30" />
                                    </div>
                                    <div class="mt-3 headingsall col-md-6">
                                        <label for="station" class="col-form-label">Nearest Police Station:*</label>
                                        <input type="text" class="form-control" maxlength="30" placeholder="Enter Nearest Police Station" name="pstation" id="pstation" required="true" />
                                    </div>
                                </div>


                                <!------------------------ photo upload btn ----------------------------------------->
                                <br>
                                <div class="row">
                                    <div class="col-md-4 mb-5">
                                        <label for="photo" class="col-form-label">Upload Photo:*</label><br>
                                        <input type="file" name="studentphoto" id="imgPhoto" class="upload" required accept=".png, .jpg, .jpeg, .pdf">
                                    </div>
                                    <!------------------------ photo upload btn ----------------------------------------->
                                    <div class="col-md-4">
                                        <label for="photo" class="col-form-label">Upload signature:*</label><br>
                                        <input type="file" name="studentsign" id="imgSign" class="upload" required accept=".png, .jpg, .jpeg, .pdf">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="photo" class="col-form-label">Upload Pass Book:*</label><br>
                                        <input type="file" name="studentsign" id="imgpass" class="upload" required accept=".png, .jpg, .jpeg, .pdf">
                                    </div>
                                </div>
                            </div>

                        </div>
                </div>
            </div>

        </div>

        <div id="page">
            <div class="col-md-8 mx-auto my-5">
                <h2 class="dept-title">2. ACADEMIC DETAILS</h2>
                <div class="px-3 mb-4 pt-3 apply" style="border: 1px solid #003865">
                    <!-- <h4 class="headingsall bg-light"></h4> -->
                    <!-- <form action="/scstgrievance.php" method="post" enctype="multipart/form-data"> -->
                    <div class="headingsall">

                        <!------------------------ Qualification ----------------------------------------->
                        <div class="row">
                            <div class="col-md-6">
                                <label for="qua" class="col-form-label">Educational
                                    Qualifications
                                    :*</label>
                                <select name="qua" id="qua" class="form-control" required>
                                    <option disabled selected>Select
                                        Qualifications
                                    </option>
                                    <option value="BE">10th</option>
                                    <option value="ME">12th</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="headingsall">
                                    <label for="marks" class="col-form-label">Marks:*</label>
                                    <input type="text" class="form-control" maxlength="10" placeholder="Enter Marks" name="marks" id="marks" required="true" />
                                </div>
                            </div>
                        </div>

                        <!------------------------------- Marks ----------------------------------------->

                        <div class="row">
                            <div class="headingsall col-md-12">
                                <label for="identification" class="col-form-label">Identification Marks
                                    (at least two)
                                    :*</label>
                                <input type="text" class="form-control" placeholder="Identification Marks" name="identification" id="identification" maxlength="10" required="true" />
                            </div>
                        </div>

                        <!------------------------ criminal ----------------------------------------->
                        <div class="row">
                            <div class="radio d-md-flex col-md-12" style="align-items: center;">
                                <label for="s_name" class="col-form-label">Have you ever been
                                    convicted by a criminal
                                    court?
                                    :*</label>
                                <div class="form-check mx-md-3 my-1">
                                    <input type="radio" class="mx-md-1" name="criminal" id="yesRadio" value="Yes">Yes
                                </div>
                                <div class="form-check mx-mf-3 my-1">
                                    <input type="radio" class="mx-md-1" name="criminal" checked id="noRadio" value="No">No
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="headingsall col-md-12">
                                <label for="sentence" class="col-form-label">if so in what
                                    circumstances and what
                                    was the sentence?

                                    :*</label>
                                <input type="text" class="form-control" placeholder="sentence Marks" name="sentence" id="sentence" maxlength="20" />
                            </div>
                        </div>


                        <!------------------------------- scl/clg ----------------------------------------->

                        <div class="row">
                            <div class="radio d-md-flex col-md-8" style="display:flex; align-items: center;">
                                <label for="s_name" class="col-form-label">Select School/college
                                    :*</label>
                                <div class="form-check mx-md-3 my-1">
                                    <input type="radio" class="mx-md-1" name="scl/clg" id="scl" value="School">School
                                </div>
                                <div class="form-check mx-mf-3 my-1">
                                    <input type="radio" class="mx-md-1" name="scl/clg" checked id="clg" value="Collgege">College
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label for="s_dept" class="col-form-label">Stream
                                    :*</label>
                                <select name="stream" id="stream" class="form-control" required>
                                    <option value="" disabled selected>Science
                                    </option>
                                    <option value="BE">Commerce</option>
                                    <option value="ME">Arts</option>
                                </select>
                            </div>

                        </div>
                        <div class="row">
                            <div class="headingsall col-md-12 mb-5">
                                <label for="scl/clg" class="col-form-label">Name of School/College
                                    :*</label>
                                <input type="text" class="form-control" placeholder="School/college Name" name="scl/clg" id="scl/clg" maxlength="30" />
                            </div>
                        </div>




                    </div>

                </div>
            </div>
        </div>
        </div>


        <div id="page">
            <div class="col-md-8 mx-auto my-5">
                <h2 class="dept-title">3. NCC INTERESET</h2>
                <div class="px-3 mb-4 pt-3 apply" style="border: 1px solid #003865">
                    <!------------------------------- radio ----------------------------------------->

                    <div class="row">
                        <div class="radio d-md-flex col-md-12" style="align-items: center;">
                            <label for="s_name" class="col-form-label">Willing to be enrolled
                                and undergo training
                                under the National Cadet
                                Corps Act, 1948

                                :*</label>
                            <div class="form-check mx-md-3 my-1">
                                <input type="radio" class="mx-md-1" name="criminal" id="yesRadio" value="Yes">Yes
                            </div>
                            <div class="form-check mx-mf-3 my-1">
                                <input type="radio" class="mx-md-1" name="criminal" checked id="noRadio" value="No">No
                            </div>
                        </div>
                    </div>


                    <!------------------------------- unit to be enroll ----------------------------------------->

                    <div class="row">
                        <div class="headingsall col-md-12">
                            <label for="unit" class="col-form-label">NCC unit to be
                                enrolled in

                                :*</label>
                            <input type="text" class="form-control" placeholder="NCC unit to be enrolled in" name="unit" id="unit" maxlength="30" />
                        </div>
                    </div>


                    <!------------------------------- radio ----------------------------------------->

                    <div class="row">
                        <div class="radio d-md-flex col-md-12" style="align-items: center;">
                            <label for="s_name" class="col-form-label">Have you been
                                enrolled in NCC
                                earlier.

                                :*</label>
                            <div class="form-check mx-md-3 my-1">
                                <input type="radio" class="mx-md-1" name="criminal" id="yesRadio" value="Yes">Yes
                            </div>
                            <div class="form-check mx-md-3 my-1">
                                <input type="radio" class="mx-md-1" name="criminal" checked id="noRadio" value="No">No
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="headingsall col-md-12">
                            <label for="enroll" class="col-form-label">If yes,
                                Your Enrolment No.
                                :*</label>
                            <input type="text" class="form-control" pattern="[6-9]{1}[0-9]{9}" required title="Enter valid Enrollment No." maxlength="12" placeholder="Enrollment No." name="enroll" id="enroll" required="true" />
                        </div>
                    </div>


                    <!------------------------------- radio ----------------------------------------->

                    <div class="row">
                        <div class="radio d-md-flex col-md-12" style="align-items: center;">
                            <label for="s_name" class="col-form-label">Have you been
                                dismissed from NCC/
                                the Territorial Army/
                                the Indian Armed Forces


                                :*</label>
                            <div class="form-check mx-md-3 my-1">
                                <input type="radio" class="mx-md-1" name="criminal" id="yesRadio" value="Yes">Yes
                            </div>
                            <div class="form-check mx-mf-3 my-1">
                                <input type="radio" class="mx-md-1" name="criminal" checked id="noRadio" value="No">No
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="headingsall col-md-12">
                            <label for="enroll" class="col-form-label">Please provide details
                                :*</label>
                            <textarea id="res" class="form-control" name="res" required maxlength="200" style="width: inherit;color: #495057; border: 1px solid #ced4da;" placeholder="Provide Details Here">

                                </textarea>

                        </div>
                    </div>

                    <!------------------------------- Next of kin with address ----------------------------------------->

                    <div class="row">
                        <div class="headingsall col-md-6">
                            <label for="add" class="col-form-label">Next of kin with address
                                :*</label>
                            <input type="text" class="form-control" maxlength="30" placeholder="Address" name="add" id="add" required="true" />


                        </div>

                        <div class="headingsall col-md-6">
                            <label for="enroll" class="col-form-label">Relationship
                                :*</label>
                            <input type="text" class="form-control" maxlength="12" placeholder="Enrollment No." name="relationship" id="relationship" required="true" />


                        </div>
                    </div>


                    <div class="row">
                        <div class="mt-3 headingsall col-md-6">
                            <label for="teleno" class="col-form-label">Telephone No:*</label>
                            <input type="text" class="form-control mb-5" pattern="[6-9]{1}[0-9]{9}" required title="Enter valid Contact No." maxlength="10" placeholder="Telephone No." name="teleno" id="teleno" required="true" />
                        </div>


                    </div>
                </div>
            </div>
        </div>


        <div id="page">
            <div class="col-md-8 mx-auto my-5">
                <h2 class="dept-title">4. BANKING DETAILS</h2>
                <div class="px-3 mb-4 pt-3 apply" style="border: 1px solid #003865">
                    <!-- <form action="/scstgrievance.php" method="post" enctype="multipart/form-data"> -->
                    <div class="headingsall">

                        <!------------------------ IFSC:*----------------------------------------->
                        <label for="usr" class="my-2">Banker's detail/
                            IFSC Code
                            :*</label>
                        <input type="text" class="form-control" id="baccount" required title="IFSC. Code" maxlength="11" placeholder="Enter 11 digit IFSC">

                        <!------------------------ Bank Acc:*----------------------------------------->
                        <label for="usr" class="my-2">Bank Acct No. of
                            Cadet/Parent
                            :*</label>
                        <input type="text" class="form-control" id="baccount" pattern="[0-9]{9,18}" required maxlength="18" title="Bank Account number should be 9 to 18 digits long." placeholder="Bank Acct No.">

                        <!------------------------ Aadhaar/UID No.:*----------------------------------------->
                        <label for="usr" class="my-2">Aadhaar/UID No.
                            (If allotted)

                            :*</label>
                        <input type="text" class="form-control" id="baccount" pattern="[0-9]{9,18}" maxlength="18" title="Aadhaar/UID No. should be 9 to 18 digits long." placeholder="Aadhaar/UID No.">

                        <!------------------------ Aadhaar/UID No.:*----------------------------------------->
                        <label for="usr" class="my-2">PAN Card No.
                            (If allotted)

                            :*</label>
                        <input type="text" class="form-control" id="baccount" pattern="[0-9]{9,18}" maxlength="18" title="Pan number should be 9 to 18 digits long." placeholder="PAN Card No.">
                        <br>
                    </div>
                </div>
            </div>
        </div>



    </form>







    <!-- jQuery -->
    <!-- <script src="js/9354-js-jquery.min.js"></script> -->

    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script> -->
    <script src="js/js-bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>