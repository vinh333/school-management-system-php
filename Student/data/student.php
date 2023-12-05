<?php 

// Tất cả Sinh Viên 
function getAllhoc_sinh($conn){
   $sql = "SELECT * FROM hoc_sinh";
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $hoc_sinh = $stmt->fetchAll();
     return $hoc_sinh;
   }else {
   	return 0;
   }
}

// Lấy Sinh Viên theo ID 
function getStudentById($id, $conn){
   $sql = "SELECT * FROM hoc_sinh
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

// Kiểm tra xem tên người dùng có duy nhất không
function unameIsUnique($uname, $conn, $id_hoc_sinh=0){
   $sql = "SELECT ten_dang_nhap, id_hoc_sinh FROM hoc_sinh
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

// Xác minh mật khẩu của sinh viên
function studentPasswordVerify($student_pass, $conn, $id_hoc_sinh){
   $sql = "SELECT * FROM hoc_sinh
           WHERE id_hoc_sinh=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id_hoc_sinh]);

   if ($stmt->rowCount() == 1) {
     $student = $stmt->fetch();
     $pass  = $student['password'];

     if (password_verify($student_pass, $pass)) {
        return 1;
     }else {
        return 0;
     }
   }else {
    return 0;
   }
}

?>
