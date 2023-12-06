<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['ten_mon_hoc']) &&
    isset($_POST['ma_mon_hoc']) &&
    isset($_POST['id_mon_hoc'])) {
    
    include '../../DB_connection.php';

    $ten_mon_hoc = $_POST['ten_mon_hoc'];
    $ma_mon_hoc = $_POST['ma_mon_hoc'];
    $id_mon_hoc = $_POST['id_mon_hoc'];

    $data = 'id_mon_hoc='.$id_mon_hoc;

    if (empty($id_mon_hoc)) {
        $em  = "ID môn học là bắt buộc";
        header("Location: ../course-edit.php?error=$em&$data");
        exit;
    
    }else if (empty($ten_mon_hoc)) {
        $em  = "Tên môn học là bắt buộc";
        header("Location: ../course-edit.php?error=$em&$data");
        exit;
    }else if (empty($ma_mon_hoc)) {
        $em  = "Mã môn học là bắt buộc";
        header("Location: ../course-edit.php?error=$em&$data");
        exit;
    }else {
        // Kiểm tra xem môn học đã tồn tại chưa
        $sql_check = "SELECT * FROM mon_hoc 
                      WHERE id_mon_hoc=? AND ma_mon_hoc=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$id_mon_hoc, $ma_mon_hoc]);
        if ($stmt_check->rowCount() > 0) {
              $courses = $stmt_check->fetch();
             if ($courses['id_mon_hoc'] == $id_mon_hoc) {
                $sql  = "UPDATE mon_hoc SET ten_mon_hoc=?, ma_mon_hoc=?, id_mon_hoc=?
                     WHERE id_mon_hoc=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$ten_mon_hoc, $ma_mon_hoc, $id_mon_hoc, $id_mon_hoc]);
                $sm = "Cập nhật môn học thành công";
                header("Location: ../course-edit.php?success=$sm&$data");
                exit;

             }else {
                 $em  = "Môn học đã tồn tại";
                 header("Location: ../course-edit.php?error=$em&$data");
                 exit;
            }
           
        }else {

            $sql  = "UPDATE mon_hoc SET ten_mon_hoc=?, ma_mon_hoc=?, id_mon_hoc=?
                     WHERE id_mon_hoc=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$ten_mon_hoc, $ma_mon_hoc, $id_mon_hoc, $id_mon_hoc]);
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
