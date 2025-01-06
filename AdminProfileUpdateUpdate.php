<?php

session_start();
require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$username = $_POST["username"];
$password = $_POST["password"];

$image;

// echo $fname." ";
// echo $lname." ";
// echo $email." ";
// echo $gender." ";
// echo $username." ";
// echo $password." ";

// echo $image." ";

if (isset($_FILES["image"])) {

    // echo "hi1";
    $image = $_FILES["image"]["name"];
    $fileName = "profile_img//" . uniqid() . $image;

    move_uploaded_file($_FILES["image"]["tmp_name"], $fileName);
    Database::iud("UPDATE `admin` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`email`='" . $email . "',`gender_id`='" . $gender . "',`user_name`='" . $username . "',`password`='" . $password . "',`image`='".$fileName."' WHERE `id`='1'; ");

   
} else {
    
    Database::iud("UPDATE `admin` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`email`='" . $email . "',`gender_id`='" . $gender . "',`user_name`='" . $username . "',`password`='" . $password . "' WHERE `id`='1'; ");

}

// echo $id." ";
// echo $grade." ";
// echo $subject." ";
// echo $status." ";








echo "Update successfull";
