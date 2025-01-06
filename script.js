function abc() {


    var usertype = document.getElementById("usertype").value;

    // alert(usertype);

    window.location = "index.php?a=" + usertype;
}




//for all users signing without a verification code
function si(type) {

    var un;
    var pw;
    var vc;



    if (type == "verify") {
        un = document.getElementById("un").value;
        pw = document.getElementById("pw").value;
        vc = document.getElementById("vc").value;
        remember = document.getElementById("remember").checked;
    } else {
        un = document.getElementById("un").value;
        pw = document.getElementById("pw").value;
        remember = document.getElementById("remember").checked;


    }




    var formData = new FormData();

    if (type == "verify") {
        formData.append("u", un);
        formData.append("p", pw);
        formData.append("vc", vc);
        formData.append("type", type);
        formData.append("remember", remember);
    } else {
        formData.append("u", un);
        formData.append("p", pw);
        formData.append("type", type);
        formData.append("remember", remember);
    }


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == "successAdmin") {
                window.location = "adminPanel.php";
            } else if (text == "successAcademic officer") {
                window.location = "academiOfficerArea.php";
            } else if (text == "successTeacher") {
                window.location = "TeacherArea.php";
            } else if (text == "successStudent") {
                window.location = "studentArea.php";
            } else if (text == "do_verify") {
                var a1 = "do_verify";
                window.location = "index.php?a=" + a1;
            } else {

                document.getElementById("msg").innerHTML = text;
            }
        }
    };

    r.open("POST", "SignInProcess.php", true);
    r.send(formData);
}
//for all users signing with a verification code
function si2() {

    vc = document.getElementById("vc").value;

    var formData = new FormData();
    formData.append("vc", vc);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;
            var text = r.responseText;

            if (text == "successAdmin") {
                window.location = "adminPanel.php";
            } else if (text == "successAcademic officer") {
                window.location = "academiOfficerArea.php";
            } else if (text == "successTeacher") {
                window.location = "TeacherArea.php";
            } else if (text == "successStudent") {
                window.location = "studentArea.php";
            } else {

                document.getElementById("msg").innerHTML = text;
            }

        }
    };

    r.open("POST", "SignInProcess2.php", true);
    r.send(formData);

}

//for change image when the image is selected near the image uplading...
function changeImage() {

    var image = document.getElementById("imguploader");
    var view = document.getElementById("prev");

    image.onchange = function() {

        var file = this.files[0];
        var url = window.URL.createObjectURL(file);

        view.src = url;
    }

}

function changeImageByDocument() {
    // alert("ok");
    var image = document.getElementById("fileuploader");
    var view = document.getElementById("prev").src = "Images/fileUploaded.svg";

}

//teacher registration
function teacherReg() {

    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var dob = document.getElementById("dob").value;
    var gender = document.getElementById("gender").value;
    var nic = document.getElementById("nic").value;
    var mobile = document.getElementById("mobile").value;
    var address = document.getElementById("address").value;
    var email = document.getElementById("email").value;
    var uname = document.getElementById("uname").value;
    var password = document.getElementById("password").value;
    var fname = document.getElementById("fname").value;
    var image = document.getElementById("imguploader").files[0];



    var f = new FormData();
    f.append("fname", fname);
    f.append("lname", lname);
    f.append("dob", dob);
    f.append("gender", gender);
    f.append("nic", nic);
    f.append("mobile", mobile);
    f.append("address", address);
    f.append("email", email);
    f.append("uname", uname);
    f.append("password", password);
    f.append("image", image);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;


            if (text == "success") {
                alert("Teacher registation successfull");
            } else {

                document.getElementById("msg").innerHTML = text;
            }
        }

    };

    r.open("POST", "teacherRegistationProcess.php", true);
    r.send(f);
}

function gotoTeachers() {
    window.location = "teacherRegistation.php";
}


