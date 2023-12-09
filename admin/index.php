<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {


?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Admin Of Chakra</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
            <link rel="stylesheet" href="../css/style.css">
            <link rel="icon" href="../logo.png">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        </head>

        <body>
            <?php
            include "inc/navbar.php"

            ?>
            
            <div class="container mt-5">
                <div class="container text-center">
                    <div class="row row-cols-5">
                        <a href="teacher.php" class="btn btn-dark m-2 py-3">
                        <i class="fa fa-user-circle-o fs-1" aria-hidden="true"></i> <Br>
                            Teachers</a>
                            <a href="student.php" class="btn btn-dark m-2 py-3">
                            <i class="fa fa-graduation-cap fs-1" aria-hidden="true"></i> <Br> 
                            Students</a>
                            <a href="register_office.php" class="btn btn-dark m-2 py-3">
                        <i class="fa fa-pencil-square fs-1" aria-hidden="true"></i>  <Br>
                            Registrar-Office</a>
                            <a href="class.php" class="btn btn-dark m-2 py-3">
                            <i class="fa fa-laptop fs-1" aria-hidden="true"></i>  <Br>
                            Class</a>
                            <a href="section.php" class="btn btn-dark m-2 py-3">
                        <i class="fa fa-puzzle-piece fs-1" aria-hidden="true"></i>  <Br>
                            Section</a>
                            <a href="grade.php" class="btn btn-dark m-2 py-3">
                        <i class="fa fa-level-up fs-1" aria-hidden="true"></i>  <Br>
                            Grade</a>
                            <a href="course.php" class="btn btn-dark m-2 py-3">
                        <i class="fa fa-book fs-1" aria-hidden="true"></i>  <Br>
                            Course</a>
                            <a href="message.php" class="btn btn-dark m-2 py-3">
                        <i class="fa fa-comment-o fs-1" aria-hidden="true"></i>  <Br>
                            Message</a>
                            <a href="" class="btn btn-warning m-1 py-3 col-5">
                        <i class="fa fa-cogs fs-1" aria-hidden="true"></i>  <Br>
                            Settings</a>

                            <a href="../logout.php" class="btn btn-danger m-1 py-3 col-5">
                        <i class="fa fa-sign-out fs-1" aria-hidden="true"></i>  <Br>
                            Logout</a>
                    </div>
                </div>
            </div>


            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

            <script>
                $(document).ready(function() {
                    $("#navLinks li:nth-child(1) a").addClass('active');
                });
            </script>

        </body>

        </html>
<?php
    } else {
        header("Location: ../login.php");
        exit;
    }
} else {
    header("Location: ../login.php");
    exit;
} ?>