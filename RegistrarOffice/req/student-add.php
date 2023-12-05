<?php 
session_start();
if (isset($_SESSION['id_phong_cong_tac_hssv']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Registrar Office') {
    	

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
		$em  = "Tên không được để trống";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($ten)) {
		$em  = "Họ không được để trống";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($uname)) {
		$em  = "Tên người dùng không được để trống";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (!unameIsUnique($uname, $conn)) {
		$em  = "Tên người dùng đã tồn tại! Vui lòng chọn tên khác";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($pass)) {
		$em  = "Mật khẩu không được để trống";
		header("Location: ../student-add.php?error=$em&$data");
		exit;
	}else if (empty($dia_chi)) {
        $em  = "Địa chỉ không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($gioi_tinh)) {
        $em  = "Giới tính không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($email)) {
        $em  = "Địa chỉ email không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($ngay_sinh)) {
        $em  = "Ngày sinh không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($ho_ten_cha)) {
        $em  = "Tên phụ huynh không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($ho_ten_me)) {
        $em  = "Họ phụ huynh không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($so_dien_thoai_phu_huynh)) {
        $em  = "Số điện thoại phụ huynh không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($section)) {
        $em  = "Phần không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else {
        // Mã hóa mật khẩu
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql  = "INSERT INTO
                 hoc_sinh(ten_dang_nhap, password, ho, ten, grade, section, dia_chi, gioi_tinh, email, ngay_sinh, ho_ten_cha, ho_ten_me, so_dien_thoai_phu_huynh)
                 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $ho, $ten, $grade, $section, $dia_chi, $gioi_tinh, $email, $ngay_sinh, $ho_ten_cha, $ho_ten_me, $so_dien_thoai_phu_huynh]);
        $sm = "Sinh viên mới đã đăng ký thành công";
        header("Location: ../student-add.php?success=$sm");
        exit;
	}
    
  }else {
  	$em = "Đã xảy ra lỗi";
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
?>
