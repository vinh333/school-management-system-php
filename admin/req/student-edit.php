<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        

if (isset($_POST['ho'])      &&
    isset($_POST['ten'])      &&
    isset($_POST['ten_dang_nhap'])   &&
    isset($_POST['id_hoc_sinh']) &&
    isset($_POST['dia_chi'])    &&
    isset($_POST['email']) &&
    isset($_POST['gioi_tinh'])        &&
    isset($_POST['ngay_sinh']) &&
    isset($_POST['lop'])       &&
    isset($_POST['ho_ten_cha'])  &&
    isset($_POST['ho_ten_me'])  &&
    isset($_POST['so_dien_thoai_phu_huynh'])){
    
    include '../../DB_connection.php';
    include "../data/student.php";

    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $uname = $_POST['ten_dang_nhap'];

    $dia_chi = $_POST['dia_chi'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $email = $_POST['email'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $ho_ten_cha = $_POST['ho_ten_cha'];
    $ho_ten_me = $_POST['ho_ten_me'];
    $so_dien_thoai_phu_huynh = $_POST['so_dien_thoai_phu_huynh'];

    $id_hoc_sinh = $_POST['id_hoc_sinh'];
    
    $lop = $_POST['lop'];

    $data = 'id_hoc_sinh='.$id_hoc_sinh;

    if (empty($ho)) {
        $em  = "First name is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($ten)) {
        $em  = "Last name is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($uname)) {
        $em  = "ten_dang_nhap is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (!unameIsUnique($uname, $conn, $id_hoc_sinh)) {
        $em  = "ten_dang_nhap is taken! try another";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($dia_chi)) {
        $em  = "dia_chi is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($gioi_tinh)) {
        $em  = "gioi_tinh is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($email)) {
        $em  = "Email dia_chi is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($ngay_sinh)) {
        $em  = "Date of birth is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($ho_ten_cha)) {
        $em  = "Parent first name is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($ho_ten_me)) {
        $em  = "Parent last name is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($so_dien_thoai_phu_huynh)) {
        $em  = "Parent phone number is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    
    }else {
        $sql = "UPDATE hoc_sinh SET
                ten_dang_nhap = ?, ho=?, ten=?, id_lop=?, dia_chi=?,gioi_tinh=?, email=?, ngay_sinh=?, ho_ten_cha=?,ho_ten_me=?,so_dien_thoai_phu_huynh=?
                WHERE id_hoc_sinh=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$ho, $ten, $lop, $dia_chi, $gioi_tinh, $email, $ngay_sinh, $ho_ten_cha, $ho_ten_me,$so_dien_thoai_phu_huynh, $id_hoc_sinh]);
        $sm = "successfully updated!";
        header("Location: ../student-edit.php?success=$sm&$data");
        exit;
    }
    
  }else {
    
    $em = "An error occurred";
    header("Location: ../student.php?error=$em");
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
