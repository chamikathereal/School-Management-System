<?php
//payment process from the payment getway
session_start();
require "connection.php";

$ch = $_POST["ch"];
$cn = $_POST["cn"];
$ed = $_POST["ed"];
$cvc = $_POST["cvc"];

$amount = $_POST["amount"];
$grade = $_POST["grade"];
$total = 0;


// echo $ch." ".$cn." ".$ed." ".$cvc." ".$amount." ".$grade;

if (empty($ch)) {
    echo "Please enter card holder name";
} else if (empty($cn)) {
    echo "Please enter card number";
} else if ($cn != "1234234534564567") {
    echo "Please enter valid card number";
} else if (empty($ed)) {
    echo "Please enter card expire date";
} else if (empty($cvc)) {
    echo "Please enter the cvc number";
} else if ($cvc != "348") {
    echo "Invalid cvc number";
} else {
    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `payment` (`students_id`,`date`,`amount`,`grade`) VALUES('" . $_SESSION["us"]["id"] . "','" . $date . "','" . $amount . "','" . $grade . "');");

    $rs = Database::search("SELECT * FROM `payment` WHERE `students_id`='" . $_SESSION["us"]["id"] . "' AND `grade` = '" . $grade . "';");
    $n = $rs->num_rows;

    for ($i = 0; $i < $n; $i++) {
        $d = $rs->fetch_assoc();
        $amount = intval($d["amount"]);
        $total = $total + $amount;
    }

    $rs2 = Database::search("SELECT * FROM `prices` WHERE `grade` = '" . $grade . "';");
    $data2 = $rs2->fetch_assoc();
    $needAmount = intval($data2["price"]);

    if ($total == $needAmount) {
        Database::iud("UPDATE `students` SET `payment_status_id`='1' WHERE `id` = '" . $_SESSION["us"]["id"] . "';");
    }

    echo "success";
}
