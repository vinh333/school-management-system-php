<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['id_lop'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/class.php";

     $id = $_GET['id_lop'];
     if (removeClass($id, $conn)) {
     	$sm = "Xóa thành công!";
        header("Location: class.php?success=$sm");
        exit;
     } else {
        $em = "Đã xảy ra lỗi không xác định";
        header("Location: class.php?error=$em");
        exit;
     }

  } else {
    header("Location: class.php");
    exit;
  } 
} else {
	header("Location: class.php");
	exit;
} 
?>
