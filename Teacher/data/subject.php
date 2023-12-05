<?php

// Hàm để lấy tất cả các môn học từ cơ sở dữ liệu
function getAllSubjects($conn){
   // Chuỗi SQL để truy vấn tất cả các môn học
   $sql = "SELECT * FROM mon_hoc";
   // Chuẩn bị và thực thi câu truy vấn SQL sử dụng PDO
   $stmt = $conn->prepare($sql);
   $stmt->execute();

   // Kiểm tra số lượng dòng kết quả trả về từ câu truy vấn
   if ($stmt->rowCount() >= 1) {
     // Nếu có ít nhất một môn học, lấy thông tin và trả về
     $mon_hoc = $stmt->fetchAll();
     return $mon_hoc;
   } else {
     // Nếu không có môn học nào, trả về giá trị 0
    return 0;
   }
}

// Hàm để lấy thông tin môn học dựa trên ID
function getSubjectById($id_mon_hoc, $conn){
   // Chuỗi SQL để truy vấn thông tin môn học từ cơ sở dữ liệu
   $sql = "SELECT * FROM mon_hoc
           WHERE id_mon_hoc=?";
   // Chuẩn bị và thực thi câu truy vấn SQL sử dụng PDO
   $stmt = $conn->prepare($sql);
   $stmt->execute([$id_mon_hoc]);

   // Kiểm tra số lượng dòng kết quả trả về từ câu truy vấn
   if ($stmt->rowCount() == 1) {
     // Nếu có một môn học, lấy thông tin và trả về
     $subject = $stmt->fetch();
     return $subject;
   } else {
     // Nếu không có môn học nào tương ứng, trả về giá trị 0
    return 0;
   }
}

// Hàm để lấy thông tin môn học dựa trên lớp
function getSubjectByClass($class, $conn){
   // Chuỗi SQL để truy vấn thông tin môn học từ cơ sở dữ liệu dựa trên lớp
   $sql = "SELECT * FROM mon_hoc
           WHERE id_lop=?";
   // Chuẩn bị và thực thi câu truy vấn SQL sử dụng PDO
   $stmt = $conn->prepare($sql);
   $stmt->execute([$class]);

   // Kiểm tra số lượng dòng kết quả trả về từ câu truy vấn
   if ($stmt->rowCount() > 0) {
     // Nếu có ít nhất một môn học, lấy thông tin và trả về
     $mon_hoc = $stmt->fetchAll();
     return $mon_hoc;
   } else {
     // Nếu không có môn học nào tương ứng, trả về giá trị 0
    return 0;
   }
}

?>
