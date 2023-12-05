<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['course_name']) &&
    isset($_POST['course_code']) && 
    isset($_POST['grade'])) {
    
    include '../../DB_connection.php';

    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $grade = $_POST['grade'];

  if (empty($course_name)) {
		$em  = "Tên môn học là bắt buộc";
		header("Location: ../course-add.php?error=$em");
		exit;
	}else if(empty($course_code)) {
    $em  = "Mã môn học là bắt buộc";
    header("Location: ../course-add.php?error=$em");
    exit;
  }else if (empty($grade)) {
		$em  = "Khối lớp là bắt buộc";
		header("Location: ../course-add.php?error=$em");
		exit;
	}else {
        // Kiểm tra xem môn học đã tồn tại chưa
        $sql_check = "SELECT * FROM mon_hoc 
                      WHERE grade=? AND subject_code=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$grade, $course_code]);
        if ($stmt_check->rowCount() > 0) {
           $em  = "Môn học đã tồn tại";
           header("Location: ../course-add.php?error=$em");
           exit;
        }else {
          $sql  = "INSERT INTO
                 mon_hoc(grade, subject, subject_code)
                 VALUES(?,?,?)";
          $stmt = $conn->prepare($sql);
          $stmt->execute([$grade, $course_name, $course_code]);
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
