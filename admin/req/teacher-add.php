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
    isset($_POST['so_hieu_giao_vien']) &&
    isset($_POST['so_dien_thoai'])  &&
    isset($_POST['trinh_do']) &&
    isset($_POST['email']) &&
    isset($_POST['classes'])        &&
    isset($_POST['ngay_sinh']) &&
    isset($_POST['mon_hoc'])) {
    
    include '../../DB_connection.php';
    include "../data/teacher.php";

    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $uname = $_POST['ten_dang_nhap'];
    $pass = $_POST['pass'];

    $dia_chi = $_POST['dia_chi'];
    $so_hieu_giao_vien = $_POST['so_hieu_giao_vien'];
    $so_dien_thoai = $_POST['so_dien_thoai'];
    $trinh_do = $_POST['trinh_do'];
    $email = $_POST['email'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $ngay_sinh = $_POST['ngay_sinh'];

    $classes = "";
    foreach ($_POST['classes'] as $class) {
    	$classes .=$class;
    }

    $mon_hoc = "";
    foreach ($_POST['mon_hoc'] as $subject) {
    	$mon_hoc .=$subject;
    }

    $data = 'uname='.$uname.'&ho='.$ho.'&ten='.$ten.'&dia_chi='.$dia_chi.'&en='.$so_hieu_giao_vien.'&pn='.$so_dien_thoai.'&qf='.$trinh_do.'&email='.$email;

    if (empty($ho)) {
		$em  = "Họ là bắt buộc";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (empty($ten)) {
		$em  = "Tên là bắt buộc";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Tên đăng nhập là bắt buộc";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn)) {
		$em  = "Tên đăng nhập đã tồn tại! Hãy thử một tên khác";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (empty($pass)) {
		$em  = "Mật khẩu là bắt buộc";
		header("Location: ../teacher-add.php?error=$em&$data");
		exit;
	}else if (empty($dia_chi)) {
        $em  = "Địa chỉ là bắt buộc";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($so_hieu_giao_vien)) {
        $em  = "Số hiệu giáo viên là bắt buộc";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($so_dien_thoai)) {
        $em  = "Số điện thoại là bắt buộc";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($trinh_do)) {
        $em  = "Trình độ là bắt buộc";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($email)) {
        $em  = "Email là bắt buộc";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($gioi_tinh)) {
        $em  = "Giới tính là bắt buộc";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($ngay_sinh)) {
        $em  = "Ngày sinh là bắt buộc";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else if (empty($pass)) {
        $em  = "Mật khẩu là bắt buộc";
        header("Location: ../teacher-add.php?error=$em&$data");
        exit;
    }else {
        // // hashing mật khẩu
        // $pass = password_hash($pass, PASSWORD_DEFAULT);
        // echo "Tên đăng nhập: " . $uname . "<br>";
        // echo "Mật khẩu: " . $pass . "<br>";
        // echo "Lớp: " . $classes . "<br>";
        // echo "Họ: " . $ho . "<br>";
        // echo "Tên: " . $ten . "<br>";
        // echo "Môn học: " . $mon_hoc . "<br>";
        // echo "Địa chỉ: " . $dia_chi . "<br>";
        // echo "Số hiệu giáo viên: " . $so_hieu_giao_vien . "<br>";
        // echo "Ngày sinh: " . $ngay_sinh . "<br>";
        // echo "Số điện thoại: " . $so_dien_thoai . "<br>";
        // echo "Trình độ: " . $trinh_do . "<br>";
        // echo "Giới tính: " . $gioi_tinh . "<br>";
        // echo "Email: " . $email . "<br>";
        $sql  = "INSERT INTO giao_vien(ten_dang_nhap, mat_khau, danh_sach_lop, ho, ten, mon_hoc, dia_chi, so_hieu_giao_vien, ngay_sinh, so_dien_thoai, trinh_do, gioi_tinh, email) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
    $stmt->execute([$uname, $pass, $classes, $ho, $ten, $mon_hoc, $dia_chi, $so_hieu_giao_vien, $ngay_sinh, $so_dien_thoai, $trinh_do, $gioi_tinh, $email]);

        $sm = "Giáo viên mới đã được đăng ký thành công";
        header("Location: ../teacher-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "Đã xảy ra lỗi";
    header("Location: ../teacher-add.php?error=$em");
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
?>
