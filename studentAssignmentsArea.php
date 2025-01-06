<?php
session_start();
require "connection.php";
if (isset($_SESSION["us"])) {


    if ($_SESSION["us"]["payment_status_id"] == "3") {
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
        <title>CJ Academy | Teacher Panel | Check assigments</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="container-fluid assignment-page-background">
            <div class="row">
                <div class="col-12">
                    <div class="col-12 d-flex justify-content-center mt-5 mb-5">
                        <div class="col-9 mb-4 mt-5 student-lec-note-btt">
                            <div class="col-12 mt-5">
                                <h1 class="text-center fw-bold openSans-extraBold mb-5">CHECK STUDENTS ASSIGNMENT!</h1>
                                <hr>
                            </div>
                            <div class="col-12">
                                <div class="row pe-lg-5 ">
                                    <!--  nav bar -->
                                    <div class="col-12 col-lg-3 ">
                                        <div class="row">
                                            <div class="row mt-3 ms-2">

                                                <div class="nav flex-column nav-pills me-3 my-3 " role="tablist" aria-orientation="vertical">
                                                    <nav class="nav flex-column ">

                                                        <nav class="nav nav-pills nav-fill px-2">
                                                            <a class="nav-link active bg-light text-black-50 fw-bold" href="#">Check assigments</a>
                                                        </nav>

                                                    </nav>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <!-- subbmited students table -->
                                    <div class="col-12">
                                        <div class="col-11 mx-auto mb-5">
                                            <div class="row">
                                                <table class="table scrolldiv mb-5">
                                                    <thead class="table-dark">
                                                        <td>Assignment_id</td>
                                                        <td>Subject</td>
                                                        <td>Duration</td>
                                                        <td>PDF</td>
                                                        <td>Aswers</td>
                                                        <td>Marks</td>

                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $rs = Database::search("SELECT assignments.id AS asid, subjects.name AS sname,assignments.duration, assignments.pdf FROM `assignments` INNER JOIN `subjects` ON `subjects`.`id` = `assignments`.`subjects_id` WHERE `grade`='" . $_SESSION["us"]["grade"] . "'; ");
                                                        $n = $rs->num_rows;
                                                        if ($n >= 1) {


                                                            for ($i = 0; $i < $n; $i++) {
                                                                $d = $rs->fetch_assoc();
                                                        ?>

                                                                <tr>
                                                                    <td><?php echo $d["asid"] ?></td>
                                                                    <td><?php echo $d["sname"] ?></td>
                                                                    <td><?php echo $d["duration"] ?></td>
                                                                    <td><a class="link-danger" href="<?php echo $d['pdf'] ?>">
                                                                            <div class="col-10 offset-1">
                                                                                <div class="row d-grid">
                                                                                    <lable for="pdfuploader" class="btn btn-danger">Download</lable>
                                                                                </div>
                                                                            </div>
                                                                        </a>
                                                                    </td>
                                                                    <td>
                                                                        <div class=" col-10 offset-1 col-md-6  d-grid">

                                                                            <input class="d-none" type="file" accept="application/pdf,application/vnd.ms-exel" id="fileuploader" />
                                                                            <label class="btn btn-success" for="fileuploader" onclick=' uploadAnswers(<?php echo  $d["asid"]; ?>);'>Upload</label>
                                                                        </div>
                                                                    </td>
                                                                    <?php

                                                                    $rs4 = Database::search("SELECT * FROM `submissions` WHERE `assignments_id`='" . $d["asid"] . "' AND `students_id`='" . $_SESSION["us"]["id"] . "'; ");
                                                                    $my_marks = "pending";

                                                                    if ($rs4->num_rows >= 1) {
                                                                        $data4 = $rs4->fetch_assoc();
                                                                        $my_marks = $data4["marks"];
                                                                    }


                                                                    ?>
                                                                    <td>
                                                                        <div class="row mx-1 my-1 bg-success">
                                                                            <p class="text-center form-label text-warning"><?php echo $my_marks; ?></p>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                        <?php
                                                            }
                                                        }

                                                        ?>
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
                <a class="homeAnchor" onclick="gotoStudentarea();" target="_blank"><img src='Images/home.svg' width="100px" /></a>
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
