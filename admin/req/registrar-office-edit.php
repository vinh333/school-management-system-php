<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['ho'])      &&
    isset($_POST['ten'])      &&
    isset($_POST['ten_dang_nhap'])   &&
    isset($_POST['id_phong_cong_tac_hssv']) &&
    isset($_POST['dia_chi'])  &&
    isset($_POST['so_hieu_giao_vien']) &&
    isset($_POST['so_dien_thoai'])  &&
    isset($_POST['trinh_do']) &&
    isset($_POST['email']) &&
    isset($_POST['gioi_tinh'])        &&
    isset($_POST['ngay_sinh'])) {
    
    include '../../DB_connection.php';
    include "../data/registrar_office.php";

    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $uname = $_POST['ten_dang_nhap'];

    $dia_chi = $_POST['dia_chi'];
    $so_hieu_giao_vien = $_POST['so_hieu_giao_vien'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $trinh_do = $_POST['trinh_do'];
    $email = $_POST['email'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $ngay_sinh = $_POST['ngay_sinh'];

    $id_phong_cong_tac_hssv = $_POST['id_phong_cong_tac_hssv'];
    

    $data = 'id_phong_cong_tac_hssv='.$id_phong_cong_tac_hssv;

    if (empty($ho)) {
		$em  = "Họ là bắt buộc";
		header("Location: ../registrar-office-edit.php?error=$em&$data");
		exit;
	}else if (empty($ten)) {
		$em  = "Tên là bắt buộc";
		header("Location: ../registrar-office-edit.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Tên đăng nhập là bắt buộc";
		header("Location: ../registrar-office-edit.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn, $id_phong_cong_tac_hssv)) {
		$em  = "Tên đăng nhập đã tồn tại! Hãy chọn một tên khác";
		header("Location: ../registrar-office-edit.php?error=$em&$data");
		exit;
	}else if (empty($dia_chi)) {
        $em  = "Địa chỉ là bắt buộc";
        header("Location: ../registrar-office-edit.php?error=$em&$data");
        exit;
    }else if (empty($so_hieu_giao_vien)) {
        $em  = "Số hiệu giáo viên là bắt buộc";
        header("Location: ../registrar-office-edit.php?error=$em&$data");
        exit;
    }else if (empty($so_dien_thoai)) {
        $em  = "Số điện thoại là bắt buộc";
        header("Location: ../registrar-office-edit.php?error=$em&$data");
        exit;
    }else if (empty($trinh_do)) {
        $em  = "Trình độ là bắt buộc";
        header("Location: ../registrar-office-edit.php?error=$em&$data");
        exit;
    }else if (empty($email)) {
        $em  = "Địa chỉ email là bắt buộc";
        header("Location: ../registrar-office-edit.php?error=$em&$data");
        exit;
    }else if (empty($gioi_tinh)) {
        $em  = "Giới tính là bắt buộc";
        header("Location: ../registrar-office-edit.php?error=$em&$data");
        exit;
    }else if (empty($ngay_sinh)) {
        $em  = "Ngày sinh là bắt buộc";
        header("Location: ../registrar-office-edit.php?error=$em&$data");
        exit;
    }else {
        $sql = "UPDATE phong_cong_tac_hssv SET
                ten_dang_nhap = ?, ho=?, ten=?,
                dia_chi = ?, so_nhan_vien=?, ngay_sinh = ?, so_dien_thoai = ?, trinh_do = ?,gioi_tinh=?, email = ?
                WHERE id_phong_cong_tac_hssv=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $ho, $ten, $dia_chi, $so_hieu_giao_vien, $ngay_sinh, $so_dien_thoai, $trinh_do, $gioi_tinh, $email, $id_phong_cong_tac_hssv]);
        $sm = "Cập nhật thành công!";
        header("Location: ../registrar-office-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "Đã xảy ra lỗi";
    header("Location: ../registrar-office.php?error=$em");
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
