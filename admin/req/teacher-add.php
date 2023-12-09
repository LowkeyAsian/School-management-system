<?php
session_start();
if (isset($_SESSION['admin_id']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {

        if (
            isset($_POST['fname']) &&
            isset($_POST['lname']) &&
            isset($_POST['username']) &&
            isset($_POST['pass']) &&
            isset($_POST['address']) &&
            isset($_POST['Employee_Number']) &&
            isset($_POST['Phone_Number']) &&
            isset($_POST['Qualification']) &&
            isset($_POST['Email_address']) &&
            isset($_POST['classes']) &&
            isset($_POST['DOB']) &&
            isset($_POST['subjects']) 
        ) {

            include '../../db_connect.php';
            include '../data/teacher.php';
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['username'];
            $pass = $_POST['pass'];
            $address = $_POST['address'];

            $employee_number = $_POST['Employee_Number'];
            $phone_number = $_POST['Phone_Number'];
            $qualification = $_POST['Qualification'];
            $email_address = $_POST['Email_address'];
            $gender = $_POST['Gender'];
            $date_of_birth = $_POST['DOB'];

            $subjects = "";
            foreach ($_POST['subjects'] as $subject) {
                $subjects .= $subject;
            }

            $classes = "";
            foreach ($_POST['classes'] as $class) {
                $classes .= $class;
            }

            $data = 'uname=' . $uname . '&fname=' . $fname . '&lname=' . $lname . '&address=' . $address . '&en=' . $employee_number . '&pn=' . $phone_number . '&qf=' . $qualification . '&email=' . $email_address;
            if (empty($fname)) {
                $em  = "First name is required";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else if (empty($lname)) {
                $em  = "Last name is required";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else if (empty($uname)) {
                $em  = "Username is required";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else if (!unameIsUnique($uname, $conn)) {
                $em  = "Username Taken! Lmao";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else if (empty($address)) {
                $em  = "address is required";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else if (empty($employee_number)) {
                $em  = "employee_number is required";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else if (empty($phone_number)) {
                $em  = "phone_number is required";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else if (empty($qualification)) {
                $em  = "qualification is required";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else if (empty($email_address)) {
                $em  = "email_address is required";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else if (empty($gender)) {
                $em  = "Gender is required";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else if (empty($date_of_birth)) {
                $em  = "date_of_birth is required";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else if (empty($pass)) {
                $em  = "Password is required";
                header("Location: ../teacher-add.php?error=$em&$data");
                exit;
            } else {

                $pass = password_hash($pass, PASSWORD_DEFAULT);

                $sql  = "INSERT INTO
                     teachers(username, password, fname, lname, class, subjects, address, employee_number, date_of_birth, phone_number, qualification, gender, email_address)
                     VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$uname, $pass, $fname, $lname, $classes, $subjects, $address, $employee_number, $date_of_birth, $phone_number, $qualification, $gender, $email_address]);
                $sm = "New teacher registered successfully";
                header("Location: ../teacher-add.php?success=$sm");
                exit;
            }
        } else {
            $em = "Error!!!";
            header("Location: ../teacher-add.php?error=$em");
            exit;
        }
    } else {
        header("Location: ../../logout.php");
        exit;
    }
} else {
    header("Location: ../../logout.php");
    exit;
}