function gotoAdminPanel() {
    window.location = "adminPanel.php";
}

function gotoAdademicOficers() {
    window.location = "academicOfficerRegistation.php";
}



//get teacher/academic oficer/student dp process in admin panel administration

function getDpAdmin(type) {

    // alert("ok");

    var id;
    if (type == "admin") {
        $id = 0;
    } else {
        id = document.getElementById("id").value;
    }


    var f = new FormData();
    f.append("id", id);
    f.append("type", type);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;

            var arr = JSON.parse(t);

            var image = arr["image"];
            var fname = arr["fname"];
            var lname = arr["lname"];


            document.getElementById("prev").src = image;
            document.getElementById("name").innerHTML = "" + fname + lname;


            fillcurrentvalues(type, id);
        }
    };

    r.open("POST", "getDpprocess.php", true);
    r.send(f);
}

function getDp(type) {

    // alert("ok");

    var id;
    if (type == "admin") {
        $id = 0;
    } else {
        id = document.getElementById("id").value;
    }


    var f = new FormData();
    f.append("id", id);
    f.append("type", type);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {
            var t = r.responseText;

            var arr = JSON.parse(t);

            var image = arr["image"];
            var fname = arr["fname"];
            var lname = arr["lname"];
            var email = arr["email"];


            document.getElementById("prev").src = image;
            fillcurrentvalues(type, id);

        }
    };

    r.open("POST", "getDpprocess.php", true);
    r.send(f);
}

//Teachers update part by admin
function updateTeacherByAdmin() {

    var id = document.getElementById("id").value;
    var grade = document.getElementById("grade").value;
    var subject = document.getElementById("subject").value;
    var status = document.getElementById("status").value;

    var f = new FormData();
    f.append("id", id);
    f.append("grade", grade);
    f.append("subject", subject);
    f.append("status", status);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            if (t == "Update successfull") {
                alert("Teacher update successfull");

                document.getElementById("msg").innerHTML = t;
            } else {

                document.getElementById("msg").innerHTML = t;
            }
        }

    };

    r.open("POST", "teacherUpdateByAdmin.php", true);
    r.send(f);

}

//fill the teachers data when page statrt in teachers manging section
function fillcurrentvalues(type, id) {

    var f = new FormData();
    f.append("id", id);
    f.append("type", type);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            // alert(t);
            var array = JSON.parse(t);

            if (type == "teacher") {

                var id = array["id"];
                var subject = array["subject"];
                var grade = array["grade"];
                var status = array["status"];

                document.getElementById("id").value = id;
                document.getElementById("grade").value = grade;
                document.getElementById("subject").value = subject;
                document.getElementById("status").value = status;

            } else if (type == "academicOfficer") {



                var id = array["id"];
                var teachers = array["teachers"];
                var notes = array["notes"];
                var status = array["status"];

                document.getElementById("id").value = id;
                document.getElementById("notes").value = notes;
                document.getElementById("teachers").value = teachers;
                document.getElementById("status").value = status;

            } else if (type == "student") {

                // alert("a student");

                var id = array["id"];
                var grade = array["grade"];
                var payment = array["payment"];
                var status = array["status"];

                document.getElementById("id").value = id;
                document.getElementById("grade").value = grade;
                document.getElementById("payment").value = payment;
                document.getElementById("status").value = status;

            } else if (type == "admin") {

                var fname = array["fname"];
                var lname = array["lname"];
                var email = array["email"];
                var gender = array["gender"];
                var username = array["username"];
                var password = array["password"];

                document.getElementById("fname").value = fname;
                document.getElementById("lname").value = lname;
                document.getElementById("email2").value = email;
                document.getElementById("gender").value = gender;
                document.getElementById("username").value = username;
                document.getElementById("password").value = password;
            }
        }

    };

    r.open("POST", "Filling.php", true);
    r.send(f);
}

