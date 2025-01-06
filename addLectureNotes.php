<?php

session_start();
require "connection.php";

if (isset($_SESSION["ut"])) {
?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>Teacher | Add Lecture Note</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>

    <body>

        <div class="container-fluid assignment-page-background">
            <div class="container">
                <div class="col-12">
                    <div class="row">

                        <div class="col-12 d-flex justify-content-center mt-5 mb-5">
                            <div class="col-9 mb-4 mt-5 justify-content-center my-profile-btt">
                                <div class="col-12 mb-5 mt-5">
                                    <h1 class="text-center fw-bold openSans-extraBold mb-5">ADD YOUR NOTE!</h1>
                                    <hr>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    <div class="col-12 mb-5">
                                        <div class="row">
                                            <div class="col-6">
                                                <form>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <label for="formGroupExampleInput">Subject</label>
                                                            <select class="form-select" id="subject" disabled>

                                                                <?php

                                                                $rs2 = Database::search("SELECT * FROM `teacher_has_subjects` INNER JOIN `subjects` ON `subjects`.`id` =`teacher_has_subjects`.`subjects_id`  WHERE `teachers_id`='" . $_SESSION["ut"]["id"] . "';");
                                                                if ($rs2->num_rows > 0) {
                                                                    $data = $rs2->fetch_assoc();
                                                                ?>
                                                                    <option value="<?php echo $data["id"]; ?>"><?php echo $data["name"]; ?></option>
                                                                <?php
                                                                }
                                                                ?>


                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <label for="formGroupExampleInput">Grade</label>
                                                            <input type="number" id="grade" class="form-control" placeholder="Select the grade" />
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <div class="col">
                                                            <label for="formGroupExampleInput">Topic</label>
                                                            <input type="text" id="topic" class="form-control " placeholder="Type the Topic of the note" />
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <div class="col-6 ">
                                                <div class="row">
                                                    <div class="col-12 d-flex justify-content-center">
                                                        <img src="Images/file.svg" class="assignment-img mx-auto" alt="" id="prev">
                                                    </div>
                                                    <div class="col-12 d-flex justify-content-center">
                                                        <div class="col-7 d-grid">
                                                            <input class="d-none" type="file" accept="application/pdf,application/vnd.ms-exel" id="fileuploader" onchange="changeImageByDocument();" />
                                                            <label class="btn btn-primary" for="fileuploader">Upload PDF</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mt-5 mb-5">
                                    <div class="col-7 mt-3 mx-auto ">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary" onclick="uploadpdf2();">Upload Note</button>
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