<?php

session_start();
require "connection.php";

if (isset($_SESSION["ua"])) {
?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Admin Panel</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>

    <body onload='getDpAdmin("admin");'>

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
                                                                <img src="Images/user (1).svg" id="prev" class="user-details-img" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-center align-items-center mt-3 mb-2 user-details">
                                                        <h3 class="fw-bold m-2" id="name"></h3>
                                                        <img src="Images/verified.svg" class="verified-badge" alt="">
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="col-5 mt-3 mx-auto ">
                                                            <div class="d-grid gap-2">
                                                                <button class="btn btn-success" onclick="gotoAdminprofile();">My Profile</button>
                                                                <button class="btn btn-danger" onclick="signout();">Sign Out</button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <?php

                                            $rs1 = Database::search("SELECT * FROM `students`;");
                                            $rs2 = Database::search("SELECT * FROM `teachers`;");
                                            $rs3 = Database::search("SELECT * FROM `academic_officers`;");

                                            $data1 = intval($rs1->num_rows); //getting students amount
                                            $data2 = intval($rs2->num_rows); // getting teachers amount
                                            $data3 = intval($rs3->num_rows); //getting accedemic officer amount





                                            ?>

                                            <div class="col-12 d-flex justify-content-center mb-5 text-center">
                                                <div class="row">

                                                    <div class="card mx-3" style="width: 15rem; height: 15rem;">
                                                        <div class="card-body text-center"> <!-- Added 'text-center' class here -->
                                                            <h5 class="card-title text-center" style="margin-top: 70px;">Students</h5>
                                                            <p class="fs-5 text-success text-center fw-bold"><?php echo $data1; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="card mx-3" style="width: 15rem; height: 15rem;">
                                                        <div class="card-body text-center"> <!-- Added 'text-center' class here -->
                                                            <h5 class="card-title text-center" style="margin-top: 70px;">Teachers</h5>
                                                            <p class="fs-5 text-danger text-center fw-bold"><?php echo $data2; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="card mx-3" style="width: 15rem; height: 15rem;">
                                                        <div class="card-body text-center"> <!-- Added 'text-center' class here -->
                                                            <h5 class="card-title text-center" style="margin-top: 70px;">Academic Officers</h5>
                                                            <p class="fs-5 text-info text-center fw-bold"><?php echo $data3; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="card mx-3" style="width: 15rem; height: 15rem;">
                                                        <div class="card-body text-center"> <!-- Added 'text-center' class here -->
                                                            <h5 class="card-title text-center" style="margin-top: 70px;">All staff members</h5>
                                                            <p class="fs-5 text-warning text-center fw-bold"><?php echo $data2 + $data3; ?></p>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-12 d-flex justify-content-center mb-5 text-center">
                                                <div class="row">

                                                    <?php
                                                    //calculating revanue tasks
                                                    $rs4 = Database::search("SELECT * FROM `payment`;");

                                                    $monthly = 0;
                                                    $semesterly = 0;
                                                    $yearly = 0;

                                                    $n4 = $rs4->num_rows;
                                                    $today = date("Y-m-d");

                                                    $thisMonth = date("m");
                                                    $thisYear = date("Y");

                                                    for ($i = 0; $i < $n4; $i++) {

                                                        $d = $rs4->fetch_assoc();
                                                        $date1 = $d["date"];

                                                        $date2 = explode(" ", $date1);

                                                        $date = $date2[0];



                                                        $dateSplit = explode("-", $date);

                                                        $month = $dateSplit[1];
                                                        $year = $dateSplit[0];

                                                        if ($month == $thisMonth) {
                                                            $monthly = $monthly + $d["amount"];
                                                        }

                                                        if ($month == $thisMonth + 3) {
                                                            $semesterly =  $semesterly + $d["amount"];
                                                        }

                                                        if ($year == $thisYear) {
                                                            $yearly = $yearly + $d["amount"];
                                                        }
                                                    }

                                                    ?>

                                                    <div class="card mx-3" style="width: 15rem; height: 15rem;">
                                                        <div class="card-body text-center"> <!-- Added 'text-center' class here -->
                                                            <h5 class="card-title text-center" style="margin-top: 70px;">Monthly Revenue</h5>
                                                            <p class="fs-5 text-warning text-center fw-bold">Rs:<?php echo " " . number_format($monthly) . "/="; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="card mx-3" style="width: 15rem; height: 15rem;">
                                                        <div class="card-body text-center"> <!-- Added 'text-center' class here -->
                                                            <h5 class="card-title text-center" style="margin-top: 70px;">Sementer Revenue</h5>
                                                            <p class="fs-5 text-info text-center fw-bold">Rs:<?php echo " " . number_format($semesterly) . "/="; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="card mx-3" style="width: 15rem; height: 15rem;">
                                                        <div class="card-body text-center"> <!-- Added 'text-center' class here -->
                                                            <h5 class="card-title text-center" style="margin-top: 70px;">Yeally Officers</h5>
                                                            <p class="fs-5 text-danger text-center fw-bold">Rs:<?php echo " " . number_format($yearly) . "/="; ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="card mx-3" style="width: 15rem; height: 15rem;">
                                                        <div class="card-body text-center"> <!-- Added 'text-center' class here -->
                                                            <h5 class="card-title text-center" style="margin-top: 70px;">Total Revenue</h5>
                                                            <p class="fs-5 text-success text-center fw-bold">Rs:<?php echo " " . number_format($monthly + $semesterly + $yearly) . "/="; ?></p>
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

                                                    <div class="col-lg-3 col-md-43 col-sm-3 col-xs-12">

                                                        <div class="box-part text-center">
                                                            <i class="bi bi-person-square icon-size"></i>
                                                            <div class="title mt-3">
                                                                <h4>Academic Officers</h4>
                                                            </div>

                                                            <div class="text">
                                                                <span>Streamline assignments with our 'Academic Officer' in the Student Management System. Simplify task organization. Try now!</span>
                                                            </div>

                                                            <a href="#" onclick="gotoAdademicOficers();">Click Here</a>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-43 col-sm-3 col-xs-12">

                                                        <div class="box-part text-center">

                                                            <i class="bi bi-people-fill icon-size"></i>
                                                            <div class="title mt-3">
                                                                <h4>Teachers</h4>
                                                            </div>

                                                            <div class="text">
                                                                <span>Simplify tasks with the 'Teacher' feature in our Student Management System. Organize assignments seamlessly. Explore today!</span>
                                                            </div>

                                                            <a href="#" onclick="gotoTeachers();">Click Here</a>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-43 col-sm-3 col-xs-12">

                                                        <div class="box-part text-center">

                                                            <i class="bi bi-people icon-size"></i>

                                                            <div class="title mt-3">
                                                                <h4>Students</h4>
                                                            </div>

                                                            <div class="text">
                                                                <span>Master task management using the 'Student' feature in our Online Student Management System. Easily handle assignments. Get started!</span>
                                                            </div>

                                                            <a href="#" onclick="mangeStudents();">Click Here</a>

                                                        </div>
                                                    </div>

                                                    <div class="col-lg-3 col-md-43 col-sm-3 col-xs-12">

                                                        <div class="box-part text-center">

                                                            <i class="bi bi-check-square-fill icon-size"></i>
                                                            <div class="title mt-3">
                                                                <h4>Marks</h4>
                                                            </div>

                                                            <div class="text">
                                                                <span>Effortlessly manage student assignment marks. Stay updated, organized, and in control. Try it out now!</span>
                                                            </div>

                                                            <a href="#" onclick="gotoResultsArea();">Click Here</a>

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
?>