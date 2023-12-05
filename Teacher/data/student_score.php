<?php

// Hàm để lấy tất cả điểm của sinh viên
function getAllScores($conn){
   $sql = "SELECT * FROM diem_hoc_sinh"; // Sửa tên bảng
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $students_score = $stmt->fetchAll();
     return $students_score;
   } else {
    return 0;
   }
}

// Hàm để lấy điểm của sinh viên theo ID
function getScoreById($id_hoc_sinh, $id_giao_vien, $id_mon_hoc, $hoc_ky, $nam_hoc, $conn){
   $sql = "SELECT * FROM diem_hoc_sinh
           WHERE id_hoc_sinh=? AND id_giao_vien=? AND id_mon_hoc=? AND hoc_ky=? AND nam_hoc=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id_hoc_sinh, $id_giao_vien, $id_mon_hoc, $hoc_ky, $nam_hoc]);

   if ($stmt->rowCount() == 1) {
     $diem_hoc_sinh = $stmt->fetch();
     return $diem_hoc_sinh;
   } else {
    return 0;
   }
}
?>
