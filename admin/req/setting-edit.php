<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['ten_truong']) &&
    isset($_POST['phat_ngon']) &&
    isset($_POST['gioi_thieu']) &&
    isset($_POST['hoc_ky']) &&
    isset($_POST['nam_hoc'])) {
    
    include '../../DB_connection.php';

    $ten_truong = $_POST['ten_truong'];
    $phat_ngon = $_POST['phat_ngon'];
    $gioi_thieu = $_POST['gioi_thieu'];
    $nam_hoc = $_POST['nam_hoc'];
    $hoc_ky = $_POST['hoc_ky'];

   

    if (empty($ten_truong)) {
        $em  = "Tên trường là bắt buộc";
        header("Location: ../settings.php?error=$em");
        exit;
    }else if (empty($phat_ngon)) {
        $em  = "Phát ngôn là bắt buộc";
        header("Location: ../settings.php?error=$em");
        exit;
    }else if (empty($gioi_thieu)) {
        $em  = "Giới thiệu là bắt buộc";
        header("Location: ../settings.php?error=$em");
        exit;
    }else if (empty($nam_hoc)) {
        $em  = "Năm học hiện tại là bắt buộc";
        header("Location: ../settings.php?error=$em");
        exit;
    }else if (empty($hoc_ky)) {
        $em  = "Học kỳ hiện tại là bắt buộc";
        header("Location: ../settings.php?error=$em");
        exit;
    }else {
        $id = 1;
        $sql  = "UPDATE setting 
                 SET nam_hoc=?,
                     hoc_ky=?,
                     ten_truong=?,
                     phat_ngon=?,
                     gioi_thieu=?
                 WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$nam_hoc, $hoc_ky, $ten_truong, $phat_ngon, $gioi_thieu, $id]);
        $sm = "Cập nhật cài đặt thành công";
        header("Location: ../settings.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "Đã xảy ra lỗi";
    header("Location: ../section.php?error=$em");
    exit;
  }

  }else {
    header("Location: ../../logout.php");
    exit;
  } 
}else {
	header("Location: ../../logout.php");
	exit;
} 