//for accademic officer registrstion
function academicOfficerReg() {


    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var dob = document.getElementById("dob").value;
    var gender = document.getElementById("gender").value;
    var nic = document.getElementById("nic").value;
    var mobile = document.getElementById("mobile").value;
    var address = document.getElementById("address").value;
    var email = document.getElementById("email").value;
    var uname = document.getElementById("uname").value;
    var password = document.getElementById("password").value;
    var fname = document.getElementById("fname").value;
    var image = document.getElementById("imguploader").files[0];



    var f = new FormData();
    f.append("fname", fname);
    f.append("lname", lname);
    f.append("dob", dob);
    f.append("gender", gender);
    f.append("nic", nic);
    f.append("mobile", mobile);
    f.append("address", address);
    f.append("email", email);
    f.append("uname", uname);
    f.append("password", password);
    f.append("image", image);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;
            alert(text);

            if (text == "success") {
                alert("Academic Officer registation successfull");
            } else {

                document.getElementById("msg").innerHTML = text;
            }
        }

    };

    r.open("POST", "academicOfficerRegistationProcess.php", true);
    r.send(f);

}
//for stdent registration
function studentReg() {


    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var dob = document.getElementById("dob").value;
    var gender = document.getElementById("gender").value;
    var grade = document.getElementById("grade").value;
    var mobile = document.getElementById("mobile").value;
    var address = document.getElementById("address").value;
    var email = document.getElementById("email").value;
    var uname = document.getElementById("uname").value;
    var password = document.getElementById("password").value;
    var payment_option = document.getElementById("payment_option").value;
    var image = document.getElementById("imguploader").files[0];



    var f = new FormData();
    f.append("fname", fname);
    f.append("lname", lname);
    f.append("dob", dob);
    f.append("gender", gender);
    f.append("grade", grade);
    f.append("mobile", mobile);
    f.append("address", address);
    f.append("email", email);
    f.append("uname", uname);
    f.append("password", password);
    f.append("image", image);
    f.append("payment_option", payment_option);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;
            // alert(text);

            if (text == "success") {
                alert("Academic Officer registation successfull");
            } else {

                document.getElementById("msg").innerHTML = text;
            }
        }

    };

    r.open("POST", "studentRegistationProcess.php", true);
    r.send(f);

}

function updateAcademicOfficerByAdmin() {

    var id = document.getElementById("id").value;
    var notes = document.getElementById("notes").value;
    var teachers = document.getElementById("teachers").value;
    var status = document.getElementById("status").value;

    var f = new FormData();
    f.append("id", id);
    f.append("notes", notes);
    f.append("teachers", teachers);
    f.append("status", status);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            if (t == "Update successfull") {
                alert("academic officer update successfull");

                document.getElementById("msg").innerHTML = t;
            } else {

                document.getElementById("msg").innerHTML = t;
            }
        }

    };

    r.open("POST", "academicOfficerUpdateByAdmin.php", true);
    r.send(f);

}

//admin profile update

function AdminProfileUpdate() {

    // alert("ok");

    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email2").value;
    var gender = document.getElementById("gender").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var image = document.getElementById("imguploader").files[0];



    var f = new FormData();
    f.append("fname", fname);
    f.append("lname", lname);
    f.append("email", email);
    f.append("gender", gender);
    f.append("username", username);
    f.append("password", password);
    f.append("image", image);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            alert(t);

            if (t == "Update successfull") {

                document.getElementById("msg").innerHTML = t;
            } else {

                document.getElementById("msg").innerHTML = t;
            }
        }

    };

    r.open("POST", "AdminProfileUpdateUpdate.php", true);
    r.send(f);

}

function signout() {
    window.location = "signout.php";
}

//get teacher/academic oficer/student dp process in their profile area



