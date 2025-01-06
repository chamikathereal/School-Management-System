<?php

session_start();
require "connection.php";

$id = $_POST["id"];
$grade = $_POST["grade"];
$payment = $_POST["payment"];
$status = $_POST["status"];

// echo $id." ";
// echo $grade." ";
// echo $subject." ";
// echo $status." ";

if ($id == "0") {
    echo "please select a teacher";
} else if (empty($grade)) {
    echo "please give a grade";
} else {

    $rs = Database::search("SELECT * FROM `students` WHERE `id` = '".$id."';");

    if($rs->num_rows == 1){
        $data = $rs->fetch_assoc();
        $payment_id = $data["payment_status_id"];
        Database::iud("UPDATE `students` SET `grade`='" . $grade . "',`payment_status_id`='" .$payment_id. "' WHERE `id`='" . $id . "'; ");
    
        echo "Update successfull";
    }else{
        echo "Error occured";
    }

   
}
