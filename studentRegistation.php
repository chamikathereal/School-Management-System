<?php
session_start();
require "connection.php";

if (isset($_SESSION["uac"])) {
?>


    <!DOCTYPE html>

    <html>

    <head>
        <title>Academic Officer | Student Registration</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    </head>

    <body>

        <div class="container-fluid sign-page-background">
            <div class="container">
                <div class="col-12">
                    <div class="row">

                        <div class="col-12 d-flex justify-content-center mt-5 mb-5 my-profile-details-btt">
                            <div class="col-9 mt-5 mb-5 justify-content-center">

                                <div class="col-12 mb-5">
                                    <h3 id="user-name" class="fw-bold m-2"></h3>
                                    <h1 class="text-center fw-bold openSans-extraBold">REAGISTER STUDENTS!</h1>

                                    <hr>
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <img src="Images/user (1).svg" class="user-details-img" alt="" id="prev">
                                    <div class="d-grid gap-2 m-3">
                                        <input class="d-none" type="file" accept="image" id="imguploader" />
                                        <label class="btn btn-primary" for="imguploader" onclick="changeImage();">Upload Your Image</label>
                                    </div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    <div class="col-12">
                                        <div class="row">
                                            <h5 class="text-danger text-start" id="msg"></h5>

                                        </div>
                                    </div>
                                    <form>
                                        <div class="col-12">
                                            <div class="row">
                                                <h5 class="text-danger  text-start ms-5 my-2" id="msg"> </h5>

                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="formGroupExampleInput">First name</label>
                                                <input type="text" id="fname" class="form-control" placeholder="First name">
                                            </div>
                                            <div class="col">
                                                <label for="formGroupExampleInput">Last name</label>
                                                <input type="text" id="lname" class="form-control" placeholder="Last name">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="formGroupExampleInput">Dathe Of Birthday</label>
                                                <input type="date" id="dob" class="form-control" placeholder="Select the birth day" />
                                            </div>
                                            <div class="col">
                                                <label for="formGroupExampleInput">Gender</label>
                                                <select class="form-select" id="gender">
                                                    <option value="0">Select gender</option>
                                                    <option value="1">Male</option>
                                                    <option value="2">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="formGroupExampleInput">Grade</label>
                                                <input type="text" id="grade" class="form-control" id="formGroupExampleInput" placeholder="Grade">
                                            </div>
                                            <div class="col">
                                                <label for="formGroupExampleInput">Payment Option</label>
                                                <select class="form-select" id="payment_option">
                                                    <option value="0">Select Option</option>
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `payment_structures`;");
                                                    $n = $rs->num_rows;
                                                    for ($i = 0; $i < $n; $i++) {
                                                        $data = $rs->fetch_assoc();
                                                    ?>
                                                        <option value='<?php echo $data["id"]; ?>'><?php echo $data["name"]; ?></Php>
                                                        </option>
                                                    <?php
                                                    }

                                                    ?>


                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="formGroupExampleInput">Mobile</label>
                                                <input type="number" id="mobile" class="form-control" placeholder="Mobile">
                                            </div>
                                            <div class="col">
                                                <label for="formGroupExampleInput">Email</label>
                                                <input type="text" id="email" class="form-control" placeholder="Enter Email">
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="exampleFormControlTextarea1">Address</label>
                                            <textarea class="form-control" id="address" rows="3"></textarea>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col">
                                                <label for="formGroupExampleInput">User Name</label>
                                                <input type="text" id="uname" class="form-control" placeholder="username">
                                            </div>
                                            <div class="col">
                                                <label for="inputPassword">Password</label>
                                                <input type="password" id="password" class="form-control" id="inputPassword" placeholder="Password">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-12 mt-5 mb-4 ">
                                    <div class="col-7 mt-3 mx-auto ">
                                        <div class="d-grid gap-2">
                                            <button class="btn btn-primary" onclick="studentReg();">Register</button>
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
