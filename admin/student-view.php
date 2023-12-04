<?php 
session_start();
if (isset($_SESSION['admin_id']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Admin') {
       include "../DB_connection.php";
       include "data/student.php";
       include "data/subject.php";

       if(isset($_GET['id_hoc_sinh'])){

       $id_hoc_sinh = $_GET['id_hoc_sinh'];

       $student = getStudentById($id_hoc_sinh, $conn);    
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sinh Viên - Giáo Viên</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";
        if ($student != 0) {
     ?>
     <div class="container mt-5">
         <div class="card" style="width: 22rem;">
          <img src="../img/student-<?=$student['gender']?>.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$student['ten_dang_nhap']?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Tên: <?=$student['ho']?></li>
            <li class="list-group-item">Họ: <?=$student['ten']?></li>
            <li class="list-group-item">Tên Đăng Nhập: <?=$student['ten_dang_nhap']?></li>
            <li class="list-group-item">Địa Chỉ: <?=$student['address']?></li>
            <li class="list-group-item">Ngày Sinh: <?=$student['date_of_birth']?></li>
            <li class="list-group-item">Email: <?=$student['email_address']?></li>
            <li class="list-group-item">Giới Tính: <?=$student['gender']?></li>
            <li class="list-group-item">Ngày Tham Gia: <?=$student['date_of_joined']?></li>

            <li class="list-group-item">Khối: 
                 <?php 
                      $grade = $student['grade'];
                      $g = getGradeById($grade, $conn);
                      echo $g['grade_code'].'-'.$g['grade'];
                  ?>
            </li>
            <li class="list-group-item">Phòng: 
                 <?php 
                    $section = $student['section'];
                    $s = getSectioById($section, $conn);
                    echo $s['section'];
                  ?>
            </li>
            <br><br>
            <li class="list-group-item">Tên Phụ Huynh: <?=$student['parent_ho']?></li>
            <li class="list-group-item">Họ Phụ Huynh: <?=$student['parent_ten']?></li>
            <li class="list-group-item">Số Điện Thoại Phụ Huynh: <?=$student['parent_phone_number']?></li>
          </ul>
          <div class="card-body">
            <a href="student.php" class="card-link">Quay Lại</a>
          </div>
        </div>
     </div>
     <?php 
        }else {
          header("Location: teacher.php");
          exit;
        }
     ?>
     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
    <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(3) a").addClass('active');
        });
    </script>

</body>
</html>
<?php 

    }else {
        header("Location: student.php");
        exit;
    }

  }else {
    header("Location: ../login.php");
    exit;
  } 
}else {
	header("Location: ../login.php");
	exit;
} 

?>
