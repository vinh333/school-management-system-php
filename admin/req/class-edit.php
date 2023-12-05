<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['section']) &&
    isset($_POST['grade']) &&
    isset($_POST['id_lop'])) {
    
    include '../../DB_connection.php';

    $section = $_POST['section'];
    $grade = $_POST['grade'];
    $id_lop = $_POST['id_lop'];

    $data = 'id_lop='.$id_lop;

    if (empty($id_lop)) {
        $em  = "ID lớp học là bắt buộc";
        header("Location: ../class-edit.php?error=$em&$data");
        exit;
    }else if (empty($grade)) {
        $em  = "Khối lớp là bắt buộc";
        header("Location: ../class-edit.php?error=$em&$data");
        exit;
    }else if (empty($section)) {
        $em  = "Tên lớp là bắt buộc";
        header("Location: ../class-edit.php?error=$em&$data");
        exit;
    }else {
        // Kiểm tra xem lớp đã tồn tại chưa
        $sql_check = "SELECT * FROM lop 
                      WHERE grade=? AND section=?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->execute([$grade, $section]);
        if ($stmt_check->rowCount() > 0) {
           $em  = "Lớp đã tồn tại";
           header("Location: ../class-edit.php?error=$em&$data");
           exit;
        }else {

            $sql  = "UPDATE class SET grade=?, section=?
                     WHERE id_lop=?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$grade, $section, $id_lop]);
            $sm = "Cập nhật lớp học thành công";
            header("Location: ../class-edit.php?success=$sm&$data");
            exit;
       }
	}
    
  }else {
  	$em = "Đã xảy ra lỗi";
    header("Location: ../class.php?error=$em");
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
