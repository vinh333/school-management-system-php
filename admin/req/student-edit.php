<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
        

if (isset($_POST['ho'])      &&
    isset($_POST['ten'])      &&
    isset($_POST['ten_dang_nhap'])   &&
    isset($_POST['id_hoc_sinh']) &&
    isset($_POST['address'])    &&
    isset($_POST['email_address']) &&
    isset($_POST['gender'])        &&
    isset($_POST['date_of_birth']) &&
    isset($_POST['section'])       &&
    isset($_POST['parent_ho'])  &&
    isset($_POST['parent_ten'])  &&
    isset($_POST['parent_phone_number']) &&
    isset($_POST['grade'])) {
    
    include '../../DB_connection.php';
    include "../data/student.php";

    $ho = $_POST['ho'];
    $ten = $_POST['ten'];
    $uname = $_POST['ten_dang_nhap'];

    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $section = $_POST['section'];
    $email_address = $_POST['email_address'];
    $date_of_birth = $_POST['date_of_birth'];
    $parent_ho = $_POST['parent_ho'];
    $parent_ten = $_POST['parent_ten'];
    $parent_phone_number = $_POST['parent_phone_number'];

    $id_hoc_sinh = $_POST['id_hoc_sinh'];
    
    $grade = $_POST['grade'];

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
    }else if (empty($address)) {
        $em  = "Address is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($gender)) {
        $em  = "Gender is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($email_address)) {
        $em  = "Email address is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($date_of_birth)) {
        $em  = "Date of birth is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($parent_ho)) {
        $em  = "Parent first name is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($parent_ten)) {
        $em  = "Parent last name is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($parent_phone_number)) {
        $em  = "Parent phone number is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else if (empty($section)) {
        $em  = "Section is required";
        header("Location: ../student-edit.php?error=$em&$data");
        exit;
    }else {
        $sql = "UPDATE students SET
                ten_dang_nhap = ?, ho=?, ten=?, grade=?, address=?,gender = ?, section=?, email_address=?, date_of_birth=?, parent_ho=?,parent_ten=?,parent_phone_number=?
                WHERE id_hoc_sinh=?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname,$ho, $ten, $grade, $address, $gender,$section, $email_address, $date_of_birth, $parent_ho, $parent_ten,$parent_phone_number, $id_hoc_sinh]);
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
