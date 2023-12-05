<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
    	

if (isset($_POST['ho']) &&
    isset($_POST['ten']) &&
    isset($_POST['ten_dang_nhap']) &&
    isset($_POST['pass'])     &&
    isset($_POST['dia_chi'])  &&
    isset($_POST['gioi_tinh'])   &&
    isset($_POST['email']) &&
    isset($_POST['ngay_sinh']) &&
    isset($_POST['ho_ten_cha'])  &&
    isset($_POST['ho_ten_me'])  &&
    isset($_POST['so_dien_thoai_phu_huynh']) &&
    isset($_POST['section']) &&
    isset($_POST['grade'])) {
    
    include '../../DB_connection.php';
    include "../data/student.php";

    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $uname = $_POST['ten_dang_nhap'];
    $pass = $_POST['pass'];

    $dia_chi = $_POST['dia_chi'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $email = $_POST['email'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $ho_ten_cha = $_POST['ho_ten_cha'];
    $ho_ten_me = $_POST['ho_ten_me'];
    $so_dien_thoai_phu_huynh = $_POST['so_dien_thoai_phu_huynh'];

    $grade = $_POST['grade'];
    $section = $_POST['section'];
    

    $data = 'uname='.$uname.'&ho='.$ho.'&ten='.$ten.'&dia_chi='.$dia_chi.'&gioi_tinh='.$email.'&pfn='.$ho_ten_cha.'&pln='.$ho_ten_me.'&ppn='.$so_dien_thoai_phu_huynh;

    if (empty($ho)) {
		$em  = "First name is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($ten)) {
		$em  = "Last name is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "ten_dang_nhap is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn)) {
		$em  = "ten_dang_nhap is taken! try another";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($pass)) {
		$em  = "Password is required";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($dia_chi)) {
        $em  = "dia_chi is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($gioi_tinh)) {
        $em  = "gioi_tinh is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($email)) {
        $em  = "Email dia_chi is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($ngay_sinh)) {
        $em  = "Date of birth is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($ho_ten_cha)) {
        $em  = "Parent first name is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($ho_ten_me)) {
        $em  = "Parent last name is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($so_dien_thoai_phu_huynh)) {
        $em  = "Parent phone number is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($section)) {
        $em  = "Section is required";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else {
        // hashing the mat_khau
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql  = "INSERT INTO
                 hoc_sinh(ten_dang_nhap, mat_khau, ho, ten, grade, section, dia_chi, gioi_tinh, email, ngay_sinh, ho_ten_cha, ho_ten_me, so_dien_thoai_phu_huynh)
                 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $ho, $ten, $grade, $section, $dia_chi, $gioi_tinh, $email, $ngay_sinh, $ho_ten_cha, $ho_ten_me, $so_dien_thoai_phu_huynh]);
        $sm = "New student registered successfully";
        header("Location: ../student-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "An error occurred";
    header("Location: ../student-add.php?error=$em");
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
