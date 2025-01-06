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

    <body onload='getDp("admin");'>

        <div class="container-fluid sign-page-background">
            <div class="container">
                <div class="col-12">
                    <div class="row">

                        <div class="col-12 d-flex justify-content-center mt-5 mb-5 my-profile-details-btt">
                            <div class="col-9 mt-5 mb-5 justify-content-center">
                                <div class="col-12 mb-5">
                                    <h3 id="user-name" class="fw-bold m-2"></h3>
                                    <h1 class="text-center fw-bold openSans-extraBold">WELCOME TO YOUR PROFILE!</h1>

                                    <p id="email" class="fw-bold m-2 text-center"></p>
                                </div>
                                <div class="col-12 d-flex align-items-center justify-content-center">
                                    <img src="Images/user (1).svg" class="user-details-img" alt="" id="prev">
                                    <div class="d-grid gap-2 m-3">
                                        <input class="d-none" type="file" accept="image" id="imguploader" />
                                        <label class="btn btn-primary" for="imguploader" onclick="changeImage();">Upload Your Image</label>
                                    </div>
                                </div>
                                <div class="col-10 mx-auto mt-5">
                                    <form>
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
                                                <label for="formGroupExampleInput">Email</label>
                                                <input type="email" id="email2" class="form-control" placeholder="Email">
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
                                                <label for="formGroupExampleInput">User Name</label>
                                                <input type="text" id="username" class="form-control" placeholder="username">
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
                                            <button class="btn btn-primary" onclick="AdminProfileUpdate();">Update Details</button>
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