function getDp3() {

    //alert("ok");


   var r = new XMLHttpRequest();

   r.onreadystatechange = function() {

       if (r.readyState == 4) {
           var t = r.responseText;
           // alert(t);

           var arr = JSON.parse(t);


           var image = arr["image"];
           var type = arr["type"];


           document.getElementById("prev").src = image;


           fillcurrentvalues2(type);
       }
   };

   r.open("POST", "GetDpprocess2.php", true);
   r.send();
}




function getDp2() {
    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            var arr = JSON.parse(t);

            var image = arr["image"];
            var fname = arr["fname"];
            var lname = arr["lname"];
            
            // Update the name displayed on the page
            document.getElementById("prev").src = image;
            document.getElementById("user-name").innerHTML = "" + fname + " " + lname;
        }
    };

    r.open("POST", "GetDpprocess2.php", true);
    r.send();
}


//Get adcdemic offcer,student,teacher details for the relevet input fields
function fillcurrentvalues2(type) {



    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            // alert(t);
            var array = JSON.parse(t);

            if (type == "Academic officer") {

                var fname = array["fname"];
                var lname = array["lname"];
                var email = array["email"];
                var dob = array["dob"];
                var gender_id = array["gender_id"];
                var nic = array["nic"];
                var mobile = array["mobile"];
                var address = array["address"];
                var user_name = array["user_name"];
                var password = array["password"];


                document.getElementById("fname").value = fname;
                document.getElementById("lname").value = lname;
                document.getElementById("email2").value = email;
                document.getElementById("dob").value = dob;
                document.getElementById("gender").value = gender_id;
                document.getElementById("nic").value = nic;
                document.getElementById("address").value = address;
                document.getElementById("mobile").value = mobile;
                document.getElementById("username").value = user_name;
                document.getElementById("password").value = password;


            } else if (type == "Teacher") {



                var fname = array["fname"];
                var lname = array["lname"];
                var email = array["email"];
                var dob = array["dob"];
                var gender_id = array["gender_id"];
                var nic = array["nic"];
                var email = array["email"];
                var mobile = array["mobile"];
                var address = array["address"];
                var user_name = array["user_name"];
                var password = array["password"];


                document.getElementById("fname").value = fname;
                document.getElementById("lname").value = lname;
                document.getElementById("email2").value = email;
                document.getElementById("dob").value = dob;
                document.getElementById("gender").value = gender_id;
                document.getElementById("nic").value = nic;
                document.getElementById("address").value = address;
                document.getElementById("mobile").value = mobile;
                document.getElementById("username").value = user_name;
                document.getElementById("password").value = password;


            } else if (type == "Student") {

                // alert("a student");


                var fname = array["fname"];
                var lname = array["lname"];
                var email = array["email"];
                var dob = array["dob"];
                var gender_id = array["gender_id"];
                var grade = array["grade"];
                var email = array["email"];
                var mobile = array["mobile"];
                var address = array["address"];
                var user_name = array["user_name"];
                var password = array["password"];


                //in this case the 'grade' text field has being assigned id as 'nic'  accoding to this process.

                document.getElementById("fname").value = fname;
                document.getElementById("lname").value = lname;
                document.getElementById("email2").value = email;
                document.getElementById("dob").value = dob;
                document.getElementById("gender").value = gender_id;
                document.getElementById("nic").value = grade;
                document.getElementById("address").value = address;
                document.getElementById("mobile").value = mobile;
                document.getElementById("username").value = user_name;
                document.getElementById("password").value = password;

            }
        }

    };

    r.open("POST", "Filling2.php", true);
    r.send();
}

