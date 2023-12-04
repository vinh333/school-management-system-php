<?php  

// Get Teacher by ID
function getTeacherById($id_giao_vien, $conn){
   $sql = "SELECT * FROM teachers
           WHERE id_giao_vien=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id_giao_vien]);

   if ($stmt->rowCount() == 1) {
     $teacher = $stmt->fetch();
     return $teacher;
   }else {
    return 0;
   }
}

// All Teachers 
function getAllTeachers($conn){
   $sql = "SELECT * FROM teachers";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $teachers = $stmt->fetchAll();
     return $teachers;
   }else {
   	return 0;
   }
}

// Check if the ten_dang_nhap Unique
function unameIsUnique($uname, $conn, $id_giao_vien=0){
   $sql = "SELECT ten_dang_nhap, id_giao_vien FROM teachers
           WHERE ten_dang_nhap=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);
   
   if ($id_giao_vien == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() >= 1) {
       $teacher = $stmt->fetch();
       if ($teacher['id_giao_vien'] == $id_giao_vien) {
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
function removeTeacher($id, $conn){
   $sql  = "DELETE FROM teachers
           WHERE id_giao_vien=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}

// Search 
function searchTeachers($key, $conn){
   $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);

   $sql = "SELECT * FROM teachers
           WHERE id_giao_vien LIKE ? 
           OR ho LIKE ?
           OR ten LIKE ?
           OR ten_dang_nhap LIKE ?
           OR employee_number LIKE ?
           OR phone_number LIKE ?
           OR qualification LIKE ?
           OR email_address LIKE ?
           OR address LIKE ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$key, $key, $key, $key, $key,$key, $key, $key, $key]);

   if ($stmt->rowCount() == 1) {
     $teachers = $stmt->fetchAll();
     return $teachers;
   }else {
    return 0;
   }
}
