<?php

session_start();
require "connection.php";

$aid = $_POST["id"];
$sid = $_SESSION["us"]["id"];

if (isset($_FILES["pdf"])) {

    $pdf = $_FILES["pdf"]["name"];



    $pdfname = "pdf//" . uniqid() . $pdf;
    move_uploaded_file($_FILES["pdf"]["tmp_name"], $pdfname);

    $rs = Database::search("SELECT * FROM `submissions` WHERE `assignments_id`='".$aid."' AND `students_id` = '".$sid."'; ");

    if($rs->num_rows == 0){
        Database::iud("INSERT INTO `submissions`(`assignments_id`,`students_id`,`pdf`) VALUES('".$aid."','".$sid."','".$pdfname."');");

      
    }else{
        $no="Not";
        Database::iud("UPDATE `submissions` SET `pdf`='".$pdfname."', `marks`='".$no."' WHERE `assignments_id`='".$aid."' AND `students_id` = '".$sid."';");
    }
    

 

    
    echo "success";
}
