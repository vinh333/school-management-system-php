<?php 

// All Students 
function getAllStudents($conn){
   $sql = "SELECT * FROM students";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $students = $stmt->fetchAll();
     return $students;
   }else {
   	return 0;
   }
}

// DELETE
function removeStudent($id, $conn){
   $sql  = "DELETE FROM students
           WHERE id_hoc_sinh=?";
   $stmt = $conn->prepare($sql);
   $re   = $stmt->execute([$id]);
   if ($re) {
     return 1;
   }else {
    return 0;
   }
}

// Get Student By Id 
function getStudentById($id, $conn){
   $sql = "SELECT * FROM students
           WHERE id_hoc_sinh=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() == 1) {
     $student = $stmt->fetch();
     return $student;
   }else {
    return 0;
   }
}


// Check if the ten_dang_nhap Unique
function unameIsUnique($uname, $conn, $id_hoc_sinh=0){
   $sql = "SELECT ten_dang_nhap, id_hoc_sinh FROM students
           WHERE ten_dang_nhap=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);
   
   if ($id_hoc_sinh == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     }else {
      return 1;
     }
   }else {
    if ($stmt->rowCount() >= 1) {
       $student = $stmt->fetch();
       if ($student['id_hoc_sinh'] == $id_hoc_sinh) {
         return 1;
       }else {
        return 0;
      }
     }else {
      return 1;
     }
   }
   
}


// Search 
function searchStudents($key, $conn){
   $key = preg_replace('/(?<!\\\)([%_])/', '\\\$1',$key);
   $sql = "SELECT * FROM students
           WHERE id_hoc_sinh LIKE ? 
           OR ho LIKE ?
           OR address LIKE ?
           OR email_address LIKE ?
           OR parent_ho LIKE ?
           OR parent_ten LIKE ?
           OR parent_phone_number LIKE ?
           OR ten LIKE ?
           OR ten_dang_nhap LIKE ?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$key, $key, $key, $key, $key, $key, $key, $key, $key]);

   if ($stmt->rowCount() == 1) {
     $students = $stmt->fetchAll();
     return $students;
   }else {
    return 0;
   }
}