<?php 
// All classes
function getAllClasses($conn){
   $sql = "SELECT * FROM lop";
   $stmt = $conn->prepare($sql);
   $stmt->execute();
   if ($stmt->rowCount() >= 1) {
     $classes = $stmt->fetchAll();
     return $classes;
   }else {
    return 0;
   }
}


// Hàm để lấy lớp theo ID
function getClassById($id_lop, $conn){
  $sql = "SELECT * FROM lop
          WHERE id_lop=?"; // Thay đổi tên trường
  $stmt = $conn->prepare($sql);
  $stmt->execute([$id_lop]);

  if ($stmt->rowCount() == 1) {
    $class = $stmt->fetch();
    return $class;
  } else {
   return 0;
  }
}
// DELETE
function removeClass($id, $conn){
   $sql  = "DELETE FROM lop
           WHERE id_lop=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}