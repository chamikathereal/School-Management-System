<?php

require "connection.php";
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;

$type = $_POST["type"];
$rs;

if (isset($_POST["e"])) {

    $email = $_POST["e"];

    if (empty($email)) {
        echo "Please enter your email address";
    } else {
        //verifing email with user types
        if ($type == "Academic officer") {
            $rs = Database::search("SELECT * FROM `academic_officers` WHERE `email`= '" . $email . "';");
        } else if ($type == "Teacher") {
            $rs = Database::search("SELECT * FROM `teachers` WHERE `email`= '" . $email . "';");
        } else if ($type == "Student") {
            $rs = Database::search("SELECT * FROM `students` WHERE `email`= '" . $email . "';");
        }




        if ($rs->num_rows == 1) {

            $code = uniqid();
            //generating a auto genarated verification code
            
            if ($type == "Academic officer") {
                Database::iud("UPDATE academic_officers SET `verification_code2` ='" . $code . "'  WHERE `email`= '" . $email . "';");
            } else if ($type == "Teacher") {
                Database::iud("UPDATE teachers SET `verification_code2` ='" . $code . "'  WHERE `email`= '" . $email . "';");
            } else if ($type == "Student") {
                Database::iud("UPDATE students SET `verification_code2` ='" . $code . "'  WHERE `email`= '" . $email . "';");
            }




            // sending the email c




            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'bgcjayanath2000@gmail.com';
            $mail->Password = 'CjcJ2@@@/5/!2';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('bgcjayanath2000@gmail.com', 'eShop');
            $mail->addReplyTo('bgcjayanath2000@gmail.com', 'eShop');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'eShop Foget Password Verification Code';
            $bodyContent = '<h1 style="color:red"> Your verification code is:' . $code . '</h1>';
            $bodyContent .= '<p>From: eShop pvt(Ltd)</p>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code is not send' . $mail->ErrorInfo;
            } else {
                echo 'Success';
            }

            // echo "Verification email address sent";
        } else {
            echo "Email address not found ! ";
            echo $email;
        }
    }
} else {

    echo "Please enter your email address";
}
