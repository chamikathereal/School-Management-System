<?php

//load answer sheets of the assignments to the teacher assignment check area table....

session_start();
require "connection.php";
$selectAS = $_POST["selectAS"];

$rs = Database::search("SELECT submissions.assignments_id,submissions.pdf AS asnwers,subjects.name AS sname, students.fname,students.lname,submissions.marks,students.id AS s_id FROM submissions 
INNER JOIN assignments ON assignments.id = submissions.assignments_id 
INNER JOIN students ON students.id = submissions.students_id INNER JOIN 
subjects ON subjects.id = assignments.subjects_id  WHERE assignments.teachers_id='" . $_SESSION["ut"]["id"] . "' AND assignments.id = '" . $selectAS . "';");

$n = $rs->num_rows;
// echo $n;
if ($n >= 1) {


    for ($i = 0; $i < $n; $i++) {
        $d = $rs->fetch_assoc();
?>

        <tr>
            <td><?php echo $d["fname"] . " " . $d["lname"]; ?></td>
            <td><?php echo $d["assignments_id"] ?></td>
            <td><?php echo $d["sname"] ?></td>


            <td>
                <a class="link-danger" href="<?php echo $d['asnwers'] ?>">
                    <div class="col-10 offset-1">
                        <div class="row d-grid">
                            <lable for="pdfuploader" class="btn btn-danger">Answers</lable>
                        </div>
                    </div>
                </a>
            </td>
            <td>
                <div class="row mx-1 my-1 ">
                    <div class="col-12 col-lg-8">
                        <input class="form-control text-black-50 text-center" type="number" id="<?php echo "thismarks".$i; ?>". />
                    </div>
                    <div class="col-12 col-lg-4 d-grid">
                        <button class="btn btn-warning" onclick='insertMarks(<?php echo $d["s_id"] ?>,<?php echo $i ?>);'>Insert</button>
                    </div>
                </div>
            </td>

        </tr>


<?php
    }
}
?>