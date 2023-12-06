<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['id_lop'])) {
    
    include '../../DB_connection.php';

   
    $id_lop = $_POST['id_lop'];
    $ten_lop = $_POST['ten_lop'];

    $data = 'id_lop='.$id_lop;

    if (empty($id_lop)) {
        $em  = "ID lớp học là bắt buộc";
        header("Location: ../class-edit.php?error=$em&$data");
        exit;
    }else if (empty($ten_lop)) {
        $em  = "Tên lớp là bắt buộc";
        header("Location: ../class-edit.php?error=$em&$data");
        exit;
   
    }else {
        // Kiểm tra xem lớp đã tồn tại chưa 
        $sql_check = "SELECT * FROM lop 
                      WHERE id_lop = $id_lop";
        $stmt_check = $conn->prepare($sql_check);
        // $stmt_check->execute([$grade, $id_lop]);
        if ($stmt_check->rowCount() > 0) {
           $em  = "Lớp đã tồn tại";
           header("Location: ../class-edit.php?error=$em&$data");
           exit;
        }else {

          $sql = "UPDATE lop SET ten_lop=? WHERE id_lop=?";
            echo $ten_lop, $id_lop;
            
            $stmt = $conn->prepare($sql);
            $stmt->execute([$ten_lop, $id_lop]);
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
