<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['section_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/section.php";

     $id = $_GET['section_id'];
     if (removeSection($id, $conn)) {
     	$sm = "Xóa thành công!";
        header("Location: section.php?success=$sm");
        exit;
     } else {
        $em = "Đã xảy ra lỗi không xác định";
        header("Location: section.php?error=$em");
        exit;
     }
  } else {
    header("Location: section.php");
    exit;
  } 
} else {
	header("Location: section.php");
	exit;
} 
?>
