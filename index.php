<?php

session_start();
$a = "";


if (isset($_GET["a"])) {
    $a = $_GET["a"];
}

?>


<!DOCTYPE html>

<html>

<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <img src="Images/loginimage.svg" alt="">
                    </div>
                    <div class="col-6 signin-background d-flex align-items-center justify-content-center">
                        <div class="btt col-8">
                            <div class="mb-4 d-flex justify-content-center">
                                <img src="Images/user (1).svg" class="user-img" alt="">
                            </div>
                            <div>
                                <?php
                                if ($a == "Admin") {
                                ?>
                                    <h4 class="fw-bold text-center mb-5 OpenSans-ExtraBold">WELCOME THE ADMIN</h4>


                                <?php
                                } else if ($a == "Academic officer") {
                                ?>
                                    <h4 class="fw-bold text-center mb-5 OpenSans-ExtraBold">WELCOME THE ACADEMIC OFFICER</h4>
                                <?php
                                } else if ($a == "Teacher") {
                                ?>
                                    <h4 class="fw-bold text-center mb-5 OpenSans-ExtraBold">WELCOME THE TEACHER</h4>

                                <?php
                                } else if ($a == "Student") {
                                ?>
                                    <h4 class="fw-bold text-center mb-5 OpenSans-ExtraBold">WELCOME THE STUDENT</h4>
                                <?php
                                } else if ($a == "do_verify") {
                                ?>
                                    <h4 class="fw-bold text-center mb-5 OpenSans-ExtraBold">LOGIN TO VERIFICATION</h4>
                                <?php
                                } else {
                                ?>
                                    <h4 class="fw-bold text-center mb-5 OpenSans-ExtraBold">WELCOME TO NEW JERSEY ACADEMY</h4>
                                <?php
                                }
                                ?>
                                <p class="text-danger text-center" id="msg"></p>
                            </div>

                            <?php

                            $un = "";
                            $pw = "";

                            if (isset($_COOKIE["username"])) {
                                $un = $_COOKIE["username"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $pw = $_COOKIE["password"];
                            }

                            ?>

                            <form>
                                <div class="form-group mb-3">
                                    <?php
                                    if ($a == "do_verify") {
                                    } else {
                                    ?>
                                        <label for="exampleInputEmail1">Works with selected</label>
                                        <select class="form-select" id="usertype" aria-label="Floating label select example" onchange="abc();">
                                            <?php
                                            if ($a == "Admin") {
                                            ?>
                                                <option>SELECT THE USER TYPE</option>
                                                <option value="<?php echo "Admin" ?>" selected>Admin</option>
                                                <option value="<?php echo "Academic officer" ?>">Academic officer</option>
                                                <option value="<?php echo "Teacher" ?>">Teacher</option>
                                                <option value="<?php echo "Student" ?>">Student</option>
                                            <?php
                                            } else if ($a == "Academic officer") {
                                            ?>
                                                <option>SELECT THE USER TYPE</option>
                                                <option value="<?php echo "Admin" ?>">Admin</option>
                                                <option value="<?php echo "Academic officer" ?>" selected>Academic officer</option>
                                                <option value="<?php echo "Teacher" ?>">Teacher</option>
                                                <option value="<?php echo "Student" ?>">Student</option>
                                            <?php
                                            } else if ($a == "Teacher") {
                                            ?>
                                                <option>SELECT THE USER TYPE</option>
                                                <option value="<?php echo "Admin" ?>">Admin</option>
                                                <option value="<?php echo "Academic officer" ?>">Academic officer</option>
                                                <option value="<?php echo "Teacher" ?>" selected>Teacher</option>
                                                <option value="<?php echo "Student" ?>">Student</option>
                                            <?php
                                            } else if ($a == "Student") {
                                            ?>
                                                <option>SELECT THE USER TYPE</option>
                                                <option value="<?php echo "Admin" ?>">Admin</option>
                                                <option value="<?php echo "Academic officer" ?>">Academic officer</option>
                                                <option value="<?php echo "Teacher" ?>">Teacher</option>
                                                <option value="<?php echo "Student" ?>" selected>Student</option>
                                            <?php
                                            } else {
                                            ?>
                                                <option>SELECT THE USER TYPE</option>
                                                <option value="<?php echo "Admin" ?>">Admin</option>
                                                <option value="<?php echo "Academic officer" ?>">Academic officer</option>
                                                <option value="<?php echo "Teacher" ?>">Teacher</option>
                                                <option value="<?php echo "Student" ?>">Student</option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1">User Name</label>
                                    <input type="text" class="form-control" id="un" placeholder="User name" value="<?php echo $un; ?>">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="pw" placeholder="Password" pl value="<?php echo $pw; ?>">
                                </div>
                            <?php
                                    }
                            ?>

                            <?php

                            if ($a == "do_verify") {
                            ?>
                                <div class="row">
                                    <div class="col-4 p-3">
                                        <h4 class=" text-white">Verification code</h4>
                                    </div>
                                    <div class="col-8 p-3">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div class="form-floating">
                                                    <input type="text" class="form-control" id="vc">
                                                    <label for="floatingInputGrid">type verification code</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            } else {
                            }

                            if ($a != "do_verify") {
                            ?>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="remember" checked>
                                    <label class="form-check-lable text-white">Remember Me</label>
                                </div>

                                <div class="mb-3">
                                    <a class="link-primary text-white" href="#" onclick="fogotPasswordmodel();">Fogot Password</a>
                                </div>
                            <?php
                            }
                            ?>


                            <div class="col-7 mx-auto ">
                                <?php
                                if ($a == "Admin") {
                                ?>
                                    <div class="d-grid">
                                        <button class="btn btn-success" onclick='si("Admin");'>Sign In</button>
                                    </div>

                                <?php
                                } else if ($a == "Academic officer") {
                                ?>
                                    <div class="d-grid">
                                        <button class="btn btn-success" onclick='si("Academic officer");'>Sign In</button>
                                    </div>

                                <?php
                                } else if ($a == "Teacher") {
                                ?>
                                    <div class="d-grid">
                                        <button class="btn btn-success f3" onclick='si("Teacher");'>Sign In</button>
                                    </div>

                                <?php
                                } else if ($a == "Student") {
                                ?>
                                    <div class="d-grid">
                                        <button class="btn btn-success f3" onclick='si("Student");'>Sign In</button>
                                    </div>

                                <?php
                                } else if ($a == "do_verify") {
                                ?>
                                    <div class="d-grid">
                                        <button class="btn btn-success f3" onclick='si2();'>Sign In</button>
                                    </div>

                                <?php
                                } else {
                                ?>
                                    <div class="d-grid">
                                        <button class="btn btn-success" onclick='si("Admin");'>Sign In</button>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- fogot Password Model -->

    <div class="modal fade" tabindex="-1" id="fogetPasswordModel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Password Reset</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row g-3">

                        <div class="col-12">
                            <lable class="form-lable">Email</lable>
                            <div class="input-group mb-3">

                                <input class="form-control" type="text" id="e" placeholder="type your email for varification." />

                                <?php
                                if ($a == "Academic officer") {
                                ?>
                                    <button class="btn btn-outline-warning" type="button" onclick='sendVerificationCode("Academic officer");' id="nb1">Send verification code</button>
                                <?php
                                } else if ($a == "Teacher") {
                                ?>
                                    <button class="btn btn-outline-warning" type="button" onclick='sendVerificationCode("Teacher");' id="nb1">Send verification code</button>
                                <?php
                                } else if ($a == "Student") {
                                ?>
                                    <button class="btn btn-outline-warning" type="button" onclick='sendVerificationCode("Student");' id="nb1">Send verification code</button>
                                <?php
                                }
                                ?>



                            </div>

                        </div>

                        <div class="col-12">
                            <lable class="form-lable">New Password</lable>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" id="np" />
                                <button class="btn btn-outline-primary" type="button" onclick="showPassword1();" id="nb1">Show</button>
                            </div>

                        </div>

                        <div class="col-12">
                            <lable class="form-lable">Re-type Password</lable>
                            <div class="input-group mb-3">
                                <input class="form-control" type="password" id="rnp" />
                                <button class="btn btn-outline-primary" type="button" onclick="showPassword2();" id="nb2">Show</button>
                            </div>

                        </div>

                        <div class="col-12">
                            <lable class="form-lable">Verification code</lable>
                            <input class="form-control" type="text" id="vc" />
                        </div>

                    </div>



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    <?php

                    if ($a == "Academic officer") {
                    ?>
                        <button type="button" class="btn btn-primary" onclick='resetPassword("Academic officer");'>Reset</button>
                    <?php
                    } else if ($a == "Teacher") {
                    ?>
                        <button type="button" class="btn btn-primary" onclick='resetPassword("Teacher");'>Reset</button>
                    <?php
                    } else if ($a == "Student") {
                    ?>
                        <button type="button" class="btn btn-primary" onclick='resetPassword("Student");'>Reset</button>
                    <?php
                    }
                    ?>



                </div>
            </div>
        </div>
    </div>

    <!-- fogot Password Model -->


    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>