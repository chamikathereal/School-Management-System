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
        <div class="container-fluid assignment-check-page-background">
            <div class="row">
                <div class="col-12">
                    <div class="col-12 d-flex justify-content-center mt-5 mb-5">
                        <div class="col-9 mb-4 mt-5 student-lec-note-btt">
                            <div class="col-12 mt-5">
                                <h1 class="text-center fw-bold openSans-extraBold mb-5">STUDENT LECTURE NOTE!</h1>
                                <hr>
                            </div>
                            <div class="col-12">

                                <!--  nav bar -->
                                <div class="col-12 col-lg-4">
                                    <div class="row">

                                        <div class="nav flex-column nav-pills me-3 mt-3 " role="tablist" aria-orientation="vertical">
                                            <nav class="nav flex-column ">

                                                <nav class="nav nav-pills nav-fill px-5">
                                                    <a class="nav-link link-danger active bg-warning" aria-current="page" href="teacherRegistation.php">Lecture Notes </a>

                                                </nav>

                                            </nav>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-8"></div>
                                <!--  /nav bar -->

                                <!--  details   -->
                                <div class="col-12  offset-lg-1 col-lg-10 mt-5">
                                    <div class="row">
                                        <table class="table">
                                            <thead class="table-dark">
                                                <td>Assignment_id</td>
                                                <td>Subject</td>
                                                <td>topic</td>
                                                <td>PDF</td>


                                            </thead>
                                            <tbody>
                                                <?php
                                                $rs = Database::search("SELECT lecture_notes.id AS lsid, subjects.name AS lname,lecture_notes.topic, lecture_notes.pdf FROM `lecture_notes` INNER JOIN `subjects` ON `subjects`.`id` = `lecture_notes`.`subjects_id` WHERE `grade`='" . $_SESSION["us"]["grade"] . "'; ");
                                                $n = $rs->num_rows;
                                                if ($n >= 1) {


                                                    for ($i = 0; $i < $n; $i++) {
                                                        $d = $rs->fetch_assoc();
                                                ?>

                                                        <tr>
                                                            <td><?php echo $d["lsid"] ?></td>
                                                            <td><?php echo $d["lname"] ?></td>
                                                            <td><?php echo $d["topic"] ?></td>
                                                            <td><a class="link-danger" href="<?php echo $d['pdf'] ?>">
                                                                    <div class="col-10 offset-1">
                                                                        <div class="row d-grid">
                                                                            <lable for="pdfuploader" class="btn btn-danger">Download</lable>
                                                                        </div>
                                                                    </div>
                                                                </a>
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
?>