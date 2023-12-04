<?php 
session_start();
if (isset($_SESSION['r_user_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Registrar Office') {
    	

if (isset($_POST['ho']) &&
    isset($_POST['ten']) &&
    isset($_POST['ten_dang_nhap']) &&
    isset($_POST['pass'])     &&
    isset($_POST['address'])  &&
    isset($_POST['gender'])   &&
    isset($_POST['email_address']) &&
    isset($_POST['date_of_birth']) &&
    isset($_POST['parent_ho'])  &&
    isset($_POST['parent_ten'])  &&
    isset($_POST['parent_phone_number']) &&
    isset($_POST['section']) &&
    isset($_POST['grade'])) {
    
    include '../../DB_connection.php';
    include "../data/student.php";

    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $uname = $_POST['ten_dang_nhap'];
    $pass = $_POST['pass'];

    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $email_address = $_POST['email_address'];
    $date_of_birth = $_POST['date_of_birth'];
    $parent_ho = $_POST['parent_ho'];
    $parent_ten = $_POST['parent_ten'];
    $parent_phone_number = $_POST['parent_phone_number'];

    $grade = $_POST['grade'];
    $section = $_POST['section'];
    

    $data = 'uname='.$uname.'&ho='.$ho.'&ten='.$ten.'&address='.$address.'&gender='.$email_address.'&pfn='.$parent_ho.'&pln='.$parent_ten.'&ppn='.$parent_phone_number;

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
	}else if (empty($address)) {
        $em  = "Địa chỉ không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($gender)) {
        $em  = "Giới tính không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($email_address)) {
        $em  = "Địa chỉ email không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($date_of_birth)) {
        $em  = "Ngày sinh không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($parent_ho)) {
        $em  = "Tên phụ huynh không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($parent_ten)) {
        $em  = "Họ phụ huynh không được để trống";
        header("Location: ../student-add.php?error=$em&$data");
        exit;
    }else if (empty($parent_phone_number)) {
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
                 students(ten_dang_nhap, password, ho, ten, grade, section, address, gender, email_address, date_of_birth, parent_ho, parent_ten, parent_phone_number)
                 VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname, $pass, $ho, $ten, $grade, $section, $address, $gender, $email_address, $date_of_birth, $parent_ho, $parent_ten, $parent_phone_number]);
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
