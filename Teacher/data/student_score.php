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
function getScoreById($id_hoc_sinh, $id_giao_vien, $subject_id, $semester, $year, $conn){
   $sql = "SELECT * FROM diem_hoc_sinh
           WHERE id_hoc_sinh=? AND id_giao_vien=? AND id_mon_hoc=? AND hoc_ky=? AND nam_hoc=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id_hoc_sinh, $id_giao_vien, $subject_id, $semester, $year]);

   if ($stmt->rowCount() == 1) {
     $student_score = $stmt->fetch();
     return $student_score;
   } else {
    return 0;
   }
}
?>
