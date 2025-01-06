<?php

session_start();
require "connection.php";
if (isset($_SESSION["ua"])) {
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Academic Officer | View Result</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>

    <body>

        <div class="container-fluid assignment-page-background">
            <div class="container">
                <div class="col-12">
                    <div class="row">

                        <div class="col-12 d-flex justify-content-center mt-5 mb-5 my-profile-btt">
                            <div class="col-9 mb-4 justify-content-center ">
                                <div class="col-12 mb-5 mt-5">
                                    <h1 class="text-center fw-bold openSans-extraBold mb-5">STUDENTS RESULTS!</h1>
                                    <hr>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    <div class="col-12 mb-5">
                                        <div class="row">

                                            <!--  nav bar -->
                                            <div class="col-12 col-lg-4">
                                                <div class="row">

                                                    <div class="nav flex-column nav-pills me-3 mt-3 " role="tablist" aria-orientation="vertical">
                                                        <nav class="nav flex-column ">

                                                            <nav class="nav nav-pills nav-fill px-2">
                                                                <a class="nav-link link-danger active bg-danger" aria-current="page" href="">Results</a>

                                                            </nav>

                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--  /nav bar -->

                                            <!--  details   -->
                                            <div class="col-12  mt-5">
                                                <div class="row">
                                                    <table class="table">
                                                        <thead class="table-dark">
                                                            <td>Student Name</td>
                                                            <td>Subject</td>
                                                            <td>Assignment_id</td>
                                                            <td>Marks</td>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            $rs = Database::search("SELECT students.fname,students.lname,subjects.name AS sname,assignments_id,submissions.marks FROM submissions INNER JOIN 
                                                                assignments ON assignments.id = submissions.assignments_id INNER JOIN 
                                                                subjects ON subjects.id = assignments.subjects_id INNER JOIN 
                                                                students ON students.id = submissions.students_id;");
                                                            $n = $rs->num_rows;
                                                            if ($n >= 1) {


                                                                for ($i = 0; $i < $n; $i++) {
                                                                    $d = $rs->fetch_assoc();
                                                            ?>

                                                                    <tr>
                                                                        <td><?php echo $d["fname"] . " " . $d["lname"]; ?></td>
                                                                        <td><?php echo $d["sname"] ?></td>
                                                                        <td><?php echo $d["assignments_id"] ?></td>
                                                                        <td><?php echo $d["marks"] ?></td>
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
            </div>
            <div class="whatsapp_float text-end">
                <a class="homeAnchor" onclick="gotoAdminPanel()" target="_blank"><img src='Images/home.svg' width="100px" /></a>
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