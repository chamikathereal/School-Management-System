<?php

session_start();
require "connection.php";

$sid = $_POST["sid"];
$aid = $_POST["aid"];
$marks = $_POST["marks"];


// echo $sid." ".$id." ".$marks;




Database::iud("UPDATE `submissions` SET `marks`='" . $marks . "' WHERE  `students_id`='" . $sid . "' AND `assignments_id`='" . $aid . "';");


echo "success";
