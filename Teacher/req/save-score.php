<?php
session_start();
if (isset($_SESSION['id_giao_vien']) && isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {

        if (isset($_POST['score-1']) &&
            isset($_POST['score-2']) &&
            isset($_POST['score-3']) &&
            isset($_POST['score-4']) &&
            isset($_POST['score-5']) &&
            isset($_POST['id_hoc_sinh']) &&
            isset($_POST['id_mon_hoc']) &&
            isset($_POST['nam_hoc']) &&
            isset($_POST['hoc_ky'])
        ) {

            include '../../DB_connection.php';

            $score_1 = $_POST['score-1'];
            $score_2 = $_POST['score-2'];
            $score_3 = $_POST['score-3'];
            $score_4 = $_POST['score-4'];
            $score_5 = $_POST['score-5'];

            $id_hoc_sinh = $_POST['id_hoc_sinh'];
            $id_mon_hoc = $_POST['id_mon_hoc'];
            $nam_hoc = $_POST['nam_hoc'];
            $hoc_ky = $_POST['hoc_ky'];
            $id_giao_vien = $_SESSION['id_giao_vien'];

            if (
                empty($score_1) || empty($score_2) || empty($score_3) || empty($score_4) || empty($score_5) || empty($id_hoc_sinh) || empty($id_mon_hoc) || empty($nam_hoc) || empty($hoc_ky)
            ) {

                $em  = "Vui lòng điền đầy đủ thông tin";
                header("Location: ../student-grade.php?id_hoc_sinh=$id_hoc_sinh&error=$em");
                exit;
            } else {
                $data = '';
                $limit = 0;
                $maxScore = 50; // Điểm tối đa cho thang điểm mới

                if ($score_1 <= $maxScore && $score_1 > 0) {
                    $data .= $score_1;
                    $limit += $score_1;
                }
                if ($score_2 <= $maxScore && $score_2 > 0) {
                    $data .= "," . $score_2;
                    $limit += $score_2;
                }
                if ($score_3 <= $maxScore && $score_3 > 0) {
                    $data .= "," . $score_3;
                    $limit += $score_3;
                }
                if ($score_4 <= $maxScore && $score_4 > 0) {
                    $data .= "," . $score_4;
                    $limit += $score_4;
                }
                if ($score_5 <= $maxScore && $score_5 > 0) {
                    $data .= "," . $score_5;
                    $limit += $score_5;
                }

                if (empty($data)) {
                    $em  = "Đã xảy ra lỗi";
                    header("Location: ../student-grade.php?id_hoc_sinh=$id_hoc_sinh&error=$em");
                    exit;
                } else if ($limit > $maxScore) {
                    $em  = "Vượt quá giới hạn điểm";
                    header("Location: ../student-grade.php?id_hoc_sinh=$id_hoc_sinh&error=$em");
                } else {
                    if (isset($_POST['diem_hoc_sinh_id'])) {
                        $sql = "UPDATE diem_hoc_sinh SET
                            ket_qua = ?
                            WHERE  nam_hoc=?
                            AND hoc_ky=? AND id_hoc_sinh=? AND id_giao_vien=? AND id_mon_hoc=?";

                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$data, $hoc_ky, $nam_hoc, $id_hoc_sinh, $id_giao_vien, $id_mon_hoc]);
                        $sm = "Điểm đã được cập nhật thành công!";
                        header("Location: ../student-grade.php?id_hoc_sinh=$id_hoc_sinh&success=$sm");
                        exit;
                    } else {
                        $sql = "INSERT INTO diem_hoc_sinh( nam_hoc,hoc_ky, id_hoc_sinh, id_giao_vien, id_mon_hoc, ket_qua)VALUES(?,?,?,?,?,?)";

                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$hoc_ky, $nam_hoc, $id_hoc_sinh, $id_giao_vien, $id_mon_hoc, $data]);
                        $sm = "Điểm đã được tạo thành công!";
                        header("Location: ../student-grade.php?id_hoc_sinh=$id_hoc_sinh&success=$sm");
                    }
                }
            }
        } else {
            $em = "Đã xảy ra lỗi";
            header("Location: ../classes.php?error=$em");
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
