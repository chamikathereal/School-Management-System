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

    <body>

        <div class="container-fluid assignment-page-background">
            <div class="container">
                <div class="col-12">
                    <div class="row">

                        <div class="col-12 d-flex justify-content-center mt-5 mb-5 my-profile-details-btt">
                            <div class="col-9 mb-4 mt-5 justify-content-center ">
                                <div class="col-12 mb-5">
                                    <div class="nav flex-column nav-pills me-3 mt-3 mb-5 " role="tablist" aria-orientation="vertical">
                                        <nav class="nav flex-column ">

                                            <nav class="nav nav-pills nav-fill px-2">
                                                <a class="nav-link active bg-success" aria-current="page" href="teacherRegistation.php">Teachers Registation</a>
                                                <a class="nav-link link-success" href="manageTeachers.php">Manage Teachers</a>
                                            </nav>

                                        </nav>
                                    </div>
                                    <hr>
                                </div>
                                <div class="col-12 mb-5 mt-5">
                                    <h1 class="text-center fw-bold openSans-extraBold mb-5">MANAGE TEACHER!</h1>

                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    <div class="col-12 mb-5">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="row">
                                                    <h5 class="text-danger  text-start ms3 mb-2" id="msg"></h5>
                                                </div>
                                                <form>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <label for="formGroupExampleInput">Select a teacher</label>
                                                            <select class="form-select" id="id" onchange='getDp("teacher");'>
                                                                <option value="0">Select a teacher</option>

                                                                <?php

                                                                $rs2 = Database::search("SELECT * FROM `teachers`;");


                                                                for ($i = 0; $i < $rs2->num_rows; $i++) {

                                                                    $data = $rs2->fetch_assoc();

                                                                ?>
                                                                    <option value="<?php echo $data["id"]; ?>"><?php echo $data["fname"] . " " . $data["lname"]; ?></option>

                                                                <?php
                                                                }


                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col mb-3">
                                                        <label for="formGroupExampleInput">Grade</label>
                                                        <input type="text" id="grade" class="form-control" placeholder="Select Grade">
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <label for="formGroupExampleInput">Select the Subject</label>
                                                            <select class="form-select" id="subject">
                                                                <option value="0">Select Subject</option>
                                                                <?php

                                                                $rs2 = Database::search("SELECT * FROM `subjects`;");


                                                                for ($i = 0; $i < $rs2->num_rows; $i++) {

                                                                    $data = $rs2->fetch_assoc();

                                                                ?>
                                                                    <option value="<?php echo $data["id"]; ?>"><?php echo $data["name"]; ?></option>

                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row ">
                                                        <div class="col">
                                                            <label for="formGroupExampleInput">Change the status</label>
                                                            <select class="form-select text-black-50 fs-5 text-center" id="status">
                                                                <option value="0">Select the status</option>
                                                                <?php
                                                                $rs3 = Database::search("SELECT* FROM `status`;");
                                                                for ($i2; $i2 < $rs3->num_rows; $i2++) {
                                                                    $data2 = $rs3->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo $data2["id"]; ?>"><?php echo $data2["name"]; ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                            <p class="fs-6 text-danger text-start">(If you need to change)</p>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-6 ">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-center mt-5">
                                                        <img src="Images/user (1).svg" class="assignment-img mx-auto" alt="" id="prev" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-5">
                                    <div class="col-7 mx-auto ">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary" onclick="updateTeacherByAdmin();">Upload Detals</button>
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