//academic officer profile update
function Ao_t_sProfileUpdate() {

    //alert("ok");

    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var email = document.getElementById("email2").value;
    var dob = document.getElementById("dob").value;
    var gender = document.getElementById("gender").value;
    var nic = document.getElementById("nic").value;
    var address = document.getElementById("address").value;
    var mobile = document.getElementById("mobile").value;
    var user_name = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var image = document.getElementById("imguploader").files[0];



    var f = new FormData();
    f.append("fname", fname);
    f.append("lname", lname);
    f.append("email", email);
    f.append("dob", dob);
    f.append("gender", gender);
    f.append("nic", nic);
    f.append("address", address);
    f.append("mobile", mobile);
    f.append("username", user_name);
    f.append("password", password);
    f.append("image", image);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            //alert(t);

            if (t == "Update successfull") {

                document.getElementById("msg").innerHTML = t;
            } else {

                document.getElementById("msg").innerHTML = t;
            }
        }

    };

    r.open("POST", "UserUpdate.php", true);
    r.send(f);

}

function gotoStudentReg() {
    window.location = "studentRegistation.php";
}

function gotoAcademicOfficerProfile() {
    window.location = "academiOfficerArea.php";
}

function gotoaddassignments() {
    window.location = "addAssignments.php";
}

function gototeacherarea() {
    window.location = "TeacherArea.php";
}

function gotoTeacherprofile(){
    window.location = "teacherProfile.php";
}

function gotoStudentarea() {
    window.location = "studentArea.php";
}

function gotoStudentprofile(){
    window.location = "studentProfile.php";
}

function gotoAdminprofile(){
    window.location = "adminprofile.php";
}
function gotoAcademicprofile(){
    window.location = "academicOfficerProfile.php";
}
function gotoAcademicfficerArea(){
    window.location = "academiOfficerArea.php";
}


//for upload assignments
function uploadpdf1() {
    // alert("ok");

    var subject = document.getElementById("subject").value;
    var grade = document.getElementById("grade").value;
    var duration = document.getElementById("duration").value;
    var pdf = document.getElementById("fileuploader").files[0];

    var form = new FormData();
    form.append("subject", subject);
    form.append("grade", grade);
    form.append("duration", duration);
    form.append("pdf", pdf);


    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;

            // alert(t);

            if (t == "success") {
                alert("Assignment Add")
                document.getElementById("msg").innerHTML = t;
            } else {
                alert("Assignment Adding Error")
                document.getElementById("msg").innerHTML = t;
            }
        }
    };

    r.open("POST", "uploadPDF.php", true);
    r.send(form);
}

function gotoStudentArea() {
    window.location = "studentArea.php";
}

function gotoStudentAssignments() {

    window.location = "studentAssignmentsArea.php";
}

function gotoLectureNotes() {
    window.location = "addLectureNotes.php";
}

function gotoStudentLectureNotes() {
    window.location = "studentLectureNotes.php";
}


//for upload lecture notes
function uploadpdf2() {
    // alert("ok");

    var subject = document.getElementById("subject").value;
    var grade = document.getElementById("grade").value;
    var topic = document.getElementById("topic").value;
    var pdf = document.getElementById("fileuploader").files[0];

    var form = new FormData();
    form.append("subject", subject);
    form.append("grade", grade);
    form.append("topic", topic);
    form.append("pdf", pdf);



    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;

            // alert(t);

            if (t == "success") {
                document.getElementById("msg").innerHTML = t;
            } else {
                document.getElementById("msg").innerHTML = t;
            }
        }
    };

    r.open("POST", "uploadPDF2.php", true);
    r.send(form);
}

function mangeStudents() {
    window.location = "manageStudents.php";
}

//for admin student updating process
function studentsUpdateByAdmin() {
    // alert("ok");

    var id = document.getElementById("id").value;
    var grade = document.getElementById("grade").value;
    var payment = document.getElementById("payment").value;
    var status = document.getElementById("status").value;

    var f = new FormData();
    f.append("id", id);
    f.append("grade", grade);
    f.append("payment", payment);
    f.append("status", status);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var t = r.responseText;
            if (t == "Update successfull") {

                document.getElementById("msg").innerHTML = t;
            } else {

                document.getElementById("msg").innerHTML = t;
            }
        }

    };

    r.open("POST", "studentsUpdateByAdmin.php", true);
    r.send(f);
}



