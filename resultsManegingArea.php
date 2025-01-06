<?php
session_start();
require "connection.php";

if (isset($_SESSION["uac"])) {
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Academic Officer | Result Manage</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="container-fluid assignment-check-page-background">
            <div class="row">
                <div class="col-12">
                    <div class="col-12 d-flex justify-content-center mt-5 mb-5">
                        <div class="col-9 mb-4 mt-5 check-aasignment">
                            <div class="col-12 mt-5">
                                <h1 class="text-center fw-bold openSans-extraBold mb-5">RESULT MANAGING AREA!</h1>
                                <hr>
                            </div>
                            <div class="col-12">

                                <div class="row pe-lg-5 ">

                                    <!--  nav bar -->
                                    <div class="col-12 col-lg-3">
                                        <div class="row">

                                            <div class="row mt-3 ms-2">

                                                <div class="nav flex-column nav-pills me-3 my-3 " role="tablist" aria-orientation="vertical">
                                                    <nav class="nav flex-column ">

                                                        <nav class="nav nav-pills nav-fill px-2">
                                                            <a class="nav-link active bg-light text-black-50 fw-bold" href="#">Check assigments</a>
                                                        </nav>

                                                    </nav>
                                                </div>

                                                <!-- show students which is segmented by assignments as a dash bord for selecting the assignment-->
                                                <div class=" col-12">
                                                    <div class="row">
                                                        <div class="col-12 darkbg">
                                                            <div class="row mx-1 my-2">
                                                                <div class="col-12 ul">

                                                                    <?php

                                                                    // echo $n;

                                                                    $rs2 = Database::search("SELECT DISTINCT assignments.id AS a_id FROM assignments  INNER JOIN
                                                                        resultsheets ON resultsheets.assignments_id = assignments.id INNER JOIN 
                                                                        teachers ON teachers.id = resultsheets.teachers_id  INNER JOIN 
                                                                        academic_officers_has_teachers ON academic_officers_has_teachers.teachers_id = teachers.id
                                                                        WHERE academic_officers_has_teachers.academic_officers_id = '" . $_SESSION["uac"]["id"] . "';
                                                                    ");
                                                                    $n2 = $rs2->num_rows;

                                                                    if ($n2 >= 1) {



                                                                        for ($i3 = 0; $i3 < $n2; $i3++) {
                                                                            $d2 = $rs2->fetch_assoc();
                                                                    ?>
                                                                            <p class="form-label fs-4  text-warning"><?php echo "AS_ID: " . $d2["a_id"]; ?></p>
                                                                            <hr />
                                                                            <?php


                                                                            $rs1 = Database::search("SELECT resultsheets.students_id AS s_id,resultsheets.assignments_id AS a_id, resultsheets.marks,students.fname,students.lname,students.id AS s_id FROM resultsheets  INNER JOIN
                                                                            students ON students.id = resultsheets.students_id INNER JOIN 
                                                                            teachers ON teachers.id = resultsheets.teachers_id INNER JOIN
                                                                            academic_officers_has_teachers ON academic_officers_has_teachers.teachers_id = teachers.id WHERE resultsheets.assignments_id = '" . $d2["a_id"] . "';");
                                                                            $n = $rs1->num_rows;

                                                                            if ($n >= 1) {


                                                                                for ($i2 = 0; $i2 < $n; $i2++) {
                                                                                    $data = $rs1->fetch_assoc();
                                                                            ?>
                                                                                    <div id="<?php echo $i2 . "_" . $i3; ?>" class="ms-1 row li my-2" style="border-radius: 10px;">
                                                                                        <p class="fs-5 text-center" onclick='parseAssignmentId2(<?php echo $data["a_id"]; ?>,<?php echo $i2; ?>,<?php echo $i3; ?>,<?php echo $data["s_id"]; ?>);'><?php echo $data["fname"] . " " . $data["lname"];  ?></p>
                                                                                    </div>

                                                                    <?php
                                                                                }
                                                                            }
                                                                        }
                                                                    }

                                                                    ?>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>

                                    </div>


                                    <!-- subbmited students table -->
                                    <div class="col-12 col-lg-9" style="margin-top: 90px;">
                                        <div class="row ">
                                            <table class="table scrolldiv">
                                                <thead class="table-dark">
                                                    <td>
                                                        <p class="form-label text-center"> Student_id</p>
                                                    </td>
                                                    <td>
                                                        <p class="form-label text-center">Marks</p>
                                                    </td>
                                                    <td>
                                                        <p class="form-label text-center">#</p>
                                                    </td>

                                                </thead>
                                                <tbody id="tbody">

                                                </tbody>
                                            </table>
                                            <!-- /details  -->
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="whatsapp_float text-end">
            <a class="homeAnchor" onclick="gotoAcademicfficerArea()" target="_blank"><img src='Images/home.svg' width="100px" /></a>
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