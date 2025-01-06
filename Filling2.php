<?php

session_start();
require "connection.php";

$array;

$type =  $_SESSION["user_type"];
$id;


if ($type == "Academic officer") {
    $id = $_SESSION["uac"]["id"];
} else if ($type == "Teacher") {
    $id =  $_SESSION["ut"]["id"];
} else if ($type == "Student") {
    $id = $_SESSION["us"]["id"];
}



if ($type == "Teacher") {


    $rs2 = Database::search("SELECT * FROM `teachers` WHERE `id` = '" . $id . "'; ");

    $data2 = $rs2->fetch_assoc();

    $fname = $data2["fname"];
    $lname = $data2["lname"];
    $email = $data2["email"];
    $dob = $data2["dob"];
    $gender_id = $data2["gender_id"];
    $nic = $data2["nic"];
    $mobile = $data2["mobile"];
    $address = $data2["address"];
    $user_name = $data2["user_name"];
    $password = $data2["password"];
   


    $array["fname"] = $fname;
    $array["lname"] = $lname;
    $array["email"] = $email;
    $array["dob"] = $dob;
    $array["gender_id"] = $gender_id;
    $array["nic"] = $nic;
    $array["mobile"] = $mobile;
    $array["address"] = $address;
    $array["user_name"] = $user_name;
    $array["password"] = $password;
   

    echo json_encode($array);
} else if ($type == "Academic officer") {


    $rs2 = Database::search("SELECT * FROM `academic_officers` WHERE `id` = '" . $id . "'; ");


    $data2 = $rs2->fetch_assoc();

    $fname = $data2["fname"];
    $lname = $data2["lname"];
    $email = $data2["email"];
    $dob = $data2["dob"];
    $gender_id = $data2["gender_id"];
    $nic = $data2["nic"];
    $mobile = $data2["mobile"];
    $address = $data2["address"];
    $user_name = $data2["user_name"];
    $password = $data2["password"];



    $array["fname"] = $fname;
    $array["lname"] = $lname;
    $array["email"] = $email;
    $array["dob"] = $dob;
    $array["gender_id"] = $gender_id;
    $array["nic"] = $nic;
    $array["mobile"] = $mobile;
    $array["address"] = $address;
    $array["user_name"] = $user_name;
    $array["password"] = $password;



    echo json_encode($array);
} else if ($type == "Student") {


    $rs2 = Database::search("SELECT * FROM `students` WHERE `id` = '" . $id . "'; ");


    $data2 = $rs2->fetch_assoc();

    $fname = $data2["fname"];
    $lname = $data2["lname"];
    $email = $data2["email"];
    $dob = $data2["dob"];
    $gender_id = $data2["gender_id"];
    $grade = $data2["grade"];
    $mobile = $data2["mobile"];
    $address = $data2["address"];
    $user_name = $data2["user_name"];
    $password = $data2["password"];



    $array["fname"] = $fname;
    $array["lname"] = $lname;
    $array["email"] = $email;
    $array["dob"] = $dob;
    $array["gender_id"] = $gender_id;
    $array["grade"] = $grade;
    $array["mobile"] = $mobile;
    $array["address"] = $address;
    $array["user_name"] = $user_name;
    $array["password"] = $password;
 
    echo json_encode($array);
} 