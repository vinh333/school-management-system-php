<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['id_lop']) &&
    isset($_POST['ten_lop'])) {
    
    include '../../DB_connection.php';

    $ten_lop = $_POST['ten_lop'];
    $id_lop = $_POST['id_lop'];

  if (empty($ten_lop)) {
		$em  = "Tên lớp là bắt buộc";
		header("Location: ../class-add.php?error=$em");
		exit;
	}else if (empty($id_lop)) {
		$em  = "Khối lớp là bắt buộc";
		header("Location: ../class-add.php?error=$em");
		exit;
	}else {
        // Kiểm tra xem lớp đã tồn tại chưa
        $sql_check = "SELECT * FROM lop 
                      WHERE id_lop=? AND ten_lop=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$id_lop, $ten_lop]);
        if ($stmt_check->rowCount() > 0) {
           $em  = "Lớp đã tồn tại";
           header("Location: ../class-add.php?error=$em");
           exit;
        }else {
          $sql  = "INSERT INTO
                 lop(id_lop, ten_lop)
                 VALUES(?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$id_lop, $ten_lop]);
          $sm = "Tạo lớp mới thành công";
          header("Location: ../class-add.php?success=$sm");
          exit;
        } 
	}
    
  }else {
  	$em = "Đã xảy ra lỗi";
    header("Location: ../class-add.php?error=$em");
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
