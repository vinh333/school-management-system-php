<?php
session_start();

if (isset($_POST['uname']) &&
    isset($_POST['pass']) &&
    isset($_POST['role'])) {

    include "../DB_connection.php";

    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $role = $_POST['role'];

    if (empty($uname)) {
        $em  = "ten_dang_nhap is required";
        header("Location: ../login.php?error=$em");
        exit;
    } elseif (empty($pass)) {
        $em  = "Password is required";
        header("Location: ../login.php?error=$em");
        exit;
    } elseif (empty($role)) {
        $em  = "An error Occurred";
        header("Location: ../login.php?error=$em");
        exit;
    } else {

        if ($role == '1') {
            $sql = "SELECT * FROM admin 
                    WHERE ten_dang_nhap = ?";
            $role = "Admin";
        } elseif ($role == '2') {
            $sql = "SELECT * FROM giao_vien 
                    WHERE ten_dang_nhap = ?";
            $role = "Teacher";
        } elseif ($role == '3') {
            $sql = "SELECT * FROM hoc_sinh 
                    WHERE ten_dang_nhap = ?";
            $role = "Student";
        } elseif ($role == '4') {
            $sql = "SELECT * FROM phong_cong_tac_hssv 
                    WHERE ten_dang_nhap = ?";
            $role = "Registrar Office";
        }

        $stmt = $conn->prepare($sql);
        $stmt->execute([$uname]);

        if ($stmt->rowCount() == 1) {
            $user = $stmt->fetch();
            $ten_dang_nhap = $user['ten_dang_nhap'];
            $password = $user['mat_khau'];

            if ($ten_dang_nhap === $uname) {
                if (password_verify($pass, $password)) {
                    $_SESSION['role'] = $role;
                    if ($role == 'Admin') {
                        $id = $user['admin_id'];
                        $_SESSION['admin_id'] = $id;
                        header("Location: ../admin/index.php");
                        exit;
                    } elseif ($role == 'Student') {
                        $id = $user['id_hoc_sinh'];
                        $_SESSION['id_hoc_sinh'] = $id;
                        header("Location: ../Student/index.php");
                        exit;
                    } elseif ($role == 'Registrar Office') {
                        $id = $user['id_phong_cong_tac_hssv'];
                        $_SESSION['id_phong_cong_tac_hssv'] = $id;
                        header("Location: ../RegistrarOffice/index.php");
                        exit;
                    } elseif ($role == 'Teacher') {
                        $id = $user['id_giao_vien'];
                        $_SESSION['id_giao_vien'] = $id;
                        header("Location: ../Teacher/index.php");
                        exit;
                    } else {
                        $em  = "Incorrect ten_dang_nhap or Password";
                        header("Location: ../login.php?error=$em");
                        exit;
                    }

                } else {
                    $em  = "Incorrect ten_dang_nhap or Password";
                    header("Location: ../login.php?error=$em");
                    exit;
                }
            } else {
                $em  = "Incorrect ten_dang_nhap or Password";
                header("Location: ../login.php?error=$em");
                exit;
            }
        } else {
            $em  = "Incorrect ten_dang_nhap or Password";
            header("Location: ../login.php?error=$em");
            exit;
        }
    }


} else {
    header("Location: ../login.php");
    exit;
}
