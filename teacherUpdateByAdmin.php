<?php

session_start();
require "connection.php";

$id = $_POST["id"];
$grade = $_POST["grade"];
$subject = $_POST["subject"];
$status = $_POST["status"];

// echo $id." ";
// echo $grade." ";
// echo $subject." ";
// echo $status." ";

if ($id == "0") {
    echo "please select a teacher";
} else if (empty($grade)) {
    echo "please give a grade";
} else if ($subject == "0") {
    echo "please select a subject";
} else {

    $rs2 = Database::search("SELECT * FROM `teacher_has_subjects` WHERE `teachers_id` = '" . $id . "'; ");



    if ($rs2->num_rows == 0) {     
        
        Database::iud("INSERT INTO `teacher_has_subjects`(`teachers_id`,`subjects_id`,`grade`) VALUES('".$id."','".$subject."','".$grade."');");
    
    } else {

        Database::iud("UPDATE `teacher_has_subjects` SET `subjects_id`='" . $subject . "',`grade`='" . $grade . "' WHERE `teachers_id`='" . $id . "'; ");
        
    }


  

    if ($status != "0") {
        Database::iud("UPDATE `teachers` SET `status_id`='" . $status . "' WHERE `id`='" . $id . "'; ");
    }

    echo "Update successfull";
}
