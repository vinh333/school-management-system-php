<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['id_mon_hoc']) &&
    isset($_POST['ma_mon_hoc']) && 
    isset($_POST['ten_mon_hoc'])) {
    
    include '../../DB_connection.php';

    $id_mon_hoc = $_POST['id_mon_hoc'];
    $ma_mon_hoc = $_POST['ma_mon_hoc'];
    $ten_mon_hoc = $_POST['ten_mon_hoc'];

  if (empty($id_mon_hoc)) {
		$em  = "id môn học là bắt buộc";
		header("Location: ../course-add.php?error=$em");
		exit;
	}else if(empty($ma_mon_hoc)) {
    $em  = "Mã môn học là bắt buộc";
    header("Location: ../course-add.php?error=$em");
    exit;
  }else if (empty($ten_mon_hoc)) {
		$em  = "Tên lớp là bắt buộc";
		header("Location: ../course-add.php?error=$em");
		exit;
	}else {
        // Kiểm tra xem môn học đã tồn tại chưa
        $sql_check = "SELECT * FROM mon_hoc 
                      WHERE id_mon_hoc=? ";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$id_mon_hoc]);
        if ($stmt_check->rowCount() > 0) {
           $em  = "Môn học đã tồn tại";
           header("Location: ../course-add.php?error=$em");
           exit;
        }else {
          $sql  = "INSERT INTO
                 mon_hoc(id_mon_hoc, ten_mon_hoc, ma_mon_hoc)
                 VALUES(?,?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$id_mon_hoc, $ten_mon_hoc, $ma_mon_hoc]);
          $sm = "Tạo mới môn học thành công";
          header("Location: ../course-add.php?success=$sm");
          exit;
        } 
	}
    
  }else {
  	$em = "Đã xảy ra lỗi";
    header("Location: ../course-add.php?error=$em");
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