function uploadAnswers(id) {
    // alert(id);

    var pdf = document.getElementById("fileuploader").files[0];


    var f = new FormData();
    f.append("pdf", pdf);
    f.append("id", id);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;
            // alert(text);
            if (text == "success") {
                alert("Your answers are successfully submited");
            } else {
                alert("Somthing went wrong. Try again");
            }

        }
    };

    r.open("POST", "uploadAnswers.php", true);
    r.send(f);
}

function gotoCheckAssignments() {
    window.location = "checkAssignments.php";
}

var as_id;

var a1 = 0;
var id_before;
var id_after;
var idcliked;

function parseAssignmentId(id, i2) {

    if (a1 == 0) {
        id_before = i2;
    } else {
        id_after = i2;
    }

    as_id = id;
    idcliked = i2;

    var r = new XMLHttpRequest;

    var form = new FormData();
    form.append("selectAS", id);

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;
            // alert(text);
            document.getElementById("tbody").innerHTML = text;
            if (a1 == 0) {

                document.getElementById(id_before).className = "row li bg-warning my-2";

            } else {
                document.getElementById(id_before).className = "row li my-2";
                document.getElementById(id_after).className = "row li bg-warning my-2";
                id_before = id_after;
            }

            a1 += 1;


        }
    };

    r.open("POST", "getAnswersByassignments.php", true);
    r.send(form);
}

var as_id2;

var a2 = 0;
var id_before2;
var id_after2;
var idcliked2;

//for create the managerResult page animations and data loading part
function parseAssignmentId2(id, i2, i3, sid) {

    if (a2 == 0) {
        id_before2 = i2 + "_" + i3;
    } else {
        id_after2 = i2 + "_" + i3;
    }

    // alert(id_before2);
    // alert(id_after2);

    as_id2 = id;
    idcliked2 = i2 + i3;

    var r = new XMLHttpRequest;

    var form = new FormData();
    form.append("selectAS", id);
    form.append("sid", sid);

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;
            // alert(text);
            document.getElementById("tbody").innerHTML = text;
            if (a2 == 0) {

                document.getElementById(id_before2).className = "row li bg-warning my-2";

            } else {
                document.getElementById(id_before2).className = "row li my-2";
                document.getElementById(id_after2).className = "row li bg-warning my-2";
                id_before2 = id_after2;
            }

            a2 += 1;


        }
    };

    r.open("POST", "getAnswersByassignments2.php", true);
    r.send(form);
}

//gettings marks for inserting to assignments
function insertMarks(sid, iid) {
    var marks = document.getElementById("thismarks" + iid).value;
    // alert(as_id + " " + marks);



    var form = new FormData();
    form.append("sid", sid);
    form.append("id", as_id);
    form.append("marks", marks);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;
            // alert(text);

            if (text == "success") {
                alert("Marks added");
                parseAssignmentId(as_id, idcliked);
            } else {
                alert("error occured");
            }

        }
    };

    r.open("POST", "insertMarks.php", true);
    r.send(form);
}

function gotoResultManagingArea() {
    window.location = "resultsManegingArea.php";
}

//getting details for update assignment marks
function insertMarks2(sid, aid, marks) {


    // alert(sid);
    // alert(aid);
    // alert(marks);


    var form = new FormData();
    form.append("sid", sid);
    form.append("aid", aid);
    form.append("marks", marks);

    var r = new XMLHttpRequest;

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;
            // alert(text);

            if (text == "success") {
                alert("Marks added");
                // parseAssignmentId(as_id, idcliked);
            } else {
                alert("error occured");
            }

        }
    };

    r.open("POST", "insertMarks2.php", true);
    r.send(form);
}

function gotoResultsArea() {
    window.location = "resultsView.php";
}

function gotoPaymentArea() {
    window.location = "studentsPaymentArea.php";
}
var bm;

