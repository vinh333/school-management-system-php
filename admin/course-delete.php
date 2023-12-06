<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['course_id'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/subject.php";

     $id = $_GET['course_id'];
     if (removeCourse($id, $conn)) {
     	$sm = "Xóa thành công!";
        header("Location: course.php?success=$sm");
        exit;
     } else {
        $em = "Đã xảy ra lỗi không xác định";
        header("Location: course.php?error=$em");
        exit;
     }

  } else {
    header("Location: course.php");
    exit;
  } 
} else {
	header("Location: course.php");
	exit;
} 
?>
