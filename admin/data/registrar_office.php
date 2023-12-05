<?php  

// Get r_user by ID
function getR_usersById($id_phong_cong_tac_hssv, $conn){
   $sql = "SELECT * FROM phong_cong_tac_hssv
           WHERE id_phong_cong_tac_hssv=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id_phong_cong_tac_hssv]);

   if ($stmt->rowCount() == 1) {
     $teacher = $stmt->fetch();
     return $teacher;
   }else {
    return 0;
   }
}

// All r_users 
function getAllR_users($conn){
   $sql = "SELECT * FROM phong_cong_tac_hssv";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $giao_vien = $stmt->fetchAll();
     return $giao_vien;
   }else {
   	return 0;
   }
}

// Check if the ten_dang_nhap Unique
function unameIsUnique($uname, $conn, $id_phong_cong_tac_hssv=0){
   $sql = "SELECT ten_dang_nhap, id_phong_cong_tac_hssv FROM phong_cong_tac_hssv
           WHERE ten_dang_nhap=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);
   
   if ($id_phong_cong_tac_hssv == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() == 1) {
       $r_user = $stmt->fetch();
       if ($r_user['id_phong_cong_tac_hssv'] == $id_phong_cong_tac_hssv) {
         return 1;
       }else {
        return 0;
      }
     }else {
      return 1;
     }
   }
   
}

// DELETE
function removeRUser($id, $conn){
   $sql  = "DELETE FROM phong_cong_tac_hssv
           WHERE id_phong_cong_tac_hssv=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}