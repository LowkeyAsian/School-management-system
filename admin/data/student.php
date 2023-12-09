<?php 

// All Students 
function getallStudents($conn){
   $sql = "SELECT * FROM students";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $students = $stmt->fetchAll();
     return $students;
   }else {
   	return 0;
   }
}

// DELETE
function removeStudent($id, $conn){
   $sql  = "DELETE FROM students
           WHERE student_id=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}

// Get Teacher by ID
function getStudentById($id, $conn){
   $sql = "SELECT * FROM students
           WHERE student_id=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() == 1) {
     $student = $stmt->fetch();
     return $student;
   }else {
    return 0;
   }
}


// Check if the username Unique
function unameIsUnique($uname, $conn, $student_id=0){
   $sql = "SELECT username, student_id FROM students
           WHERE username=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);
   
   if ($student_id == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() >= 1) {
       $student = $stmt->fetch();
       if ($student['student_id'] == $student_id) {
         return 1;
       }else {
        return 0;
      }
     }else {
      return 1;
     }
   }
   
}


function searchStudents($key, $conn) {
  $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);
{
  $sql = "select * from students where student_id like ?
  or fname like ?
  or lname like ?
  or address like ?
  or gender like ?
  or parent_fname like ?
  or email_address like ?
  or parent_lname like ?
  or parent_phone_number like ?
  or username like ?";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key, $key, $key]);

  if ($stmt->rowCount() == 1) {
      $students = $stmt->fetchAll();
      return $students;
  } else {
      return 0;
  }
}
}

 ?>