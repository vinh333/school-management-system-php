<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['course_name']) &&
    isset($_POST['course_code']) &&
    isset($_POST['grade'])       &&
    isset($_POST['course_id'])) {
    
    include '../../DB_connection.php';

    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $grade = $_POST['grade'];
    $course_id = $_POST['course_id'];

    $data = 'course_id='.$course_id;

    if (empty($course_id)) {
        $em  = "ID môn học là bắt buộc";
        header("Location: ../course-edit.php?error=$em&$data");
        exit;
    }else if (empty($grade)) {
        $em  = "Khối lớp là bắt buộc";
        header("Location: ../course-edit.php?error=$em&$data");
        exit;
    }else if (empty($course_name)) {
        $em  = "Tên môn học là bắt buộc";
        header("Location: ../course-edit.php?error=$em&$data");
        exit;
    }else if (empty($course_code)) {
        $em  = "Mã môn học là bắt buộc";
        header("Location: ../course-edit.php?error=$em&$data");
        exit;
    }else {
        // Kiểm tra xem môn học đã tồn tại chưa
        $sql_check = "SELECT * FROM mon_hoc 
                      WHERE grade=? AND subject_code=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$grade, $course_code]);
        if ($stmt_check->rowCount() > 0) {
              $courses = $stmt_check->fetch();
             if ($courses['id_mon_hoc'] == $course_id) {
                $sql  = "UPDATE mon_hoc SET subject=?, subject_code=?, grade=?
                     WHERE id_mon_hoc=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$course_name, $course_code, $grade, $course_id]);
                $sm = "Cập nhật môn học thành công";
                header("Location: ../course-edit.php?success=$sm&$data");
                exit;

             }else {
                 $em  = "Môn học đã tồn tại";
                 header("Location: ../course-edit.php?error=$em&$data");
                 exit;
            }
           
        }else {

            $sql  = "UPDATE mon_hoc SET subject=?, subject_code=?, grade=?
                     WHERE id_mon_hoc=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$course_name, $course_code, $grade, $course_id]);
            $sm = "Cập nhật môn học thành công";
            header("Location: ../course-edit.php?success=$sm&$data");
            exit;
       }
	}
    
  }else {
  	$em = "Đã xảy ra lỗi";
    header("Location: ../course.php?error=$em");
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
