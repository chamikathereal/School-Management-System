<?php

session_start();
require "connection.php";

$type =  $_SESSION["user_type"];
$id ;
$rs;

 if ($type == "Academic officer") {
    $id = $_SESSION["uac"]["id"];
} else if ($type == "Teacher") {
    $id =  $_SESSION["ut"]["id"];
} else if ($type == "Student") {
    $id = $_SESSION["us"]["id"];
}


$data;
$array;

if($type == "Teacher"){
    $rs = Database::search("SELECT * FROM `teachers` WHERE `id`='".$id."';");
}else if($type == "Academic officer"){
    $rs = Database::search("SELECT * FROM `academic_officers` WHERE `id`='".$id."';");
}else if($type == "Student"){
    $rs = Database::search("SELECT * FROM `students` WHERE `id`='".$id."';");
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
$array["type"] =$type;


echo json_encode($array);

?>