<?php

session_start();
require "connection.php";

$selectAS = $_POST["selectAS"];
$s_id = $_POST["sid"];

$rs = Database::search("SELECT * FROM `resultsheets` WHERE `assignments_id` = '".$selectAS."' AND `students_id` = '".$s_id."';");

$n = $rs->num_rows;
// echo $n;
if ($n >= 1) {


    for ($i = 0; $i < $n; $i++) {
        $d = $rs->fetch_assoc();
?>

        <tr>
            
            <td><?php echo $d["students_id"] ?></td>
            <td><?php echo $d["marks"] ?></td>


           

            <td>
                <div class="row mx-1 my-1 ">
                    
                    <div class="col-12 offset-lg-2 col-lg-8 d-grid">
                        <button class="btn btn-light text-black-50 text-center" onclick='insertMarks2(<?php echo $d["students_id"] ?>,<?php echo $d["assignments_id"] ?>,<?php echo $d["marks"] ?>);'>Send to student</button>
                    </div>
                </div>
            </td>

        </tr>


<?php
    }
}
?>