function payModelOpen() {
    //alert("ok");

    var studentname = document.getElementById("studentname").value;
    var email = document.getElementById("email2").value;
    var amount = document.getElementById("amount").value;
    var grade = document.getElementById("grade").value;
    

    if (studentname == "") {
        document.getElementById("msg2").innerHTML = "please enter your name";
    } else if (email == "") {
        document.getElementById("msg2").innerHTML = "please enter the email";
    } else if (amount == "") {
        document.getElementById("msg2").innerHTML = "please enter the amount";
    } else if (grade == "") {
        document.getElementById("msg2").innerHTML = "please enter the grade";
    } else {

        var m = document.getElementById("paymentGetwayModel");
        bm = new bootstrap.Modal(m);
        bm.show();

    }


}

//for payment
function payment() {
    // alert("ok");

    var ch = document.getElementById("ch").value;
    var cn = document.getElementById("cn").value;
    var ed = document.getElementById("ed").value;
    var cvc = document.getElementById("cvc").value;

    var amount = document.getElementById("amount").value;
    var grade = document.getElementById("grade").value;


    var form = new FormData();
    form.append("ch", ch);
    form.append("cn", cn);
    form.append("ed", ed);
    form.append("cvc", cvc);

    form.append("amount", amount);
    form.append("grade", grade);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;

            if (text == "success") {
                document.getElementById("msg").innerHTML = "Payment Successfull";
                bm.hide();
            } else {
                document.getElementById("msg").innerHTML = text;
            }
            document.getElementById("msg").innerHTML = text;
        }
    }

    r.open("POST", "paymentProcess.php", true);
    r.send(form);
}


var bm2;

//open fogot password model
function fogotPasswordmodel() {

    var type = document.getElementById("usertype").value;

    if (type == "SELECT THE USER TYPE") {
        alert("Please select the user type first");
        bm2.hide();
    } else if (type == "Admin") {
        bm2.hide();
    }

    var m = document.getElementById("fogetPasswordModel");
    bm2 = new bootstrap.Modal(m);
    bm2.show();
}

//fogetpassword email sending JS process
function sendVerificationCode(type) {

    var email = document.getElementById("e").value;


    var r = new XMLHttpRequest();

    var form = new FormData();
    form.append("e", email);
    form.append("type", type);

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;
            if (text == 'Success') {

                alert("Verification email sent.Please check your email");

            } else {
                alert(text);
            }

        };


    }

    r.open("POST", "fogetPasswordProcess.php", true);
    r.send(form);
}

//fogotpassword password reseting process 
function resetPassword(type) {


    var e = document.getElementById("e");
    var np = document.getElementById("np");
    var rnp = document.getElementById("rnp");
    var vc = document.getElementById("vc");

    var form = new FormData();

    form.append("e", e.value);
    form.append("np", np.value);
    form.append("rnp", rnp.value);
    form.append("vc", vc.value);
    form.append("type", type);


    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {

        if (r.readyState == 4) {

            var text = r.responseText;

            if (text == "Success") {

                alert("Password rest successfull");

                bm2.hide();


            } else {
                alert(text);
            }

        }

    };



    r.open("POST", "resetPasswordProcess.php", true);
    r.send(form);
}

// show and hidden password in fogotpassword model
function showPassword1() {

    var np = document.getElementById("np");
    var nb1 = document.getElementById("nb1");

    if (nb1.innerHTML == "Show") {
        np.type = "text";
        nb1.innerHTML = "Hide";

    } else {

        np.type = "password";
        nb1.innerHTML = "Show";

    }

}

function showPassword2() {

    var rnp = document.getElementById("rnp");
    var nb1 = document.getElementById("nb2");

    if (nb1.innerHTML == "Show") {
        rnp.type = "text";
        nb2.innerHTML = "Hide";

    } else {

        rnp.type = "password";
        nb2.innerHTML = "Show";

    }

}