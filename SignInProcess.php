<?php
//signin without a verrification code
session_start();
require "connection.php";

$un = $_POST["u"];
$pw = $_POST["p"];
$type = $_POST["type"];
$r = $_POST["remember"];
$vc;
$rs;

if ($type == "verify") {
    $vc = $_POST["vc"];
}


if (empty($un)) {
    echo "Please Enter the user name";
} else if (empty($pw)) {
    echo "Please Enter the password";
} else if (empty($pw)) {
    echo "Please Enter the password";
} else {

    //admin login
    if ($type == "Admin") {

        $rs = Database::search("SELECT * FROM `admin` WHERE `user_name`='" . $un . "' AND `password`='" . $pw . "';");

        if ($rs->num_rows == 1) {

            echo "success" . $type;
            $_SESSION["ua"] = $rs->fetch_assoc();

            if ($r == "true") {

                setcookie("username", $un, time() + (60 * 60 * 60 * 24 * 365));
                setcookie("password", $pw, time() + (60 * 60 * 60 * 24 * 365));
                setcookie("usertype", $type, time() + (60 * 60 * 60 * 24 * 365));
            } else {

                setcookie("username", "", -1);
                setcookie("password", "", -1);
            }
        } else {
            echo "Invalid details";
        }
    } else {







        //other user type login
        if ($type == "Academic officer") {
            $rs = Database::search("SELECT * FROM `academic_officers` WHERE `user_name`='" . $un . "' AND `password`='" . $pw . "';");
        } else if ($type == "Teacher") {
            $rs = Database::search("SELECT * FROM `teachers` WHERE `user_name`='" . $un . "' AND `password`='" . $pw . "';");
        } else if ($type == "Student") {
            $rs = Database::search("SELECT * FROM `students` WHERE `user_name`='" . $un . "' AND `password`='" . $pw . "';");
        }



        if ($rs->num_rows == 1) {

            $d = $rs->fetch_assoc();



            if ($type == "Academic officer") {
                $_SESSION["uac"] = $d;
            } else if ($type == "Teacher") {
                $_SESSION["ut"] = $d;
            } else if ($type == "Student") {
                $_SESSION["us"] = $d;
            }

            $_SESSION["user_type"] = $type;

            if ($r == "true") {

                setcookie("username", $un, time() + (60 * 60 * 60 * 24 * 365));
                setcookie("password", $pw, time() + (60 * 60 * 60 * 24 * 365));
               
            } else {

                setcookie("username", "", -1);
                setcookie("password", "", -1);
            }

            if (empty($d["verification_code"])) {

                echo "success" . $type;
            } else {

                echo "do_verify";
            }
        } else {
            echo "Invalid details";
        }
    }
}
