<?php

session_start();
require "connection.php";

$id = $_POST["id"];
$notes = $_POST["notes"];
$teachers = $_POST["teachers"];
$status = $_POST["status"];

if ($id == "0") {
    echo "Please select an academic officer";
} else if ($teachers == "0") {
    echo "Please select a teacher";
} else if (empty($notes)) {
    echo "Write the note";
}else{

    $rs2 = Database::search("SELECT * FROM `academic_officers_has_teachers` WHERE `academic_officers_id` = '" . $id . "'; ");

    // Assigning or updating a teacher to an academic officer
    if ($rs2->num_rows == 0) {     
        Database::iud("INSERT INTO `academic_officers_has_teachers`(`academic_officers_id`, `teachers_id`, `notes`) VALUES('" . $id . "','" . $teachers . "','" . $notes . "');");
    } else {
        Database::iud("UPDATE `academic_officers_has_teachers` SET `teachers_id`='" . $teachers . "', `notes`='" . $notes . "' WHERE `academic_officers_id`='" . $id . "'; ");
    }

    if ($status != "0") {
        Database::iud("UPDATE `academic_officers` SET `status_id`='" . $status . "' WHERE `id`='" . $id . "'; ");
    }

    echo "Update successful";
}
?>
