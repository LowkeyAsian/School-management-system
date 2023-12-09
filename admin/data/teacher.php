<?php

function getTeacherById($teacher_id, $conn)
{
    $sql = "select * from teachers where teacher_id=?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([$teacher_id]);

    if ($stmt->rowCount() == 1) {
        $teacher = $stmt->fetch();
        return $teacher;
    } else {
        return 0;
    }
}


function getallTeachers($conn)
{
    $sql = "Select * from teachers";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() >= 1) {
        $teachers = $stmt->fetchall();
        return $teachers;
    } else {
        return 0;
    }
}


function unameIsUnique($uname, $conn, $teacher_id = 0)
{
    $sql = "Select username, teacher_id from teachers where username=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$uname]);
    
    if ($teacher_id == 0) {

        if ($stmt->rowCount() >= 1) {
            return 0;
        } else {
            return 1;
        }
    } else {
        if ($stmt->rowCount() >= 1) {
            $teacher = $stmt->fetch();
            if ($teacher['teacher_id'] == $teacher_id) {
                return 1;
            } else return 0;
        } else {
            return 1;
        }
    }
}

function removeTeacher($id, $conn)
{
    $sql = " delete from teachers where teacher_id=?";
    $stmt = $conn->prepare($sql);
    $re = $stmt->execute([$id]);

    if ($re) {
        return 1;
    } else {
        return 0;
    }
}



function searchTeachers($key, $conn) {
   
    $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);
{
    $sql = "select * from teachers where teacher_id like ?
    or fname like ?
    or lname like ?
    or address like ?
    or gender like ?
    or qualification like ?
    or email_address like ?
    or employee_number like ?
    or phone_number like ?
    or username like ?";

    $stmt = $conn->prepare($sql);
    $stmt->execute([ $key, $key, $key, $key, $key, $key, $key, $key, $key, $key]);

    if ($stmt->rowCount() == 1) {
        $teachers = $stmt->fetchAll();
        return $teachers;
    } else {
        return 0;
    }
}
}