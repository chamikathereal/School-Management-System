<?php

session_start();
require "connection.php";

$id = $_SESSION["ut"]["id"];
$subject = $_POST["subject"];
$grade = $_POST["grade"];
$topic = $_POST["topic"];

$pdf = "";
$length = 5;
$code = substr(str_shuffle("0123456789"),0,$length);


if (isset($_FILES["pdf"])) {
    $pdf = $_FILES["pdf"]["name"];



    $pdfname = "pdf//". uniqid() . $pdf;
    move_uploaded_file($_FILES["pdf"]["tmp_name"],$pdfname);

    if ($subject == "0") {
        echo "Please select the subject";
    } else if (empty($grade)) {
        echo "Please enter the grade";
    } else if (empty($topic)) {
        echo "Please enter the topic";
    } else {

        // echo $code." ".$id." ". $subject." ".$grade." ".$duration." ".$pdfname;

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");

        Database::iud("INSERT INTO `lecture_notes` VALUES('".$code."','".$id."','".$subject."','".$grade."','".$topic."','".$pdfname."','".$date."');");
        echo "success";
    }
} else {

    echo "please upload a pdf first";
}
