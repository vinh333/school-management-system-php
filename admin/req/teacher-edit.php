<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['ho'])      &&
    isset($_POST['ten'])      &&
    isset($_POST['ten_dang_nhap'])   &&
    isset($_POST['id_giao_vien']) &&
    isset($_POST['dia_chi'])  &&
    isset($_POST['so_hieu_giao_vien']) &&
    isset($_POST['so_dien_thoai'])  &&
    isset($_POST['trinh_do']) &&
    isset($_POST['email']) &&
    isset($_POST['gioi_tinh'])        &&
    isset($_POST['ngay_sinh']) &&
    isset($_POST['mon_hoc'])   &&
    isset($_POST['classes'])) {
    
    include '../../DB_connection.php';
    include "../data/teacher.php";

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

    $id_giao_vien = $_POST['id_giao_vien'];
    
    $classes = "";
    foreach ($_POST['classes'] as $class) {
    	$classes .=$class;
    }

    $mon_hoc = "";
    foreach ($_POST['mon_hoc'] as $subject) {
    	$mon_hoc .=$subject;
    }

    $data = 'id_giao_vien='.$id_giao_vien;

    if (empty($ho)) {
		$em  = "First name is required";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (empty($ten)) {
		$em  = "Last name is required";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "ten_dang_nhap is required";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn, $id_giao_vien)) {
		$em  = "ten_dang_nhap is taken! try another";
		header("Location: ../teacher-edit.php?error=$em&$data");
		exit;
	}else if (empty($dia_chi)) {
        $em  = "dia_chi is required";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($so_hieu_giao_vien)) {
        $em  = "Employee number is required";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($so_dien_thoai)) {
        $em  = "Phone number is required";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($trinh_do)) {
        $em  = "Qualification is required";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($email)) {
        $em  = "Email dia_chi is required";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($gioi_tinh)) {
        $em  = "gioi_tinh dia_chi is required";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else if (empty($ngay_sinh)) {
        $em  = "Date of birth dia_chi is required";
        header("Location: ../teacher-edit.php?error=$em&$data");
        exit;
    }else {
        $sql = "UPDATE giao_vien SET
                ten_dang_nhap = ?,danh_sach_lop=?, ho=?, ten=?, mon_hoc=?,
                dia_chi = ?, so_hieu_giao_vien=?, ngay_sinh = ?, so_dien_thoai = ?, trinh_do = ?,gioi_tinh=?, email = ?
                WHERE id_giao_vien=?";
        $stmt = $conn->prepare($sql);
        
        $stmt->execute([$uname,  $classes, $ho, $ten, $mon_hoc, $dia_chi, $so_hieu_giao_vien, $ngay_sinh, $so_dien_thoai, $trinh_do, $gioi_tinh, $email,$id_giao_vien]);
        $sm = "successfully updated!";
        header("Location: ../teacher-edit.php?success=$sm&$data");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../teacher.php?error=$em");
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
