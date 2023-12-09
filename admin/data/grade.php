<?php

function getallGrades($conn){
    $sql= "Select * from grades";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $grades = $stmt->fetchall();
        return $grades;


    }else {
        return 0;
    }
}



function getGradeById($grade_id, $conn){
    $sql = "select * from grades where grade_id=?";
   
    $stmt = $conn->prepare($sql);
    $stmt->execute([$grade_id]);

    if ($stmt->rowCount() == 1) {
        $grade = $stmt->fetch();
        return $grade;


    }else {
        return 0;
    }


}

// DELETE
function removeGrade($id, $conn){
    $sql  = "DELETE FROM grades
            WHERE grade_id=?";
    $stmt = $conn->prepare($sql);
    $re   = $stmt->execute([$id]);
    if ($re) {
      return 1;
    }else {
     return 0;
    }
 }


?>