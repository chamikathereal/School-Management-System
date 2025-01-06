<?php
//get teacher/academic oficer/student dp process in admin panel admistrtaions
session_start();
require "connection.php";

$id = $_POST["id"];
$type = $_POST["type"];
$data;
$array;

if($type == "teacher"){
    $rs = Database::search("SELECT * FROM `teachers` WHERE `id`='".$id."';");
}else if($type == "academicOfficer"){
    $rs = Database::search("SELECT * FROM `academic_officers` WHERE `id`='".$id."';");
}else if($type == "student"){
    $rs = Database::search("SELECT * FROM `students` WHERE `id`='".$id."';");
}else if($type == "admin"){
    $rs = Database::search("SELECT * FROM `admin`;");
}

$data = $rs->fetch_assoc();

$image =  $data["image"]; 
$fname = $data["fname"];
$lname = $data["lname"];
$email = $data["email"];


$array["image"] = $image;
$array["fname"] = $fname;
$array["lname"] = $lname;
$array["email"] = $email;


echo json_encode($array);

?>