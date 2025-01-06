<?php
session_start();
require "connection.php";
if (isset($_SESSION["us"])) {
?>

    <!DOCTYPE html>

    <html>

    <head>
        <title>CJ Academy | Teacher Panel | Check assigments</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="style.css" />
    </head>

    <body>
        <div class="container-fluid assignment-check-page-background">
            <div class="row">
                <div class="col-12">
                    <div class="col-12 d-flex justify-content-center mt-5 mb-5">
                        <div class="col-9 mb-4 mt-5 student-lec-note-btt">
                            <div class="col-12 mt-5">
                                <h1 class="text-center fw-bold openSans-extraBold mb-5">STUDENT PAYMENTS!</h1>
                                <hr>
                            </div>
                            <div class="col-12 ">
                                <div class="row">
                                    <div class="col-8 mx-auto">
                                        <form>
                                            <div class="form-group mb-3">
                                                <h5 class="text-danger  text-start ms3 mb-2" id="msg2"></h5>
                                                <label for="exampleInputEmail1">Student Name</label>
                                                <input type="text" id="studentname" class="form-control" placeholder="Enter your full name" />

                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" id="email2" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="inputState">Payment Option</label>
                                                <select disabled id="payment_option" class="form-control">
                                                    <?php
                                                    $rs = Database::search("SELECT * FROM `students` INNER JOIN `payment_structures` ON `payment_structures`.id = `students`.payment_structures_id  WHERE `students`.`id` = '" . $_SESSION["us"]["id"] . "';");
                                                    $n = $rs->num_rows;
                                                    for ($i = 0; $i < $n; $i++) {
                                                        $data = $rs->fetch_assoc();
                                                    ?>
                                                        <option value='<?php echo $data["payment_structures_id"]; ?>'><?php echo $data["name"]; ?></Php>
                                                        </option>
                                                    <?php
                                                    }

                                                    ?>
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="exampleInputEmail1">Amount</label>
                                                <input type="number" id="amount" class="form-control" placeholder="Select the amount" />
                                            </div>

                                            <div class="form-group mb-3">
                                                <label for="exampleInputEmail1">Grade which the payment for</label>
                                                <input type="text" class="form-control" placeholder="Type the grade" id="grade" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="col-5 mt-3 mx-auto ">
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-success" onclick="payModelOpen();">Process</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="whatsapp_float text-end">
                <a class="homeAnchor" onclick="gotoStudentarea();" target="_blank"><img src='Images/home.svg' width="100px" /></a>
            </div>
        </div>

        <!-- Model -->

        <div class="modal fade" tabindex="-1" id="paymentGetwayModel">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <div class="row g-3">

                            <div class="row">
                                <h5 class="text-danger  text-start ms3 mb-2" id="msg"></h5>
                            </div>


                            <div class="col-12">
                                <lable class="form-lable">Card Holder</lable>
                                <div class="input-group mb-3">
                                    <input class="form-control text-black-50 text-center" type="text" id="ch" />
                                </div>
                            </div>

                            <div class="col-12">
                                <lable class="form-lable">Card Number</lable>
                                <div class="input-group mb-3">
                                    <input class="form-control text-black-50 text-center" type="text" id="cn" />
                                </div>
                            </div>

                            <div class="col-12">
                                <lable class="form-lable">Expire Date</lable>
                                <div class="input-group mb-3">
                                    <input class="form-control text-black-50 text-center" type="text" id="ed" />
                                </div>
                            </div>

                            <div class="col-12">
                                <lable class="form-lable">CVC</lable>
                                <div class="input-group mb-3">
                                    <input class="form-control text-black-50 text-center" type="text" id="cvc" />
                                </div>
                            </div>

                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-warning" onclick="payment();">Pay</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
    </body>

    </html>

<?php

} else {
?>

    <script>
        window.location = "index.php";
    </script>
<?php
}
