<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['grade']) &&
    isset($_POST['section'])) {
    
    include '../../DB_connection.php';

    $section = $_POST['section'];
    $grade = $_POST['grade'];

  if (empty($section)) {
		$em  = "Tên lớp là bắt buộc";
		header("Location: ../class-add.php?error=$em");
		exit;
	}else if (empty($grade)) {
		$em  = "Khối lớp là bắt buộc";
		header("Location: ../class-add.php?error=$em");
		exit;
	}else {
        // Kiểm tra xem lớp đã tồn tại chưa
        $sql_check = "SELECT * FROM lop 
                      WHERE grade=? AND section=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$grade, $section]);
        if ($stmt_check->rowCount() > 0) {
           $em  = "Lớp đã tồn tại";
           header("Location: ../class-add.php?error=$em");
           exit;
        }else {
          $sql  = "INSERT INTO
                 class(grade, section)
                 VALUES(?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$grade, $section]);
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
