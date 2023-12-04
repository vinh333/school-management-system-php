<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['id_giao_vien'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/teacher.php";

     $id = $_GET['id_giao_vien'];
     if (removeTeacher($id, $conn)) {
     	$sm = "Xóa thành công!";
        header("Location: teacher.php?success=$sm");
        exit;
     }else {
        $em = "Đã xảy ra lỗi không xác định";
        header("Location: teacher.php?error=$em");
        exit;
     }


  }else {
    header("Location: teacher.php");
    exit;
  } 
}else {
	header("Location: teacher.php");
	exit;
} 
