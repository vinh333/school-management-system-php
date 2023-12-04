<?php

// Hàm để lấy tất cả thông tin sinh viên từ cơ sở dữ liệu
function getAllStudents($conn){
   $sql = "SELECT * FROM hoc_sinh"; // Sửa tên bảng thành 'hoc_sinh'
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() >= 1) {
     $students = $stmt->fetchAll();
     return $students;
   } else {
   	return 0;
   }
}

// Hàm để lấy thông tin sinh viên theo ID từ cơ sở dữ liệu
function getStudentById($id, $conn){
   $sql = "SELECT * FROM hoc_sinh
           WHERE id_hoc_sinh=?"; // Sửa tên cột và bảng
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() == 1) {
     $student = $stmt->fetch();
     return $student;
   } else {
    return 0;
   }
}

// Hàm để kiểm tra tính duy nhất của tên đăng nhập
function unameIsUnique($uname, $conn, $id_hoc_sinh=0){
   $sql = "SELECT ten_dang_nhap, id_hoc_sinh FROM hoc_sinh
           WHERE ten_dang_nhap=?"; // Sửa tên cột và bảng
   $stmt = $conn->prepare($sql);
   $stmt->execute([$uname]);
   
   if ($id_hoc_sinh == 0) {
     if ($stmt->rowCount() >= 1) {
       return 0;
     } else {
      return 1;
     }
   } else {
    if ($stmt->rowCount() >= 1) {
       $student = $stmt->fetch();
       if ($student['id_hoc_sinh'] == $id_hoc_sinh) {
         return 1;
       } else {
        return 0;
      }
     } else {
      return 1;
     }
   }
}

// Hàm để xác minh mật khẩu sinh viên
function studentPasswordVerify($student_pass, $conn, $id_hoc_sinh){
   $sql = "SELECT * FROM hoc_sinh
           WHERE id_hoc_sinh=?";
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id_hoc_sinh]);

   if ($stmt->rowCount() == 1) {
     $student = $stmt->fetch();
     $pass  = $student['mat_khau']; // Sửa tên cột

     if (password_verify($student_pass, $pass)) {
        return 1;
     } else {
        return 0;
     }
   } else {
    return 0;
   }
}
?>
