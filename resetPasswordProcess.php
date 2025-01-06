<?php

require 'connection.php';



$e = $_POST["e"];
$np = $_POST["np"];
$rnp = $_POST["rnp"];
$vc = $_POST["vc"];
$type = $_POST["type"];

$rs;

if (empty($e)) {
    echo "Missing email address";
} else if (empty($np)) {
    echo "Please enter your new password";
} else if (strlen($np) < 5 || strlen($np) > 20) {
    echo "Password lenth must be between 5 and 20";
} else if (empty($rnp)) {
    echo "Please re-type your new password";
} else if ($np != $rnp) {
    echo "Password and re-type password dose not match";
} else if (empty($vc)) {
    echo "Please enter the varification code";
} else {

    if ($type == "Academic officer") {
        $rs = Database::search("SELECT * FROM academic_officers WHERE `email` = '" . $e . "' AND `verification_code2`='" . $vc . "'; ");
    } else if ($type == "Teacher") {
        $rs = Database::search("SELECT * FROM teachers WHERE `email` = '" . $e . "' AND `verification_code2`='" . $vc . "'; ");
    } else if ($type == "Student") {
        $rs = Database::search("SELECT * FROM students WHERE `email` = '" . $e . "' AND `verification_code2`='" . $vc . "'; ");
    }

    

    if ($rs->num_rows == 1) {


        if ($type == "Academic officer") {
            Database::iud("UPDATE academic_officers SET `password`='" . $np . "' WHERE `email`='" . $e . "'; ");
        } else if ($type == "Teacher") {
            Database::iud("UPDATE teachers SET `password`='" . $np . "' WHERE `email`='" . $e . "'; ");
        } else if ($type == "Student") {
            Database::iud("UPDATE students SET `password`='" . $np . "' WHERE `email`='" . $e . "'; ");
        }
        
        echo "Success";
    } else {

        echo "Password rest failed";
        echo $e;
        echo $vc;
    }
}
