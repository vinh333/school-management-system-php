<?php 
session_start();
if (isset($_SESSION['id_giao_vien']) && 
    isset($_SESSION['role'])) {

    if ($_SESSION['role'] == 'Teacher') {
       include "../DB_connection.php";
       include "data/teacher.php";
       include "data/subject.php";
       include "data/class.php";


       $id_giao_vien = $_SESSION['id_giao_vien'];
       $teacher = getTeacherById($id_giao_vien, $conn);
 ?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Giáo viên - Trang chủ</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="../logo.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "inc/navbar.php";

        if ($teacher != 0) {
     ?>
     <div class="container mt-5">
         <div class="card" style="width: 22rem;">
          <img src="../img/teacher-<?=$teacher['gioi_tinh']?>.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title text-center">@<?=$teacher['ten_dang_nhap']?></h5>
          </div>
          <ul class="list-group list-group-flush">
          <li class="list-group-item">Họ và tên: <?=$teacher['ho']?></li>
            <li class="list-group-item">Tên đệm: <?=$teacher['ten']?></li>
            <li class="list-group-item">Tên đăng nhập: <?=$teacher['ten_dang_nhap']?></li>

            <li class="list-group-item">Mã nhân viên: <?=$teacher['so_hieu_giao_vien']?></li>
            <li class="list-group-item">Địa chỉ: <?=$teacher['dia_chi']?></li>
            <li class="list-group-item">Ngày sinh: <?=$teacher['ngay_sinh']?></li>
            <li class="list-group-item">Số điện thoại: <?=$teacher['so_dien_thoai']?></li>
            <li class="list-group-item">Trình độ: <?=$teacher['trinh_do']?></li>
            <li class="list-group-item">Địa chỉ email: <?=$teacher['email']?></li>
            <li class="list-group-item">Giới tính: <?=$teacher['gioi_tinh']?></li>
            <li class="list-group-item">Ngày gia nhập: <?=$teacher['ngay_tham_gia']?></li>

            <li class="list-group-item">Môn giảng dạy: 
                <?php 
                   $s = '';
                   $subjects = str_split(trim($teacher['mon_hoc']));
                   foreach ($subjects as $subject) {
                      $s_temp = getSubjectById($subject, $conn);
                      if ($s_temp != 0) 
                        $s .=$s_temp['ma_mon_hoc'].', ';
                   }
                   echo $s;
                ?>
            </li>
            <li class="list-group-item">Lớp giảng dạy: 
                  <?php 
                     $c = '';
                     $classes = str_split(trim($teacher['danh_sach_lop']));

                     foreach ($classes as $id_lop) {
                         $class = getClassById($id_lop, $conn);
                          $c .=$class['ten_lop'].', ';
                     }
                     echo $c;

                  ?>
            </li>
            
          </ul>
        </div>
     </div>
     <?php 
        }else {
          header("Location: logout.php?error=Có lỗi xảy ra");
          exit;
        }
     ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>	
   <script>
        $(document).ready(function(){
             $("#navLinks li:nth-child(1) a").addClass('active');
        });
    </script>
</body>
</html>
<?php 

  } else {
    header("Location: ../login.php");
    exit;
  } 
} else {
	header("Location: ../login.php");
	exit;
} 

?>
