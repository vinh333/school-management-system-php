<?php 
session_start();
if (isset($_SESSION['id_giao_vien']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
    	

        if (isset($_POST['old_pass']) &&
            isset($_POST['new_pass'])   &&
            isset($_POST['c_new_pass']) ) {
            
            include '../../DB_connection.php';
            include "../data/student.php";

            $old_pass = $_POST['old_pass'];
            $new_pass = $_POST['new_pass'];
            $c_new_pass = $_POST['c_new_pass'];

            $id_giao_vien = $_SESSION['id_giao_vien'];
            
            if (empty($old_pass)) {
                $em  = "Yêu cầu nhập mật khẩu cũ";
                header("Location: ../pass.php?perror=$em");
                exit;
            } else if (empty($new_pass)) {
                $em  = "Yêu cầu nhập mật khẩu mới";
                header("Location: ../pass.php?perror=$em");
                exit;
            } else if (empty($c_new_pass)) {
                $em  = "Yêu cầu xác nhận mật khẩu mới";
                header("Location: ../pass.php?perror=$em");
                exit;
            } else if ($new_pass !== $c_new_pass) {
                $em  = "Mật khẩu mới và xác nhận mật khẩu không khớp";
                header("Location: ../pass.php?perror=$em");
                exit;
            } else if (!studentPasswordVerify($old_pass, $conn, $id_giao_vien)) {
                $em  = "Mật khẩu cũ không đúng";
                header("Location: ../pass.php?perror=$em");
                exit;
            } else {
                // mã hóa mật khẩu mới
                $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);

                $sql = "UPDATE giao_vien SET
                        mat_khau = ?
                        WHERE id_giao_vien=?";

                $stmt = $conn->prepare($sql);
                $stmt->execute([$new_pass, $id_giao_vien]);
                $sm = "Mật khẩu đã được thay đổi thành công!";
                header("Location: ../pass.php?psuccess=$sm");
                exit;
            }
            
        } else {
            $em = "Đã xảy ra lỗi";
            header("Location: ../pass.php?error=$em");
            exit;
        }

    } else {
        header("Location: ../../logout.php");
        exit;
    } 
} else {
    header("Location: ../../logout.php");
    exit;
} 
?>
