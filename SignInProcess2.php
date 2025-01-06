<?php
//signin with a verrification code
session_start();
require "connection.php";


$vc = $_POST["vc"];
$type =  $_SESSION["user_type"];
$user;

 if ($type == "Academic officer") {
    $user = $_SESSION["uac"];
} else if ($type == "Teacher") {
    $user =  $_SESSION["ut"];
} else if ($type == "Student") {
    $user = $_SESSION["us"];
}



$user_id = $user["id"];



if (empty($vc)) {
    echo "Please enter the verification code sent by the admin to your email";
} else {

    if ($type == "Academic officer") {
        $rs = Database::search("SELECT * FROM `academic_officers` WHERE `id`='" . $user_id . "' AND `verification_code`='".$vc."';");
    } else if ($type == "Teacher") {
        $rs = Database::search("SELECT * FROM `teachers` WHERE `id`='" . $user_id . "' AND `verification_code`='".$vc."';");
    } else if ($type == "Student") {
        $rs = Database::search("SELECT * FROM `students`  WHERE `id`='" . $user_id . "' AND `verification_code`='".$vc."';");
    }

    if ($rs->num_rows == 1) {

        $d = $rs->fetch_assoc();



        if ($type == "Academic officer") {
            Database::iud("UPDATE academic_officers SET status_id = '1',verification_code = '' WHERE id='" . $d["id"] . "';");
        } else if ($type == "Teacher") {
            Database::iud("UPDATE teachers SET status_id = '1',verification_code = '' WHERE id='" . $d["id"] . "';");
        } else if ($type == "Student") {
            Database::iud("UPDATE students SET status_id = '1',verification_code = '' WHERE id='" . $d["id"] . "';");
        }

        echo "success" . $type;
    } else {
        echo "Invalid details";
    }
}
