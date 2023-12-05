<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['admin_pass']) &&
    isset($_POST['new_pass'])   &&
    isset($_POST['c_new_pass']) &&
    isset($_POST['id_hoc_sinh'])) {
    
    include '../../DB_connection.php';
    include "../data/admin.php";

    $admin_pass = $_POST['admin_pass'];
    $new_pass = $_POST['new_pass'];
    $c_new_pass = $_POST['c_new_pass'];

    $id_hoc_sinh = $_POST['id_hoc_sinh'];
    $id = $_SESSION['admin_id'];
    
    $data = 'id_hoc_sinh='.$id_hoc_sinh.'#change_password';

    if (empty($admin_pass)) {
		$em  = "Mật khẩu Admin là bắt buộc";
		header("Location: ../student-edit.php?perror=$em&$data");
		exit;
	}else if (empty($new_pass)) {
		$em  = "Mật khẩu mới là bắt buộc";
		header("Location: ../student-edit.php?perror=$em&$data");
		exit;
	}else if (empty($c_new_pass)) {
		$em  = "Xác nhận mật khẩu là bắt buộc";
		header("Location: ../student-edit.php?perror=$em&$data");
		exit;
	}else if ($new_pass !== $c_new_pass) {
        $em  = "Mật khẩu mới và xác nhận mật khẩu không khớp";
        header("Location: ../student-edit.php?perror=$em&$data");
        exit;
    }else if (!adminPasswordVerify($admin_pass, $conn, $id)) {
        $em  = "Mật khẩu Admin không đúng";
        header("Location: ../student-edit.php?perror=$em&$data");
        exit;
    }else {
        // Băm mật khẩu mới
        $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

        $sql = "UPDATE hoc_sinh SET
                mat_khau = ?
                WHERE id_hoc_sinh=?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$new_pass, $id_hoc_sinh]);
        $sm = "Mật khẩu đã được thay đổi thành công!";
        header("Location: ../student-edit.php?psuccess=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "Đã xảy ra lỗi";
    header("Location: ../student-edit.php?error=$em&$data");
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
