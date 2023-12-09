<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        include "../db_connect.php";
        include "data/subject.php";
        include "data/section.php";
        include "data/grade.php";
        include "data/class.php";
        $subjects =  getallSubjects($conn);
        $classes = getallClasses($conn);


    
        $fname = '';
        $lname = '';
        $uname = '';
        $address = '';
        $en = '';
        $pn = '';
        $qf = '';
        $email = '';

        if (isset($_GET['fname'])) $fname = $_GET['fname'];
        if (isset($_GET['lname'])) $lname = $_GET['lname'];
        if (isset($_GET['uname'])) $uname = $_GET['uname'];
        if (isset($_GET['address'])) $address = $_GET['address'];
        if (isset($_GET['en'])) $en = $_GET['en'];
        if (isset($_GET['pn'])) $pn = $_GET['pn'];
        if (isset($_GET['qf'])) $qf = $_GET['qf'];
        if (isset($_GET['email'])) $email = $_GET['email'];


?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin | Add-Teachers</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="icon" href="../logo.png">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        </head>

        <body>
            <?php
            include "inc/navbar.php";


            ?>
            <div class="container mt-5">
                <a href="teacher.php" class="btn btn-outline-warning">Return</a>



                <div class="d-flex justify-content-center  flex-column">
                    <form class="shadow p-5 mt-4 form-w justify-content-center" method="post" action="req/teacher-add.php">

                        <h3>Add Teacher</h3>
                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $_GET['error'] ?>
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success" role="alert">
                                <?= $_GET['success'] ?>
                            </div>
                        <?php } ?>
                        <div class="mb-3">
                            <label class="form-label">First name</label>
                            <input type="text" class="form-control" value="<?=$fname?>" name="fname">
                        </div>

                            <div class="mb-3">
                                <label class="form-label">Last name</label>
                                <input type="text" class="form-control" value="<?=$lname?>" name="lname">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" value="<?=$uname?>" name="username">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" name="pass" id="passInput">
                                    <button class="btn btn-outline-secondary" id="gBtn">Generate Password</button>
                                </div>
                            </div>

                            <div class="mb-3">
                            <label class="form-label">Address</label>
                            <input type="text" class="form-control" value="<?=$address?>" name="address">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Employee Number</label>
                            <input type="text" class="form-control" value="<?=$en?>" name="Employee Number">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">DOB</label>
                            <input type="date" class="form-control" value="<?=$pn?>" name="DOB">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control" value="" name="Phone Number">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Qualification</label>
                            <input type="text" class="form-control" value="<?=$qf?>" name="Qualification">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gender</label> <br>
                            <input type="radio"  value="Male" checked name="Gender">Male &nbsp; &nbsp; &nbsp; &nbsp;
                            <input type="radio"  value="Female" name="Gender">Female
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email_address</label>
                            <input type="text" class="form-control" value="<?=$email?>" name="Email_address">
                        </div>

                       


                            <div class="mb-3">
                                <label class="form-label">Subject</label>
                                <div class="row row-cols-5">
                                    <?php foreach ($subjects as $subject) :

                                    ?>
                                        <div class="col"><input type="checkbox" name="subjects[]" value="<?= $subject['subject_id'] ?>">
                                            <?= $subject['subject'] ?></div>
                                      
                                    <?php endforeach ?>
                              
                                 

                                </div>
                                
                            </div>
                                <div class="mb-3">
                                    <label class="form-label">Class</label>
                                    <div class="row row-cols-5">
                                        <?php foreach ($classes as $class) :
   
                                        ?>
                                            <div class="col"><input type="checkbox" name="classes[]" value="<?= $class['class_id'] ?>">
                                            <?php
                                       
                         $grade =  getGradeById($class['grade'], $conn);
                         $section =  getSectionById($class['section'], $conn);   


?>
                                                <?= $grade['grade_code'] ?>-<?= $grade['grade'].'('.$section['section'].')' ?></div>

                                        <?php endforeach ?>

                                    </div>
                                </div>

                                    <button type="submit" class="btn btn-outline-info">Add </button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>

            </form>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                $(document).ready(function() {
                    $("#navLinks li:nth-child(2)a").addClass('active');
                });


                function makePass(length) {
                    let result = '';
                    const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789?><:"{+_)(*&^%$#@!~`/.,;';
                    const charactersLength = characters.length;
                    let counter = 0;
                    while (counter < length) {
                        result += characters.charAt(Math.floor(Math.random() * charactersLength));
                        counter += 1;
                    }
                    var passInput = document.getElementById('passInput');
                    passInput.value = result;
                }
                var gBtn = document.getElementById('gBtn');
                gBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    makePass(8);
                });
            </script>


    <?php
    } else {
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
} ?>
        </body>

        </html>