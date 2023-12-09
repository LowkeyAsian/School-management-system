<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['r_user_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../db_connect.php";
     include "data/register_office.php";

     $id = $_GET['r_user_id'];
     if (removeRUser($id, $conn)) {
     	$sm = "Successfully deleted!";
        header("Location: register_office.php?success=$sm");
        exit;
     }else {
        $em = "Unknown error occurred";
        header("Location: register_office.php?error=$em");
        exit;
     }


  }else {
    header("Location: register_office.php");
    exit;
  } 
}else {
	header("Location: register_office.php");
	exit;
} 