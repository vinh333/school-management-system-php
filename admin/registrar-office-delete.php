<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])     &&
    isset($_GET['id_phong_cong_tac_hssv'])) {

  if ($_SESSION['role'] == 'Admin') {
     include "../DB_connection.php";
     include "data/registrar_office.php";

     $id = $_GET['id_phong_cong_tac_hssv'];
     if (removeRUser($id, $conn)) {
     	$sm = "Xóa thành công!";
        header("Location: registrar-office.php?success=$sm");
        exit;
     } else {
        $em = "Đã xảy ra lỗi không xác định";
        header("Location: registrar-office.php?error=$em");
        exit;
     }
  } else {
    header("Location: registrar-office.php");
    exit;
  } 
} else {
	header("Location: registrar-office.php");
	exit;
} 
?>
