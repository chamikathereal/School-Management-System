<?php


//getting current values of admin panel adminstrantion areas like teacher managing area, students managing area, accademic offcer managing area.
session_start();
require "connection.php";

$array;

$id = $_POST["id"];
$type = $_POST["type"];


if ($type == "teacher") {

    $rs1 = Database::search("SELECT * FROM `teacher_has_subjects` WHERE `teachers_id`='" . $id . "'; ");
    $rs2 = Database::search("SELECT * FROM `teachers` WHERE `id` = '" . $id . "'; ");



    if ($rs1->num_rows == 0) {

        $data1 = $rs1->fetch_assoc();
        $data2 = $rs2->fetch_assoc();

        $subject = 0;
        $grade = " ";
        $status = $data2["status_id"];
    } else {

        $data1 = $rs1->fetch_assoc();
        $data2 = $rs2->fetch_assoc();

        $subject = $data1["subjects_id"];
        $grade = $data1["grade"];
        $status = $data2["status_id"];
    }

    $array["id"] = $id;
    $array["subject"] = $subject;
    $array["grade"] = $grade;
    $array["status"] = $status;

    echo json_encode($array);
} else if ($type == "academicOfficer") {

    $rs1 = Database::search("SELECT * FROM `academic_officers_has_teachers` WHERE `academic_officers_id`='" . $id . "'; ");
    $rs2 = Database::search("SELECT * FROM `academic_officers` WHERE `id` = '" . $id . "'; ");



    if ($rs1->num_rows == 0) {

        $data1 = $rs1->fetch_assoc();
        $data2 = $rs2->fetch_assoc();

        $teachers = 0;
        $notes = " ";
        $status = $data2["status_id"];
    } else {

        $data1 = $rs1->fetch_assoc();
        $data2 = $rs2->fetch_assoc();

        $teachers = $data1["teachers_id"];
        $notes = $data2["notes"];
        $status = $data2["status_id"];
    }

    $array["id"] = $id;
    $array["teachers"] = $teachers;
    $array["notes"] = $notes;
    $array["status"] = $status;

    echo json_encode($array);
} else if ($type == "student") {


    $rs2 = Database::search("SELECT * FROM `students` INNER JOIN `payment_status` ON `students`.`payment_status_id` = `payment_status`.`id` WHERE `students`.`id` = '".$id."'; ");



    if ($rs2->num_rows == 0) {
        echo "Unfound student";
    } else {
        $data2 = $rs2->fetch_assoc();

        $grade = $data2["grade"];
        $payment = $data2["name"];
        $status = $data2["status_id"];

        $array["id"] = $id;
        $array["grade"] = $grade;
        $array["payment"] = $payment;
        $array["status"] = $status;

        echo json_encode($array);
    }

} else if ($type == "admin") {


    $rs2 = Database::search("SELECT * FROM `admin`; ");

    $data2 = $rs2->fetch_assoc();

    $fname = $data2["fname"];
    $lname = $data2["lname"];
    $email = $data2["email"];
    $gender = $data2["gender_id"];
    $username = $data2["user_name"];
    $password = $data2["password"];



    $array["fname"] = $fname;
    $array["lname"] = $lname;
    $array["email"] = $email;
    $array["gender"] = $gender;
    $array["username"] = $username;
    $array["password"] = $password;

    echo json_encode($array);
}
