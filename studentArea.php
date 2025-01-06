<?php
session_start();
require "connection.php";

if (isset($_SESSION["us"])) {
    if ($_SESSION["us"]["payment_status_id"] == "4") {
?>
        <script>
            window.location = "studentsPaymentArea.php";
        </script>
    <?php
    }
    ?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>

    <body onload="getDp2()">

        <div class="container-fluid sign-page-background">
            <div class="row">
                <div class="col-12">
                    <div class="row">

                        <div class="col-12 d-flex justify-content-center mt-3 mb-3 ">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 mb-5 user-details">
                                        <h1 class="fw-bold text-center mt-5 mb-2 OpenSans-ExtraBold">WELCOME TO NEW JERSEY ACADEMY</h1>
                                    </div>
                                    <div class="col-12 sign-in-btt">
                                        <div class="row">
                                            <div class="col-6">
                                                <img src="Images/online-class.svg" class="teacher-img" alt="">
                                            </div>
                                            <div class="col-6 d-flex align-items-center justify-content-center ">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-center align-items-center">
                                                        <div class="row">
                                                            <div class="col-12 d-flex justify-content-center">
                                                                <p class="fs-5 fw-bold text-danger text-start">Trail period will expire after: <?php

                                                                    $d = new DateTime();
                                                                    $tz = new DateTimeZone("Asia/Colombo");
                                                                    $d->setTimezone($tz);
                                                                    $date = $d->format("Y-m-d");

                                                                    $dd = strval($date);

                                                                    $regDate = $_SESSION["us"]["date"];

                                                                    $dat1 = date_create($regDate);
                                                                    $dat2 = date_create($dd);

                                                                    $interval = date_diff($dat1, $dat2);
                                                                    $remaining = $interval->format('%m-%d');

                                                                    $aa = explode("-", $remaining);
                                                                    $months = $aa[0];
                                                                    $days = $aa[1];

                                                                    $dayremains = 30 - intval($days);
                                                                    echo $dayremains . " " . "Days";

                                                                    if ($dayremains == 30) {

                                                                        Database::iud("UPDATE `students` SET `payment_status_id` ='3' WHERE `id` = '" . $_SESSION["us"]["id"] . "';");
                                                                    }

                                                                    ?>
                                                                </p>
                                                            </div>
                                                            <div class="col-12 d-flex justify-content-center">
                                                                <img src="Images/user (1).svg" id="prev" class="user-details-img" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-center align-items-center mt-3 mb-2 user-details">
                                                        <h3 id="user-name" class="fw-bold m-2"></h3>

                                                        <?php
                                                        $rs3 =  Database::search("SELECT * FROM `students` WHERE `id` = '" . $_SESSION["us"]["id"] . "';");
                                                        $data3 = $rs3->fetch_assoc();

                                                        if ($data3["status_id"] == 1) {
                                                        ?>
                                                            <img src="Images/verified.svg" class="verified-badge" alt="">
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <!-- not verified -->
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="col-5 mt-3 mx-auto ">
                                                            <div class="d-grid gap-2">
                                                                <button class="btn btn-success" onclick="gotoStudentprofile();">My Profile</button>
                                                                <button class="btn btn-danger" onclick="signout();">Sign Out</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 user-details mt-5 d-flex justify-content-center">
                                        <div class="row">
                                            <div class="col-12 mb-3 d-flex justify-content-center">
                                                <img src="Images/student.svg" class="teaceher-icon" alt="">
                                            </div>
                                            <div class="col-12">
                                                <h1 class="fw-bold text-center mt-2 mb-2 OpenSans-ExtraBold">Welcome Student</h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="box">
                                            <div class="container">
                                                <div class="row">

                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                        <div class="box-part text-center">
                                                            <i class="bi bi-file-earmark-plus-fill icon-size"></i>
                                                            <div class="title mt-3">
                                                                <h4>Student Assignment</h4>
                                                            </div>

                                                            <div class="text">
                                                                <span>Effortlessly create assignments and stay organized with our 'Add Assignment' feature. Click to streamline your tasks now!</span>
                                                            </div>

                                                            <a href="#" onclick="gotoStudentAssignments();">Click Here</a>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                        <div class="box-part text-center">

                                                            <i class="bi bi-journal-plus icon-size"></i>

                                                            <div class="title mt-3">
                                                                <h4>Lecture Notes</h4>
                                                            </div>

                                                            <div class="text">
                                                                <span>Quickly verify assignments with our efficient tool. Upgrade your assessment process today with "Check Assignment".</span>
                                                            </div>

                                                            <a href="#" onclick="gotoStudentLectureNotes();">Click Here</a>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                                                        <div class="box-part text-center">

                                                            <i class="bi bi-credit-card-fill icon-size"></i>
                                                            <div class="title mt-3">
                                                                <h4>Payments</h4>
                                                            </div>

                                                            <div class="text">
                                                                <span>Enhance learning with ease using our Add Lecture Note feature. Access valuable resources anytime. Elevate your education journey today!</span>
                                                            </div>

                                                            <a href="#" onclick="gotoPaymentArea();">Click Here</a>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script src="script.js"></script>
    </body>

    </html>

<?php
} else {
?>

    <script>
        window.location = "index.php";
    </script>
<?php
}
