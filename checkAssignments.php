<?php

session_start();
require "connection.php";
$data;
if (isset($_SESSION["ut"])) {
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Teacher | Check Assignment</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="container-fluid assignment-check-page-background">
            <div class="row">
                <div class="col-12">
                    <div class="col-12 d-flex justify-content-center mt-5 mb-5">
                        <div class="col-9 mb-4 mt-5 my-profile-details-btt">
                            <div class="col-12 mt-5">
                                <h1 class="text-center fw-bold openSans-extraBold mb-5">CHECK STUDENTS ASSIGNMENT!</h1>
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="row pe-lg-5 ">
                                    <!--  nav bar -->
                                    <div class="col-12 col-lg-3 mb-5">
                                        <div class="row">
                                            <div class="row mt-3 ms-2">

                                                <div class="nav flex-column nav-pills me-3 my-3 " role="tablist" aria-orientation="vertical">
                                                    <nav class="nav flex-column ">

                                                        <nav class="nav nav-pills nav-fill px-2">
                                                            <a class="nav-link active bg-light text-black-50 fw-bold" href="#">Check assigments</a>
                                                        </nav>

                                                    </nav>
                                                </div>

                                                <div class=" col-12">
                                                    <div class="row">
                                                        <div class="col-12 darkbg">
                                                            <div class="row mx-1 my-2">
                                                                <div class="col-12 ul">

                                                                    <?php
                                                                    //show assignments with subject and assignment id which is added ny the relervent teacher

                                                                    $rs1 = Database::search("SELECT assignments.id AS aid,subjects.name   FROM `assignments` INNER JOIN `subjects` ON subjects.id = assignments.subjects_id WHERE assignments.teachers_id='" . $_SESSION["ut"]["id"] . "';");
                                                                    $n = $rs1->num_rows;
                                                                    if ($n > 0) {
                                                                        // echo $n;
                                                                        for ($i2 = 0; $i2 < $n; $i2++) {
                                                                            $data = $rs1->fetch_assoc();
                                                                    ?>
                                                                            <div id="<?php echo $i2; ?>" class="row li my-2" style="border-radius: 10px;">
                                                                                <p class="fs-5 text-center" onclick='parseAssignmentId(<?php echo $data["aid"]; ?>,<?php echo $i2; ?>);'><?php echo $data["name"] . " (AS_ID:" . $data["aid"] . ")";  ?></p>
                                                                            </div>

                                                                    <?php
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
                                        <div class="row">
                                            <table class="table scrolldiv">
                                                <thead class="table-dark">
                                                    <td>Student name</td>
                                                    <td>Assignment_id</td>
                                                    <td>Subject</td>
                                                    <td>Aswers</td>
                                                    <td>Marks</td>

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
            <div class="whatsapp_float text-end">
                <a class="homeAnchor" onclick="gototeacherarea()" target="_blank"><img src='Images/home.svg' width="100px" /></a>
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