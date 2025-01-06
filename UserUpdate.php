<?php

session_start();
require "connection.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$dob = $_POST["dob"];
$gender = $_POST["gender"];
$nic = $_POST["nic"];
$address = $_POST["address"];
$mobile = $_POST["mobile"];
$username = $_POST["username"];
$password = $_POST["password"];

$type = $_SESSION["user_type"];

$id;

if ($type == "Academic officer") {
    $id = $_SESSION["uac"]["id"];
} else if ($type == "Teacher") {
    $id =  $_SESSION["ut"]["id"];
} else if ($type == "Student") {
    $id = $_SESSION["us"]["id"];
}

$image;

// echo $fname." ";
// echo $lname." ";
// echo $email." ";
// echo $gender." ";
// echo $username." ";
// echo $password." ";

// echo $image." ";

if (isset($_FILES["image"])) {

    $image = $_FILES["image"]["name"];
    $fileName = "profile_img//" . uniqid() . $image;
    move_uploaded_file($_FILES["image"]["tmp_name"], $fileName);

    if ($type == "Academic officer") {
        Database::iud("UPDATE `academic_officers` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`dob`= '".$dob."',`gender_id`='" . $gender . "',`nic`='".$nic."',`mobile`='".$mobile."',`address`='".$address."',`user_name`='" . $username . "',`password`='" . $password . "',`email`='" . $email . "',`image`='".$fileName."' WHERE `id`='".$id."'; ");
    }  else if ($type == "Teacher") {
        Database::iud("UPDATE `teachers` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`dob`= '".$dob."',`gender_id`='" . $gender . "',`nic`='".$nic."',`mobile`='".$mobile."',`address`='".$address."',`user_name`='" . $username . "',`password`='" . $password . "',`email`='" . $email . "',`image`='".$fileName."' WHERE `id`='".$id."'; ");
    } else if ($type == "Student") {
        Database::iud("UPDATE `students` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`dob`= '".$dob."',`gender_id`='" . $gender . "',`grade`='".$nic."',`mobile`='".$mobile."',`address`='".$address."',`user_name`='" . $username . "',`password`='" . $password . "',`email`='" . $email . "',`image`='".$fileName."' WHERE `id`='".$id."'; ");
    }

    // echo "hi1";
 


    
   
} else {
    
    if ($type == "Academic officer") {
        Database::iud("UPDATE `academic_officers` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`dob`= '".$dob."',`gender_id`='" . $gender . "',`nic`='".$nic."',`mobile`='".$mobile."',`address`='".$address."',`user_name`='" . $username . "',`password`='" . $password . "',`email`='" . $email . "' WHERE `id`='".$id."'; ");
    }  else if ($type == "Teacher") {
        Database::iud("UPDATE `teachers` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`dob`= '".$dob."',`gender_id`='" . $gender . "',`nic`='".$nic."',`mobile`='".$mobile."',`address`='".$address."',`user_name`='" . $username . "',`password`='" . $password . "',`email`='" . $email . "' WHERE `id`='".$id."'; ");
    } else if ($type == "Student") {
        Database::iud("UPDATE `students` SET `fname`='" . $fname . "',`lname`='" . $lname . "',`dob`= '".$dob."',`gender_id`='" . $gender . "',`grade`='".$nic."',`mobile`='".$mobile."',`address`='".$address."',`user_name`='" . $username . "',`password`='" . $password . "',`email`='" . $email . "' WHERE `id`='".$id."'; ");
    }

   

}

// echo $id." ";
// echo $grade." ";
// echo $subject." ";
// echo $status." ";








echo "Update successfull";
?>
