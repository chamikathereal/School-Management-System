<?php
//Assignment marks insert and updating process

session_start();
require "connection.php";

$sid = $_POST["sid"];
$id = $_POST["id"];
$marks = $_POST["marks"];


// echo $sid." ".$id." ".$marks;


$rs = Database::search("SELECT * FROM `resultsheets` WHERE `students_id`='".$sid."' AND `assignments_id`='".$id."'; ");
// echo $rs->num_rows." ";
if($rs->num_rows == 0){
    Database::iud("INSERT INTO `resultsheets`(`students_id`,`marks`,`teachers_id`,`assignments_id`) VALUES('".$sid."','".$marks."','".$_SESSION["ut"]["id"]."','".$id."');");
  
}else{
    Database::iud("UPDATE `resultsheets` SET `marks`='".$marks."' WHERE  `students_id`='".$sid."' AND `assignments_id`='".$id."';");
}


echo "success";
