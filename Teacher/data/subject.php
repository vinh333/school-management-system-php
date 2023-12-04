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
     $subjects = $stmt->fetchAll();
     return $subjects;
   } else {
     // Nếu không có môn học nào, trả về giá trị 0
    return 0;
   }
}

// Hàm để lấy thông tin môn học dựa trên ID
function getSubjectById($subject_id, $conn){
   // Chuỗi SQL để truy vấn thông tin môn học từ cơ sở dữ liệu
   $sql = "SELECT * FROM mon_hoc
           WHERE id_mon_hoc=?";
   // Chuẩn bị và thực thi câu truy vấn SQL sử dụng PDO
   $stmt = $conn->prepare($sql);
   $stmt->execute([$subject_id]);

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
function getSubjectByGrade($grade, $conn){
   // Chuỗi SQL để truy vấn thông tin môn học từ cơ sở dữ liệu dựa trên lớp
   $sql = "SELECT * FROM mon_hoc
           WHERE lop=?";
   // Chuẩn bị và thực thi câu truy vấn SQL sử dụng PDO
   $stmt = $conn->prepare($sql);
   $stmt->execute([$grade]);

   // Kiểm tra số lượng dòng kết quả trả về từ câu truy vấn
   if ($stmt->rowCount() > 0) {
     // Nếu có ít nhất một môn học, lấy thông tin và trả về
     $subjects = $stmt->fetchAll();
     return $subjects;
   } else {
     // Nếu không có môn học nào tương ứng, trả về giá trị 0
    return 0;
   }
}

?>
