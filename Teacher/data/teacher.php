<?php

// Hàm để lấy thông tin giáo viên dựa trên ID
function getTeacherById($id_giao_vien, $conn){
   $sql = "SELECT * FROM giao_vien
           WHERE id_giao_vien=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id_giao_vien]);

   if ($stmt->rowCount() == 1) {
     $teacher = $stmt->fetch();
     return $teacher;
   } else {
    return 0;
   }
}
