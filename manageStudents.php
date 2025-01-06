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
                            <div class="col-9 mb-4 justify-content-center ">
                                <div class="col-12 mb-5 mt-5">
                                    <h1 class="text-center fw-bold openSans-extraBold mb-5">MANAGE STUDENTS!</h1>
                                    <hr>
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
                                                            <label for="formGroupExampleInput">Select a student</label>
                                                            <select class="form-select" id="id" onchange='getDp("student");'>
                                                                <option value="0">Select a student</option>

                                                                <?php

                                                                $rs2 = Database::search("SELECT * FROM `students`;");


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

                                                    <div class="col mb-3">
                                                        <label for="formGroupExampleInput">Payment Status</label>
                                                        <input type="text" id="payment" class="form-control" placeholder="Payment">
                                                        
                                                    </div>

                                                    <div class="row ">
                                                        <div class="col">
                                                            <label for="formGroupExampleInput">Change the status</label>
                                                            <select class="form-select" id="status">
                                                                <option value="0">Select the status</option>
                                                                <?php
                                                                $rs3 = Database::search("SELECT * FROM `status`;");
                                                                for ($i2; $i2 < $rs3->num_rows; $i2++) {
                                                                    $data3 = $rs3->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo $data3["id"]; ?>"><?php echo $data3["name"]; ?></option>
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
                                            <button class="btn btn-primary" onclick="studentsUpdateByAdmin();">Upload Detals</button>
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